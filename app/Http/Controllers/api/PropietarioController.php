<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarPropietarioRequest;
use App\Models\Propietario;
use Illuminate\Http\Request;
use App\Http\Requests\GuardarPropietarioRequest;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Propietario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPropietarioRequest $request)
    {
        $propietario = Propietario::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Propietario guardado',
            'data' => $propietario
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        return response()->json([
            'res' => true,
            'propietario' => $propietario
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPropietarioRequest $request, Propietario $propietario)
    {
        $propietario->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Propietario actualizado',
            'data' => $propietario
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
