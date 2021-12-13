<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['puestos'] = Puesto::all();
        return view('Puesto.index',$data);
    }
    public function showOrdenadosPorNombre(){
            $data = [];
            $data['puestos'] = Puesto::all()->sortBy("nombre");
            return view('Puesto.index',$data);
    }
    public function showOrdenadosPorNombre2(){
            $data = [];
            $data['puestos'] = Puesto::all()->sortByDesc("nombre");
            return view('Puesto.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['puestos'] = Puesto::all();
        return view('Puesto.create',$data);
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
        $errorCode = 0;
        $puesto = new Puesto($request->all());
         $rules=
            [
                "nombre" => "required|min:2|max:150|string",
                "minimo"=>"required|gte:0.01|lte:999999.99|numeric",
                "maximo"=>"required|gte:0.01|lte:999999.99|numeric",
                //nullable
            ];
        $message=[
            'nombre.required'=>'Debes escribir un nombre',
            'nombre.max' =>'No puedes escribir un nombre tan largo',
            'nombre.min' =>'No puedes escribir un nombre tan corto',
            'nombre.string'=>'Debes poner una cadena',

            'minimo.required'=>'Debes escribir un sueldo minimo',
            'minimo.gte'=>'No puede ser menor que 0,01',
            'minimo.lte'=>'No puede ser mayor que 999999,99',

            'maximo.required'=>'Debes escribir un sueldo maximo',
            'maximo.gte'=>'No puede ser menor que 0,01',
            'maximo.lte'=>'No puede ser mayor que 999999,99',

            ];

        $validator =Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages())
                ->with($data);
        }
        try{
        $result = $puesto->save();
        }catch(\Exception $e){
            return back()->withInput()->with($data);
        }
        switch($errorCode){
            case 0:
                $data['message'] = "bien";
                break;
            case 1:
                 $data['message'] = "couldnt save";
                break;
        }
        return redirect('puesto')->with($data);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        $data = [];
        $data['puesto'] = $puesto;
        return view('Puesto.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        $data = [];
        $data['puesto'] = $puesto;
        $data['puestos'] = Puesto::all();
        return view('Puesto.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        $data = [];
        $rules=
            [
                "nombre" => "required|min:2|max:150|string",
                "minimo"=>"required|gte:0.01|lte:999999.99|numeric",
                "maximo"=>"required|gte:0.01|lte:999999.99|numeric",
                //nullable
            ];
        $message=[
            'nombre.required'=>'Debes escribir un nombre',
            'nombre.max' =>'No puedes escribir un nombre tan largo',
            'nombre.min' =>'No puedes escribir un nombre tan corto',
            'nombre.string'=>'Debes poner una cadena',

            'minimo.required'=>'Debes escribir un sueldo minimo',
            'minimo.gte'=>'No puede ser menor que 0,01',
            'minimo.lte'=>'No puede ser mayor que 999999,99',

            'maximo.required'=>'Debes escribir un sueldo maximo',
            'maximo.gte'=>'No puede ser menor que 0,01',
            'maximo.lte'=>'No puede ser mayor que 999999,99',

            ];

        $validator =Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){
            return back()
                ->withInput()
                ->withErrors($validator->messages())
                ->with($data);
        }
        try{
        $result = $puesto->update($request->all());
        $data['messages'] = "all good";
        }catch(\Exception $e){
            $data['messages'] = "error when saving";
            return back('puesto/'. $puesto->id . '/edit')->withInput()->with($data);
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        $data = [];
        try{
        $puesto->delete();
        $data['message'] = "bien";
        }catch(\Exception $e){
          $data['message'] = "mal";
        }
        
         return redirect('puesto')->with($data);
    }
}
