<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = [];
        $data['departamentos'] = Departamento::all();
        $data['empleados'] = Empleado::all();
        return view('Departamento.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data[] = "";
        $data['departamentos'] = Departamento::all();
        $data['empleados'] = Empleado::all();
        return view('Departamento.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $departamento = new Departamento($request->all());

    
        $rules=
            [
                "nombre" => "required|min:2|max:150|string",
                "localizacion"=>"required|min:2|max:350|string",
                "idempleadojefe"=>"exists:departamentos,id|integer|nullable",
                //nullable
            ];
        $message=[
            'nombre.required'=>'Debes escribir un nombre',
            'nombre.max' =>'No puedes escribir un nombre tan largo',
            'nombre.min' =>'No puedes escribir un nombre tan corto',
            'nombre.string'=>'Debes poner una cadena',

            'localizacion.required'=>'Debes escribir una localizacion',
            'localizacion.max' =>'No puedes escribir un localizacion tan largo',
            'localizacion.min' =>'No puedes escribir un localizacion tan corto',
            'localizacion.string'=>'Debes poner una cadena',

            'idempleadojefe.exists'=>'No existe ese id del jefe de departamento',
            'idempleadojefe.integer'=>'Debes escribir un numero',

            ];

        $validator =Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages())
                ->with($data);
        }


        try{
        $result = $departamento->save();
        }catch(\Exception $e){
            return back()->withInput()->with($data);
        }
        return redirect('departamento')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $data = [];
        $data['departamento'] = $departamento;
        return view('Departamento.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        $data = [];
        $data['departamento'] = $departamento;
        $data['departamentos'] = Departamento::all();
        $data['empleados'] = Empleado::all();
        return view('Departamento.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departamento $departamento)
    {
        $data = [];
        $rules=
            [
                "name" => "required|min:2|max:150|string",
                "location"=>"required|min:2|max:350|string",
                "jefeDep"=>"required|exists:departamento,id|integer",
                //nullable
            ];
        $message=[
            'name.required'=>'Debes escribir un nombre',
            'name.max' =>'No puedes escribir un nombre tan largo',
            'name.min' =>'No puedes escribir un nombre tan corto',
            'name.string'=>'Debes poner una cadena',

            'location.required'=>'Debes escribir una localizacion',
            'location.max' =>'No puedes escribir un localizacion tan largo',
            'location.min' =>'No puedes escribir un localizacion tan corto',
            'location.string'=>'Debes poner una cadena',

            'jefeDep.required'=>'Debes escribir el id del jefe de departamento',
            'jefeDep.exists'=>'No existe ese id del jefe de departamento',
            'jefeDep.integer'=>'Debes escribir un numero',

            ];

        $validator =Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages())
                ->with($data);
        }
        try{
        $result = $departamento->update($request->all());
        }catch(\Exception $e){
            return back()->withInput()->with($data);
        }
        return redirect('departamento')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $data = [];
        try{
        $departamento->delete();
        $data['message'] = "bien";
        }catch(\Exception $e){
          $data['message'] = "mal";
        }
        
         return redirect('departamento')->with($data);
    }
    
    public function showOrdenadosPorNombre(){
        $data = [];
        $data['departamentos'] = Departamento::all()->sortBy("nombre");;
        $data['empleados'] = Empleado::all();
        return view('Departamento.index',$data);
    }
    public function showOrdenadosPorNombre2(){
        $data = [];
        $data['departamentos'] = Departamento::all()->sortByDesc("nombre");;
        $data['empleados'] = Empleado::all();
        return view('Departamento.index',$data);
    }
}
