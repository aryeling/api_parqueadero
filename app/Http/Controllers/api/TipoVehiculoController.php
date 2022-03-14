<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TipoVehiculo;
use App\Http\Requests\GuardarTipoVehiculoRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ActualizarTipoVehiculoRequest;

class TipoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoVehiculo::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarTipoVehiculoRequest $request)
    {
        $tipo_vehiculo = TipoVehiculo::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Tipo de vehiculo guardado',
            'data' => $tipo_vehiculo
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVehiculo $tipo_vehiculo)
    {
        return response()->json([
            'res' => true,
            'tipo_vehiculo' => $tipo_vehiculo
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarTipoVehiculoRequest $request, TipoVehiculo $tipo_vehiculo)
    {
        $tipo_vehiculo->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Tipo de vehiculo actualizado',
            'data' => $tipo_vehiculo
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
