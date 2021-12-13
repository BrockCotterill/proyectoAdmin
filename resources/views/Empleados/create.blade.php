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
    <select name="idpuestos">
        @foreach($puestos as $puesto)
            <option value="{{$puesto->id}}">{{$puesto->nombre}}</option>
        @endforeach
    </select>
    <select name="iddepartamentos">
        @foreach($departamentos as $departamento)
            <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
        @endforeach
    </select>
    <input type="submit" value="Submit"/>
</form>
@endsection