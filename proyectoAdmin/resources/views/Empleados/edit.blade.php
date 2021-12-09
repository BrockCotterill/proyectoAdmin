@extends('base')

@section('content')
@if ($errors->any())
     <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
     </ul>
     </div>
    @endif
<form method="post" action="{{url('empleado/' . $empleado->id)}}">
    @method('put')
    @csrf
    nombre:<input type="text" value="{{$empleado->nombre}}"name="nombre" />
     apellidos:<input type="text" value="{{$empleado->apellidos}}" name="apellidos"/>
     fechacontrato:<input type="text" value="{{$empleado->fechacontrato}}" name="fechacontrato"/>
     email:<input  type="text" value="{{$empleado->email}}" name="email"/>
     telefono:<input type="text" value="{{$empleado->telefono}}" name="telefono"/>
     idpuestos:<input list="puestos" value="{{$empleado->idpuestos}}" type="text" name="idpuestos"/>
     iddepartamentos:<input list="departamento" value="{{$empleado->iddepartamentos}}" type="text" name="iddepartamentos"/>
    <input type="submit" value="Submit"/>
    <datalist id="puestos">
        @foreach($puestos as $puesto)
            <option value="{{$puesto->id}}" />
        @endforeach
    </datalist>
    <datalist id="departamento">
        @foreach($departamentos as $departamento)
            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
        @endforeach
    </datalist>
</form>
@endsection