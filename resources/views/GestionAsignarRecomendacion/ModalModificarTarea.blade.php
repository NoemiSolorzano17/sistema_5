
<div class="modal" tabindex="-1" role="dialog" id="actualizarTareasmodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i> MODIFICAR TAREAS</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
           @include('GestionAsignarRecomendacion.ModificarTareas')
        </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button type="button" class="btn btn-warning btn-sm" onclick="TareasUpdate();">MODIFICARS DATOS</button> 
        </div>
    </div>
  </div>
</div>