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

<form method="post" action="{{url('departamento/' . $departamento->id)}}">
    @method('put')
    @csrf
    nombre:<input type="text" name="nombre" value="{{$departamento->nombre}}"/>
     localizacion:<input type="text" value="{{$departamento->localizacion}}"name="localizacion"/>
     idjefe:<input list="empleados"  value="{{$departamento->idempleadojefe}}"type="text" name="idempleadojefe"/>
    <input type="submit" value="Submit"/>
    <datalist id="empleados">
        @foreach($empleados as $empleado)
            <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
        @endforeach
    </datalist>
</form>
@endsection