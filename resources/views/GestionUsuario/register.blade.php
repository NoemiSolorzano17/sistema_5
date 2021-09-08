

  <div class="container-fluid spark-screen">
    <div class="row">


<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>


<script>
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

</script>

        <div class="">
          <div id="app">
              <div class="">
                <!--   <div class="register-logo">
                      <a href="{{ url('/home') }}"><b>Help</b>Desk</a>
                  </div> -->

                  @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <div class="register-box-body"  >
                      
                        

                      <form role="form" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}  
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text"  onkeypress="return soloLetras(event)" class="form-control"  required name="name" id="name"  placeholder="Ingrese el Nombre">
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <input type="text"  onkeypress="return soloLetras(event)" class="form-control"  required name="apellidos" id="apellidos" placeholder=" Ingrese la Apellidos">
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control"  onkeypress='return validaNumericos(event)' maxlength="10" required name="cedula" id="cedula" placeholder="Ingrese la Cedula" >
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                            <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <select class="form-control" id="sexo" required name="sexo" placeholder="Ingrese la Cedula">
                                        <option disabled selected>Sexo</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
      
                                     </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" onkeypress='return validaNumericos(event)' maxlength="10" class="form-control"  required name="celular" id="celular" placeholder="Ingrese la Celular">
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                                 
                              </div>
                              
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" required  name="email"  id="email">
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-4">
                              <div class="form-group has-feedback">
                                      <input type="password" class="form-control" required name="password" id="password" placeholder="Ingrese la Contraseña">                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>

                             </div>
                               
                               
                              <div class="col-md-4">
                              <div class="form-group has-feedback">

                                <select class="form-control" required name="tipousuario_id" id="tipousuario_id">
                                  <option disabled selected>Tipo Usuario</option>
                                  @foreach($tipoUsuario as $s)
                                  <option value="{{ $s->id }}">{{ $s->descripciontipo }}</option>
          
                                     @endforeach
                                </select>

                              </div>   
                               </div>
                                
                               <div class="col-md-4">
                              <div class="form-group has-feedback">

                                <select class="form-control" required name="departamento_id" id="Usuario_departamento">
                                  <option disabled selected>Departamentos</option>
                                  @foreach($departamentos as $s)
                                  <option value="{{ $s->id }}">{{ $s->descripcionDepartamento }}</option>
          
                                     @endforeach
                                </select>

                              </div>   
                               </div>



                              <div class="row">
                         
                            <div class="col-md-1">
                                <button type="button" class="btn btn-primary" id="btnU" onclick="ingresarUsuario()">Guardar</button>

                                
                              
                               </div> 

                        </div>

                                                          
                          </div>


  
                  
                  </div><!-- /.form-box -->
              </div><!-- /.register-box -->
                <br>

                  <!-- TABLA DE LISTA DE USUARIOS -->

                 
          </div>




          @include('adminlte::auth.terms')

         
        </div>
    </div>
      

  
      </div>
  </div>


 <script>
              $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>