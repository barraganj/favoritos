<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['favoritos']=Favorito::paginate(5);
        return view('favorito.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('favorito.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[

            'titulo'=>'required|string|max:100',
            'tema'=>'required|string|max:100',
            'Url'=> "required|url",
        ];

        $mensaje=[

            'required'=>'El :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);

        $data = request()->except('_token');
        Favorito::insert($data);
        // return response()->json($data);
        return redirect('favorito')->with('mensaje','Favorito agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $favorito=Favorito::findOrFail($id);

        return view('favorito.edit',compact('favorito'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[

            'titulo'=>'required|string|max:100',
            'tema'=>'required|string|max:100',
            'Url'=> "required|url",

        ];

        $mensaje=[

            'required'=>'El :attribute es requerido'

        ];

        $this->validate($request,$campos,$mensaje);
        $favorito = request()->except(['_token','_method']);
        Favorito::where('id','=',$id)->update($favorito);

        $favorito = Favorito::findOrFail($id);
        return view('favorito.edit',compact('favorito'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorito  $favorito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Favorito::destroy($id);
        return redirect('favorito')->with('mensaje','Favorito borrado');
    }
}
