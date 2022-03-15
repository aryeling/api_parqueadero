<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GuardarVehiculoRequest;
use App\Http\Resources\MarcaResource;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vehiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarVehiculoRequest $request)
    {
        $resp = null;
        try {
            DB::transaction(function() use ($request) {

                $propietario = Propietario::create([
                    'cedula' => $request->input('propietario_id.cedula'),
                    'nombre' => $request->input('propietario_id.nombre'),
                    'apellido' => $request->input('propietario_id.apellido'),
                    'sexo' => $request->input('propietario_id.sexo'),
                    'fecha_nac' => $request->input('propietario_id.fecha_nac'),
                    'telefono' => $request->input('propietario_id.telefono'),
                    'correo' => $request->input('propietario_id.correo')
                ]);


                $vehiculo = Vehiculo::create([
                    'placa' => $request->placa,
                    'color'=> $request->color,
                    'tipo_vehiculo_id' => $request->input('tipo_vehiculo_id.id'),
                    'marca_id' =>$request->input('marca_id.id'),
                ]);

                $this->resp = $propietario->vehiculos()->save($vehiculo);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error'.$e]);
        }
        return response()->json([
            'res' => true,
            'msg' => 'Registro guardado exitosamente',
            'data' => $this->resp
        ],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        return response()->json([
            'res' => true,
            'vehiculo' => $vehiculo
        ],200);
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
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCantidadporMarca()
    {
        $report = Vehiculo::selectRaw('count(vehiculos.id) as cantidad, marcas.descripcion')
                ->join('marcas', 'marcas.id', '=', 'vehiculos.marca_id')
                ->groupBy('marcas.descripcion')
                ->get();

        return response()->json([
            'res' => true,
            'data' => MarcaResource::collection($report)
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscar($term)
    {
        $search = '%'.$term.'%';
        $vehiculo = Vehiculo::selectRaw('vehiculos.*, tv.descripcion as tipo_vehiculo, m.descripcion as marca, p.nombre, p.apellido, p.cedula, p.telefono, p.correo')
                    ->join('propietarios as p', 'p.id', '=', 'vehiculos.propietario_id')
                    ->join('marcas as m', 'm.id', '=', 'vehiculos.marca_id')
                    ->join('tipo_vehiculos as tv', 'tv.id', '=', 'vehiculos.tipo_vehiculo_id')
                    ->where('vehiculos.placa','LIKE',$search)
                    ->orWhere('p.cedula','LIKE',$search)
                    ->orWhere('p.nombre','LIKE',$search)
                    ->orWhere('p.apellido','LIKE',$search)
                    ->paginate();

        return response()->json([
            'res' => true,
            'vehiculo' => $vehiculo
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
