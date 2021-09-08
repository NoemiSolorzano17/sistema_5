@if(session()->has('msj'))
<div class="alert alert-success" role="alert">
  {{ session('msj') }}
</div>
@endif

@if(session()->has('errormsj'))
<div class="alert alert-danger" role="alert">
  ¡Error al guardar los datos!
</div>
@endif 

<form role="form" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->
    <div class="form-group">
        <label for="descripcionDepartamento">Descripcion</label>
        <input type="text" class="form-control" required name="descripcionDepartamento"  id="descripcionDepartamento" placeholder="Ingrese la descripcion">
       
    </div>

    

    <button type="submit" class="btn btn-primary "onclick="ingresarDepartamento()">Guardar</i></button>
</form>