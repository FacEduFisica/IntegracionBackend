<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Aplicacion;

class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = Aplicacion::all();
        return $apps;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateNew = Validator::make($request->all(),[
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'url' => 'required|string'
    ]);

        if($validateNew->fails()) {
            return response()
                ->json(['status' => '500', 'data' => $validateNew->errors()]);
        }

        $new = Aplicacion::create($validateNew->getData());
        return response()
                    ->json(['status' => '200', 'data' => "Aplicacion Creada"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $new = Aplicacion::where('id',$id)->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'url' => $request->url
        ]);

        return response()
            ->json(['status' => '200', 'data'=>'Aplicacion Actualizada']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = Aplicacion::where('id',$id);
        $new->delete();
        return response()
            ->json(['status' => '200']);
    }
}
