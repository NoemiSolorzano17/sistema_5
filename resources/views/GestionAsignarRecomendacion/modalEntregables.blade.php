

<div class="modal" tabindex="-1" role="dialog" id="ventanaAgregarEntregables">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i>AGREGAR ENTREGABLES</b></h5>
          <br>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>

          <input type="hidden" name="_method" id="id_Tarea_entregable">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
           @include('GestionAsignarRecomendacion.ventanaCrearEntregables')
           
            <div class="form-group">
            <br>
                @include('GestionAsignarRecomendacion.MostrarEntregables')
                
              
                </div>
        </div>
          
        
    </div>
  </div>
</div>

