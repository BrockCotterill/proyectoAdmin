@extends('base')

@section('content')

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form id="modalForm" class="modal-content" action="" method="post">
    @method('delete')
    @csrf
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your puesto?</p>
      <div class="clearfix">
        <button type="button" class="cancelbtn">Cancel</button>
        <input type="submit" value="delete"/> 
      </div>
    </div>
  </form>
</div>


<div class="sectionData">
<table>
    <tr>
        <td>nombre</td><td>minimo</td><td>maximo</td><td>show</td><td>edit</td><td>delete</td>
    </tr>
    @foreach($puestos as $puesto)
    <tr>
       <td>{{$puesto->nombre}}</td><td>{{$puesto->minimo}}</td><td>{{$puesto->maximo}}</td><td><a href="{{url('puesto/' . $puesto->id)}}">show</a></td><td><a href="{{url('puesto/' . $puesto->id . '/edit')}}">edit</a></td><td>
                <button id="bt{{ $puesto->id }}" data-id="{{url('puesto/' . $puesto->id)}}" onclick="modales({{$puesto->id}})">Delete</button>
            </td>
    </tr>
    @endforeach
</table>
<a href="{{url('puesto/create')}}">Create</a>
<a href="{{url('puesto/ordenar/showOrdenadosPorNombre')}}">order by name (asce)</a>
<a href="{{url('puesto/ordenar/showOrdenadosPorNombre2')}}">order by name (desc)</a>
</div>
@endsection


<script type="text/javascript" src="{{url('admin/assets/js/delete.js')}}"></script>