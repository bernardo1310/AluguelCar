<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\carros;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = carros::all();
        return view('carros.index',array('carros'=>$carros));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->isAdmin()){
        
            return view('carros.create');
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
            'modelo'=>'required',
            'tipo'=>'required'
        ]);
        
        if(Auth::check() && Auth::user()->isAdmin()){
            $carro = new carros;
            $carro->modelo = $request->input('modelo');
            $carro->tipo = $request->input('tipo');
            $carro->save();

            return redirect('/carros');
        } 
        else{
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carros  $carros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = carros::find($id);
        return view('carros.show',array('carro'=>$carro));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carros  $carros
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $carro = carros::find($id);
            return view('carros.edit',array('carro'=>$carro));
        } 
        else{
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carros  $carros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'modelo'=>'required',
            'tipo'=>'required'
        ]);

        if(Auth::check() && Auth::user()->isAdmin()){
            $carro = carros::find($id);
            $carro->modelo =  $request->input('modelo');
            $carro->tipo =  $request->input('tipo');
            $carro->save();
            return redirect('/carros');
        } 
        else{
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carros  $carros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() && Auth::user()->isAdmin()){
            $carro = carros::find($id);
            $carro->delete();
            return redirect('/carros');
        } 
        else{
            return redirect('login');
        }
    }
}
