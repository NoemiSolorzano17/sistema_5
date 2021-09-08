@guest
<input id="iduser" type="hidden" value="0">
@else
<input id="iduser" type="hidden" value="{{Auth::user()->id }}">
@endguest

<div class="row" >
            <div class="col-md-10">
              <p> <h3>Bandeja de Recomendaciones</h3></p>              
            </div>
          </div>
          <hr>
          <div class="table-responsive pre-scrollable">
          
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
              <th >Descripcion </th>
              <th >%Cumplimiento</th>
              <th >Estado</th>
              <th colspan="1">Aciones</th>          
     </tr>             
    </thead>
    <tbody id="tablaRecomendaciones">
    </tbody>
    </table>
    </div>
    <script src="{{ asset('js/GestionMisRecomendaciones.js') }}" defer></script>