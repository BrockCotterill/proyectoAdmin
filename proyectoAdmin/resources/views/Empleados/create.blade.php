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
<form method="post" action="{{url('empleado')}}">
    @csrf
    nombre:<input type="text" name="nombre" />
     apellidos:<input type="text" name="apellidos"/>
     fechacontrato:<input type="text" name="fechacontrato"/>
     email:<input  type="text" name="email"/>
     telefono:<input type="text" name="telefono"/>
     idpuestos:<input list="puestos" type="text" name="idpuestos"/>
     iddepartamentos:<input list="departamento" type="text" name="iddepartamentos"/>
    <input type="submit" value="Submit"/>
    <datalist id="puestos">
        @foreach($puestos as $puesto)
            <option value="{{$puesto->id}}" >{{$puesto->nombre}}</option>
        @endforeach
    </datalist>
    <datalist id="departamento">
        @foreach($departamentos as $departamento)
            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
        @endforeach
    </datalist>
</form>
@endsection