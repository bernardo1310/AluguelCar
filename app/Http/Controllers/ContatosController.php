<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = contatos::all();
        return view('contatos.index',array('busca'=>null,'contatos'=>$contatos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            return view('contatos.create');
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $contato = new Contatos;
            $contato->nome = $request->input('nome');
            $contato->telefone = $request->input('telefone');
            $contato->save();
            return redirect('/contatos');
        }
        else{
            return redirect('login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = contatos::find($id);
        return view('contatos.show',array('contato'=>$contato));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    if(Auth::check() && Auth::user()->isAdmin()){
        $contato = Contatos::find($id);
        return view('contatos.edit',array('contato'=>$contato));
    }
    else{
        return redirect('login');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    if(Auth::check() && Auth::user()->isAdmin()){
        $contato = contatos::find($id) ;
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->save();
        return redirect('/contatos');
    }
    else{
        return redirect('login');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    if(Auth::check() && Auth::user()->isAdmin()){
        $contato = contatos::find($id);
        $contato->delete();
        return redirect('/contatos');
    }
    else{
        return redirect('login');
    }
    }
}
