@extends('base')

@section('content')



<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form id="modalForm" class="modal-content" action="" method="post">
    @method('delete')
    @csrf
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your departamento?</p>
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
        <td>nombre</td><td>localizacion</td><td>idempleadojefe</td><td>show</td><td>edit</td><td>delete</td>
    </tr>
    @foreach($departamentos as $departamento)
    <tr>
       <td>{{$departamento->nombre}}</td><td>{{$departamento->localizacion}}</td><td>{{$departamento->idempleadojefe}}</td><td><a href="{{url('departamento/' . $departamento->id)}}">show</a></td><td><a href="{{url('departamento/' . $departamento->id . '/edit')}}">edit</a></td>
       <td>
               <button id="bt{{ $departamento->id }}" data-id=" {{'departamento/' . $departamento->id }}"  onclick="modales({{$departamento->id}})">borrar</button>
            </td>
    </tr>
    @endforeach
</table>
<a href="{{url('departamento/create')}}">Create</a>
<a href="{{url('departamento/ordenar/showOrdenadosPorNombre')}}">order by name (asce)</a>
<a href="{{url('departamento/ordenar/showOrdenadosPorNombre2')}}">order by name (desc)</a>
</div>
@endsection

<script type="text/javascript" src="{{url('admin/assets/js/delete.js')}}"></script>