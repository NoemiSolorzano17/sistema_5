@guest
<input id="idinasistenciausuario" type="hidden" value="0">
@else
<input id="idinasistenciausuario" type="hidden" value="{{Auth::user()->id }}">
@endguest


<div class="row" >
            <div class="col-md-10">
              <p> <h3>Asignar Inasistencias</h3></p>              
            </div>
          </div>
          <hr>
          <div class="table-responsive pre-scrollable">
          
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
              <th >Usuario</th>
               <th>Recomendacion</th>
               <th >Acciones</th>         
     </tr>             
    </thead>
    <tbody id="tablausuario_reco">
    </tbody>
    </table>
    </div>


