@extends('base')

@section('content')

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form id="modalForm" class="modal-content" action="" method="post">
    @method('delete')
    @csrf
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your empleado?</p>
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
        <td>nombre</td><td>apellidos</td><td>email</td><td>telefono</td><td>idpuesto</td><td>iddepartamentos</td><td>show</td><td>edit</td><td>delete</td>
    </tr>
    @foreach($empleados as $empleado)
    <tr>
       <td>{{$empleado->nombre}}</td><td>{{$empleado->apellidos}}</td><td>{{$empleado->fechacontrato}}</td><td>{{$empleado->email}}</td><td>{{$empleado->telefono}}</td><td>{{$empleado->idpuestos}}</td><td>{{$empleado->iddepartamentos}}</td><td><a href="{{url('empleado/' . $empleado->id)}}">show</a></td><td><a href="{{url('empleado/' . $empleado->id . '/edit')}}">edit</a></td><td>
                <button id="bt{{ $empleado->id }}"data-id="{{url('empleado/' . $empleado->id)}}" onclick="modales({{$empleado->id}})">Delete</button>
            </td>
    </tr>
    @endforeach
</table>
<a href="{{url('empleado/create')}}">Create</a>
<a href="{{url('empleado/ordenar/showOrdenadosPorNombre')}}">order by name (asce)</a>
<a href="{{url('empleado/ordenar/showOrdenadosPorNombre2')}}">order by name (desc)</a>
</div>
@endsection


<script type="text/javascript" src="{{url('admin/assets/js/delete.js')}}"></script>