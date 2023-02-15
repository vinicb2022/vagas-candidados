<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidatosModel;

class HomeController extends Controller
{
    private $candidato;

    public function __construct()
    {
        $this->middleware('auth');
        $this->candidato = new CandidatosModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $candidato = $this->candidato->where(['usuario_id' => $id])->get()->first();

        return view('home', compact('candidato'));
    }
}
