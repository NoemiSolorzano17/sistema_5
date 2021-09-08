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

<form role="form" method="POST"  enctype="multipart/form-data"  id="form_enviarFileD">

    {{ csrf_field() }} 

    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="fechaAprobacion"><b>Fecha Aprobación:</b></label>
        <input type="date" class="form-control" required name="fechaAprobacion" id="informe_fecha" placeholder="Ingrese la fechaAprobacion">
    </div>
    </div>
    </div>


    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="fechaLimite"><b>Fecha Limite:</b></label>
        <input type="date" class="form-control" required name="fechaLimite" id="informe_fechaLimite" placeholder="Ingrese la fecha limite">
        
    </div>
    </div>
    </div>

    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="memorandoSolicitud"><b>Memorando Solicitud:</b></label>
        <input type="text" class="form-control" required name="memorandoSolicitud" id="informe_memorando" placeholder="Ingrese la memorandoSolicitud">
    </div>
    </div>
    </div>


    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="temaExamen"><b>Tema Examen:</b></label>
        <input type="text" class="form-control" required name="temaExamen" id="informe_tema"  placeholder="Ingrese la temaExamen">

    </div>
    </div>
    </div>
   <!--
    <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="porcentajeCumplido"><b>%Cumplimiento:</b></label>
        <input type="text" class="form-control" name="porcentajeCumplido" id="informe_cumplido"  placeholder="Ingrese la %cumplimiento">

    </div>
    </div>
    </div>
-->
 <div class="col-md-4 ">
    <div class="panel " >
    <div class="form-group">
        <label for="codigoInforme"><b>Codigo Informe:</b></label>
        <input type="text" class="form-control" required name="codigoInforme" id="informe_codigo" placeholder="Ingrese la codigoInforme">
    
    </div>
    </div>
    </div>

<div class="col-md-4 ">
   <div class="panel " >
    <div class="form-group">
        <label for="tipoInforme_id"><b>Tipo Informe:</b></label>
        <select class="form-control" required name="tipoInforme_id" id="informe_tipo">
            
        @foreach($tipoInforme as $s)
               
               <option value="{{ $s->id }}">{{ $s->tipoInforme}}</option>
         
           @endforeach
           
       </select>

     </div>
    </div> 
    </div> 
    <div class="col-md-4 ">
                    <div class="panel " >
                    <div class="form-group">
                    <input type="file" class="form-control" name="input_file" id="verFile" >
                        

                    </div>
                    </div> 
    </div> 


  
<button type="submit" class="btn btn-primary " onclick="">Guardar</button>  
</div>   
</div> 
</form>
<br>
<br>
