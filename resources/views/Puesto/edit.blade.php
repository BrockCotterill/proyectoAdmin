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
<form method="post" action="{{url('puesto/' . $puesto->id)}}">
    @method('put')
    @csrf
    nombre:<input type="text" value="{{$puesto->nombre}}" name="nombre" />
     minimo:<input type="number"  value="{{$puesto->minimo}}" name="minimo"/>
     maximo:<input type="number" value="{{$puesto->maximo}}" name="maximo"/>
    <input type="submit" value="Submit"/>
</form>
@endsection