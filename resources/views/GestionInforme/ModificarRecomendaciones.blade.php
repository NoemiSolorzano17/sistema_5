
         <form id="formregistromodal"  method="post"> 
                      
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="text" name="id" id="idRecomendaciones" hidden >
                      <div class="row">

                          <div class="col-md-12">
                              <div class="form-group has-feedback">
                                  <label> <b>Descripción:</b></label>
                                  <textarea  class="form-control" placeholder="Descripcion" id="recomendaciones_d" name="descripcionRecomendacion"required />
                                  </textarea>
                              </div>
                          </div>
                                                   
                    </div>

              </form>
  
