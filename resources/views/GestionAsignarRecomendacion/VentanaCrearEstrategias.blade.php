<form id="formregistromodal"  method="post" enctype="multipart/form-data"> 
              
      <div class="row">
    

 <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>  
<!--onkeypress="return soloLetras(event)" dentro del input -->
        <input type="hidden" name="_method" id="idEstrategiasReco">

              
      <div class="col-md-12">
         <div class="form-group has-feedback">
           <label for="descripcionEstrategia"></label>
            <textarea class="form-control" name="descripcionEstrategia" id="Estrategia_descripcion" placeholder="Ingrese la descripcion">
                 </textarea>
         </div>
       </div>

   <div class="col-md-12">
       <div class="form-group has-feedback">
       <label for="Estrategia_fechaCreacion">Fecha de Creacion</label>
        <input type="date" class="form-control" id="Estrategia_fechaCreacion"   name="fecha">
        </div>
     </div>

     <div class="col-md-12">
       <div class="form-group has-feedback">
       <label for="fecha">Fecha de finalización</label>
        <input type="date" class="form-control" id="Estrategia_fecha"   name="fecha">
        </div>
     </div>
              
     <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarEstrategia();">AGREGAR</button> 
        </div>
            
</div>
                
</form>
          
     