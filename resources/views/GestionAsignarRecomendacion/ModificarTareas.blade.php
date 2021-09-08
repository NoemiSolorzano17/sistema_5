
         <form id="formregistromodal"  method="post"> 
              <div class="row">
                      <input type="text" name="id" id="idTarea" hidden >

                          <div class="col-md-6">
                              <div class="form-group has-feedback">
                                  <label> <b>Descripción:</b></label>
                                  <input type="text" class="form-control" placeholder="Descripción" id="tarea_d" name="descripcionTarea"required />
                              </div>
                          </div>
                          

                           <div class="col-md-6">
                              <div class="form-group has-feedback">
                                  <label> <b>Fecha Creacion:</b></label>
                                  <input type="datetime" class="form-control" placeholder="Fecha Creacion" id="tarea_fComienzo" name="fechaCreacion"required />
                              </div>
                          </div>

            <div class="col-md-6">
              <div class="form-group has-feedback">
                  <label for="fechafinalizacion">Fecha Finalización</label>
                  <input type="datetime" class="form-control" id="tarea_final"   name="fecha"required/>
              </div>
              </div>
                          
                </div>

       </form>
  
