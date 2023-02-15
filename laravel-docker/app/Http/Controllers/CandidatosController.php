<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatosModel;
use App\Models\CandidatosVagasModel;
use Illuminate\Support\Facades\Auth;

class CandidatosController extends Controller
{
    private $candidato;
    private $candidatoVaga;

    public function __construct()
    {
        $this->candidato = new CandidatosModel();
        $this->candidatoVaga = new CandidatosVagasModel();
    }

    public function index()
    {
        $candidatos = $this->candidato->paginate(20);

        return view('candidatos.index', compact('candidatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = Auth::id();
        
        $cadastro = $this->candidato->create([
                                        'nome' => $request->nome,
                                        'email' => $request->email,
                                        'telefone' => $request->telefone,
                                        'descricao' => $request->descricao,
                                        'formacao_academica' => $request->formacao,
                                        'experiencia_profissional' => $request->experiencia,
                                        'habilidades_especificas' => $request->habilidades,
                                        'usuario_id' => $id
                                    ]);
        if ($cadastro) {
            return redirect('candidatos')->with('success', 'Candidato criada com sucesso');
        }
        else {
            return redirect('candidatos')->with('error', 'Candidato não pode ser criado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidato = $this->candidato->find($id);

        return view('candidatos.show', compact('candidato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidato = $this->candidato->find($id);

        return view('candidatos.create', compact('candidato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->candidato->where(['id' => $id])
                        ->update([
                            'nome' => $request->nome,
                            'email' => $request->email,
                            'telefone' => $request->telefone,
                            'descricao' => $request->descricao,
                            'formacao_academica' => $request->formacao,
                            'experiencia_profissional' => $request->experiencia,
                            'habilidades_especificas' => $request->habilidades
                        ]);

        return redirect('candidatos')->with('success', 'Candidato editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->candidato->where(['id' => $id])->delete();

        return redirect('vagas')->with('success', 'Candidato deletado com sucesso');
    }

    public function candidatar($vagaId) {

        $id = Auth::id();

        $candidato = $this->candidato->where(['usuario_id' => $id])->get()->first();

        $cadastro = $this->candidatoVaga->create([
                                            'candidato_id' => $candidato['id'],
                                            'vaga_id' => $vagaId,
                                        ]);
        if ($cadastro) {
            return redirect('vagas')->with('success', 'Aplicação a vaga realizada com sucesso');
        }
        else {
            return redirect('vagas')->with('error', 'Aplicação a vaga realizada com sucesso');
        }
        
    }
}
