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
<form method="post" action="{{url('puesto')}}">
    @csrf
    nombre:<input value="{{old('nombre')}}" type="text" name="nombre" />
     minimo:<input type="number"  value="{{old('minimo')}}" name="minimo"/>
      maximo:<input type="number"  value="{{old('maximo')}}" name="maximo"/>
   <input type="submit" value="Submit"/>
</form>
@endsection