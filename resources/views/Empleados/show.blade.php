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
  
<ul class="flex-outer">
  <li class="flexInner">
    <h1>Nombre:</h1><p>{{$empleado->nombre}}</p>
  </li>
  <li class="flexInner">
    <h1>apellidos:</h1><p>{{$empleado->apellidos}}</p>
  </li>
  <li class="flexInner">
    <h1>email:</h1><p>{{$empleado->email}}</p>
  </li>
  <li class="flexInner">
    <h1>telefono</h1><p>{{$empleado->telefono}}</p>
  </li>
  <li class="flexInner">
    <h1>fechacontrato</h1><p>{{$empleado->fechacontrato}}</p>
  </li>
  <li class="flexInner">
    <h1>idpuesto</h1><p>{{$empleado->puestos->nombre}}</p>
  </li>
  <li class="flexInner">
    <h1>iddepartamento</h1><p>{{$empleado->departamentos->nombre}}</p>
  </li>
</ul>


<a href="{{url('empleado')}}">back</a>
</div>
@endsection



<script type="text/javascript" src="{{url('admin/assets/js/delete.js')}}"></script>