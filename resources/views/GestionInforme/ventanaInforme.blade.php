<form id="formregistromodal"  method="post"> 
              <input type="text" name="id" id="idInforme" hidden >
        <div class="row">

              <div class="col-md-4">
                 <div class="form-group has-feedback">
                    <label> <b>Fecha Aprobación</b></label>
                    <input type="date" class="form-control" placeholder="fecha Aprobacion" id="InformeFecha" name="fechaAprobacion"required />
                 </div>
              </div>
              <div class="col-md-4">
                 <div class="form-group has-feedback">
                    <label> <b>Fecha Limite</b></label>
                    <input type="date" class="form-control" placeholder="fecha Limite" id="InformeFechalimite" name="fechaLimite"required />
                 </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="memorandoSolicitud"> <b>Memorando Solicitud </b></label>
                      <input type="text" class="form-control" id="InformeMemorando" name="memorandoSolicitud">
                  </div>
              </div>
               <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="temaExamen"><b>Tema Examen</b></label>
                      <input type="text" class="form-control" id="InformeTema" name="temaExamen">
                  </div>
              </div>
            <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="porcentajeCumplido"><b>% Cumplimiento</b></label>
                      <input type="text" class="form-control" id="InformeCumplimiento" name="porcentajeCumplido">
                  </div>
            </div>
              
              <div class="col-md-4">
                  <div class="form-group has-feedback">
                      <label for="codigoInforme"><b>Codigo Informe</b></label>
                      <input type="text" class="form-control" id="InformeCodigo" name="codigoInforme">
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="tipoInforme_id"><b>Tipo Informe</b></label> <br>
                                    
                                      <select class="form-control" id="informe_tipoinforme"   name="tipoInforme_id"required/>
                                       @if(isset($tipoInforme))
                                      @foreach($tipoInforme as $t)
                                      <option value="{{$t->id}}" selected>{{$t->tipoInforme}}</option>
                                        
                                      @endforeach
                                      @endif

                                </select>
                              
                </div>
                                 
              </div>



        </div>
             
         </form>
