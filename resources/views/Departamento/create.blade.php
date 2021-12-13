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
<form method="post" action="{{url('departamento')}}">
    @csrf
    nombre:<input type="text" name="nombre" />
     localizacion:<input type="text" name="localizacion"/>
    <select id="idempleadojefe">
        @foreach($empleados as $empleado)
            <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
        @endforeach
    </select>
    <input type="submit" value="Submit"/>
</form>
@endsection