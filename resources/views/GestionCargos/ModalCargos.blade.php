
<div class="modal" tabindex="-1" role="dialog" id="ventanaAgregarCargos">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i>AGREGAR CARGOS</b></h5>
          <br>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>

          <input type="hidden" name="_method" id="id_departamento">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
           @include('GestionCargos.CrearCargos')
            <div class="form-group">
            <br>
                @include('GestionCargos.CargosMostrar')
              
                </div>
        </div>
          
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">SALIR</button>
          <button type="button" class="btn btn-primary btn-sm" onclick="ingresarCargos();">AGREGAR</button> 
        </div>
    </div>
  </div>
</div>
