<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EmpleadoController extends Controller
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
        $data['puestos'] = Puesto::all();
        return view('Empleados.index',$data);
    }
public function showOrdenadosPorNombre(){
        $data = [];
        $data['departamentos'] = Departamento::all();
        $data['empleados'] = Empleado::all()->sortBy("nombre");
        $data['puestos'] = Puesto::all();
        return view('Empleados.index',$data);
    }
    public function showOrdenadosPorNombre2(){
        $data = [];
        $data['departamentos'] = Departamento::all();
        $data['empleados'] = Empleado::all()->sortByDesc("nombre");
        $data['puestos'] = Puesto::all();
        return view('Empleados.index',$data);
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
        $data['puestos'] = Puesto::all();
        return view('Empleados.create',$data);
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
        $empleado = new Empleado($request->all());
        $rules=
            [
                "nombre" => "required|min:2|max:150|string",
                "apellidos"=>"required|min:2|max:250|string",
                "email"=>"required|unique:empleados,email|email:rfc",
                "telefono"=> "required|string|size:9|unique:empleados,telefono",
                "fechacontrato"=> "required|date_format:Y-m-d|before:tomorrow",
                "idpuestos"=>"required|exists:puestos,id|integer",
                "iddepartamentos"=>"required|exists:departamentos,id|integer",
                //nullable
            ];
        $message=[
            'nombre.required'=>'Debes escribir un nombre',
            'nombre.max' =>'No puedes escribir un nombre tan largo',
            'nombre.min' =>'No puedes escribir un nombre tan corto',
            'nombre.string'=>'Debes poner una cadena',
            
            'apellidos.required'=>'Debes escribir un apellido',
            'apellidos.max' =>'No puedes escribir un apellidos tan largo',
            'apellidos.min' =>'No puedes escribir un apellidos tan corto',
            'apellidos.string'=>'Debes poner una cadena',
            
            'email.required'=>'Debes escribir un email',
            'email.unique'=>'Ese email ya existe',
            'email.email'=>'El email no esta bien escrito',
            
            'telefono.required'=>'Debes escribir un telefono',
            'telefono.string'=>'Debes escribir una cadena',
            'telefono.size'=>'No se pueden escribir mas de 9 caracteres',
            'telefono.unique'=>'Ya existe ese numero de telefono',
            
            'fechacontrato.required'=>'Debes ecribir un fecha',
            'fechacontrato.date_format'=>'No esta bien escrita la fecha',
            'fechacontrato.before'=>'No puedes escribir una fecha del futuro',
            
            'idpuestos.required'=>'Debes escribir un id puesto',
            'idpuestos.exists'=>'No existe ese puesto',
            'idpuestos.integer'=>'Debes escribir un numero',
            
            'iddepartamentos.required'=>'Debes escribir un id departamento',
            'iddepartamentos.exists'=>'No existe ese departamento',
            'iddepartamentos.integer'=>'Debes escribir un numero',
            
            
            ];

        $validator =Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages())
                ->with($data);
        }
        try{
        $result = $empleado->save();
        }catch(\Exception $e){
            return back()->withInput()->with($data);
        }
        return redirect('empleado')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $data = [];
        $data['empleado'] = $empleado;
        return view('Empleados.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $data = [];
        $data['empleado'] = $empleado;
        $data['departamentos'] = Departamento::all();
        $data['puestos'] = Puesto::all();
        $data['empleados'] = Empleado::all();
        return view('Empleados.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
       
        $data = [];
        $rules=
            [
                "nombre" => "required|min:2|max:150|string",
                "apellidos"=>"required|min:2|max:250|string",
                "email"=>"required|email:rfc",
                "telefono"=> "required|string|size:9",
                "fechacontrato"=> "required|date_format:Y-m-d|before:tomorrow",
                "idpuestos"=>"required|exists:puestos,id|integer",
                "iddepartamentos"=>"required|exists:departamentos,id|integer",
                //nullable
            ];
        $message=[
            'nombre.required'=>'Debes escribir un nombre',
            'nombre.max' =>'No puedes escribir un nombre tan largo',
            'nombre.min' =>'No puedes escribir un nombre tan corto',
            'nombre.string'=>'Debes poner una cadena',
            
            'apellidos.required'=>'Debes escribir un apellido',
            'apellidos.max' =>'No puedes escribir un apellidos tan largo',
            'apellidos.min' =>'No puedes escribir un apellidos tan corto',
            'apellidos.string'=>'Debes poner una cadena',
            
            'email.required'=>'Debes escribir un email',
            'email.unique'=>'Ese email ya existe',
            'email.email'=>'El email no esta bien escrito',
            
            'telefono.required'=>'Debes escribir un telefono',
            'telefono.string'=>'Debes escribir una cadena',
            'telefono.size'=>'No se pueden escribir mas de 9 caracteres',
            'telefono.unique'=>'Ya existe ese numero de telefono',
            
            'fechacontrato.required'=>'Debes ecribir un fecha',
            'fechacontrato.date_format'=>'No esta bien escrita la fecha',
            'fechacontrato.before'=>'No puedes escribir una fecha del futuro',
            
            'idpuestos.required'=>'Debes escribir un id puesto',
            'idpuestos.exists'=>'No existe ese puesto',
            'idpuestos.integer'=>'Debes escribir un numero',
            
            'iddepartamentos.required'=>'Debes escribir un id departamento',
            'iddepartamentos.exists'=>'No existe ese departamento',
            'iddepartamentos.integer'=>'Debes escribir un numero',
            
            
            ];

        $validator =Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages())
                ->with($data);
        }
        try{
        $result = $empleado->update($request->all());
        }catch(\Exception $e){
            dd($e);
            return back('empleado/'. $empleado->id . '/edit')->withInput()->with($data);
        }
        return redirect('empleado')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $data = [];
        try{
        $empleado->delete();
        $data['message'] = "bien";
        }catch(\Exception $e){
            dd($e);
          $data['message'] = "mal";
        }
        
         return redirect('empleado')->with($data);
    }
}
