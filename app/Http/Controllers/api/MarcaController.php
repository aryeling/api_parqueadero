<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Http\Requests\GuardarMarcaRequest;
use App\Http\Requests\ActualizarMarcaRequest;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Marca::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarMarcaRequest $request)
    {
        Marca::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Marca guardada'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return response()->json([
            'res' => true,
            'marca' => $marca
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarMarcaRequest $request, Marca $marca)
    {
        $marca->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Marca actualizada'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
