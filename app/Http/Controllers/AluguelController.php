<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\carros;
use App\Models\contatos;
use App\Models\aluguel;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluguel = aluguel::all();
        return view('aluguel.index',array('aluguel'=>$aluguel));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::check() && Auth::user()->isAdmin()){
            $contatos = contatos::all();
            $carros = carros::all();
            return view('aluguel.create',array('contatos'=>$contatos,'carros'=>$carros));
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
        $this->validate($request,[
            'idCarro'=>'required',
            'idContato'=>'required'
        ]);

        if(Auth::check() && Auth::user()->isAdmin()){
            $alug = new aluguel;
            $alug->idcarro = $request->input('idCarro');
            $alug->idcontato = $request->input('idContato');
            $alug->save();
            return redirect('/aluguel');
        } 
        else{
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aluguel  $aluguel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alug = aluguel::find($id);
        return view('aluguel.show',array('alug'=>$alug));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aluguel  $aluguel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $alug = aluguel::find($id);
            $contatos = contatos::all();
            $carros = carros::all();
            return view('aluguel.edit',array('alug'=>$alug,'contatos'=>$contatos,'carros'=>$carros));
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aluguel  $aluguel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'idCarro'=>'required',
            'idContato'=>'required'
        ]);

        if(Auth::check() && Auth::user()->isAdmin()){
            $alug = aluguel::find($id);
            $alug->idCarro = $request->input('idCarro');
            $alug->idContato = $request->input('idContato');
            $alug->save();
            return redirect('/aluguel');
        }
        else{
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aluguel  $aluguel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $alug = aluguel::find($id);
            $alug->delete();
            return redirect('/aluguel');
        } 
        else{
            return redirect('login');
        }
    }
}
