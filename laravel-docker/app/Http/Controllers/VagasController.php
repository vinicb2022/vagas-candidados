<?php

namespace App\Http\Controllers;

use App\Models\TiposVagasModel;
use App\Models\LocaisVagasModel;
use App\Models\VagasModel;
use Illuminate\Http\Request;

class VagasController extends Controller
{

    private $tipoVaga;
    private $localVaga;
    private $vaga;

    public function __construct()
    {
        $this->tipoVaga = new TiposVagasModel();
        $this->localVaga = new LocaisVagasModel();
        $this->vaga = new VagasModel();
    }

    public function index()
    {
        $vagas = $this->vaga->paginate(20);

        return view('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = $this->tipoVaga->all();
        $locais = $this->localVaga->all();
        return view('vagas.create', compact('tipos', 'locais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            return redirect('vagas')->with('sucess', 'Vaga criada com sucesso');
        }
        else {
            return redirect('vagas')->with('error', 'Vaga não pode ser criada');
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
        $vaga = $this->vaga->find($id);
        $tipo = $vaga->find($vaga->id)->relTipo;
        $local = $vaga->find($vaga->id)->relLocal;  

        return view('vagas.show', compact('vaga', 'tipo', 'local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = $this->vaga->find($id);
        $tipos = $this->tipoVaga->all();
        $locais = $this->localVaga->all();

        return view('vagas.create', compact('vaga', 'tipos', 'locais'));

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
        $this->vaga->where(['id' => $id])
                   ->update([
                        'nome' => $request->nome,
                        'descricao' => $request->descricao,
                        'remuneracao' => $request->remuneracao,
                        'tipo_id' => $request->tipo,
                        'local_id' => $request->local,
                   ]);

        return redirect('vagas')->with('sucess', 'Vaga editada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->vaga->where(['id' => $id])->delete();

        return redirect('vagas')->with('sucess', 'Vaga deletada com sucesso');
    }
}
