<?php

namespace App\Http\Controllers;

use App\Models\TiposVagasModel;
use App\Models\LocaisVagasModel;
use App\Models\VagasModel;
use App\Models\CandidatosModel;
use App\Models\CandidatosVagasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VagasController extends Controller
{

    private $tipoVaga;
    private $localVaga;
    private $vaga;
    private $candidato;
    private $candidatoVaga;

    public function __construct()
    {
        $this->tipoVaga = new TiposVagasModel();
        $this->localVaga = new LocaisVagasModel();
        $this->vaga = new VagasModel();
        $this->candidato = new CandidatosModel();
        $this->candidatoVaga = new CandidatosVagasModel();
    }

    public function index()
    {
        $vagas = $this->vaga->paginate(20);
        $id = Auth::id();
        $candidato = $this->candidato->where(['usuario_id' => $id])->get()->first();
        if ($candidato) {
            foreach ($vagas as $vaga) {
                $vaga->applied = false;
                $candidatoVaga = $this->candidatoVaga->where([
                                                        'candidato_id' => $candidato['id'],
                                                        'vaga_id' => $vaga->id
                                                     ])
                                                     ->get()
                                                     ->first();
    
                if ($candidatoVaga) {
                    $vaga->applied = true;
                }
            }
        }
        return view('vagas.index', compact('vagas'));
    }

    public function create()
    {
        $tipos = $this->tipoVaga->all();
        $locais = $this->localVaga->all();
        return view('vagas.create', compact('tipos', 'locais'));
    }

    public function store(Request $request)
    {

       $cadastro = $this->vaga->create([
                                    'nome' => $request->nome,
                                    'descricao' => $request->descricao,
                                    'remuneracao' => $request->remuneracao,
                                    'tipo_id' => $request->tipo,
                                    'local_id' => $request->local,
                                ]);
        if ($cadastro) {
            return redirect('vagas')->with('success', 'Vaga criada com sucesso');
        }
        else {
            return redirect('vagas')->with('error', 'Vaga não pode ser criada');
        }
    }

    public function show($id)
    {
        $vaga = $this->vaga->find($id);
        $tipo = $vaga->find($vaga->id)->relTipo;
        $local = $vaga->find($vaga->id)->relLocal;
        $idUsuario = Auth::id();
        $candidato = $this->candidato->where(['usuario_id' => $idUsuario])->get()->first();
        if ($candidato) {
            $candidatoVaga = $this->candidatoVaga->where([
                                                    'candidato_id' => $candidato['id'],
                                                    'vaga_id' => $vaga->id
                                                 ])
                                                 ->get()
                                                 ->first(); 
        }

        $candidatosRegistrados = $this->candidatoVaga->where([
                                                        'vaga_id' => $id
                                                     ])
                                                     ->get();

        if ($candidatosRegistrados) {
            foreach ($candidatosRegistrados as $candidato) {
                $dados = $this->candidato->where(['id' => $candidato->candidato_id])->get()->first();
                $candidato->nome = $dados->nome;
                $candidato->email = $dados->email;
                $candidato->telefone = $dados->telefone;
            }
        }
    
        return view('vagas.show', @compact('vaga', 'tipo', 'local', 'candidatoVaga', 'candidatosRegistrados'));
    }

    public function edit($id)
    {
        $vaga = $this->vaga->find($id);
        $tipos = $this->tipoVaga->all();
        $locais = $this->localVaga->all();

        return view('vagas.create', compact('vaga', 'tipos', 'locais'));

    }

    public function update(Request $request, $id)
    {
        $this->vaga->where(['id' => $id])
                   ->update([
                        'nome' => $request->nome,
                        'descricao' => $request->descricao,
                        'remuneracao' => $request->remuneracao,
                        'tipo_id' => $request->tipo,
                        'local_id' => $request->local,
                   ]);

        return redirect('vagas')->with('success', 'Vaga editada com sucesso');
    }

    public function destroy($id)
    {
        $this->vaga->where(['id' => $id])->delete();

        return redirect('vagas')->with('success', 'Vaga deletada com sucesso');
    }

    public function changeStatus($id, $status) 
    {
        if ($status == 1) {
            $this->vaga->where(['id' => $id])->update(['status' => 2]);
        }
        else {
            $this->vaga->where(['id' => $id])->update(['status' => 1]);

        }

        return redirect('vagas')->with('success', 'Vaga atualizada com sucesso');

    }

    public function deleteSelected(Request $request) 
    {
        $ids = $request->ids;
        $this->vaga->whereIn('id', [$ids])->delete();

        return redirect('vagas')->with('success', 'Vaga(s) deletadas com sucesso');
    }
}
