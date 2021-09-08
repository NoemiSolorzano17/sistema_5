
<div class="modal" tabindex="-1" role="dialog" id="ventanaModal_Informesubtema">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header" align="center">
        
          <h3 class="modal-title" > <b><i class="fa fa-file-text-o"></i> AGREGAR SUBTEMA</b></h5>
 
               <input type="hidden" name="_method" id="idns">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>  
          <br>
           @include('GestionInforme.ventanaModalSubtema')
            <div class="form-group">
             <div class="modal-footer">
                @include('GestionInforme.MostraSubtemas')
                </div>
          </div>
                
        </div>
          
       
    </div>
  </div>
</div>




