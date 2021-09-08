<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="actualizarInformemodal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"s></i> Actualizar Informe</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
          <div class="modal-body">
          <br>
          @include('GestionInforme.ventanaInforme')
          </div>
          
        </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button type="button" class="btn btn-warning btn-sm" onclick="informeUpdate();">MODIFICARS DATOS</button> 
        </div>
    </div>
  </div>
</div>