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
  <ul class="flex-outer">
  <li class="flexInner">
    <h1>Nombre:</h1><p>{{$puesto->nombre}}</p>
  </li>
  <li class="flexInner">
    <h1>Minimo:</h1><p>{{$puesto->minimo}}</p>
  </li>
  <li class="flexInner">
    <h1>Maximo:</h1><p>{{$puesto->maximo}}</p>
  </li>
</ul>
<a href="{{url('puesto')}}">back</a>
</div>
@endsection

<script type="text/javascript" src="{{url('admin/assets/js/delete.js')}}"></script>
