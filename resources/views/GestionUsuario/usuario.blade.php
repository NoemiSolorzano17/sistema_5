@extends('adminlte::layouts.app')
@section('main-content') 
 <h1>
       
        <small>@yield('contentheader_description')</small>
    </h1>
 <div class="container-fluid spark-screen">
    <div class="row">
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

          
    <div class="container">
            <div class="row">
                    <div class="col-md-11 text-center header">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-user bigicon"></i></span>
                            <span> USUARIOS </span> 
                        </legend>
                            <div class="panel-body"> 

                                @if(isset($edit))  
                                    @include('GestionUsuario.UsuarioModificar')
                                @else
                                    @include('GestionUsuario.register')
                                @endif
                             
                            </div>
                            
                        </div>
                    </div>
            </div>

        <div class="container">
            <div class="row">
                    <div class="col-md-11">
                        <div class="panel " >
                        <legend class="text-center header">
                            <span class=" text-center"><i class="fa fa-user bigicon"></i></span>
                            <span> TABLA USUARIOS </span> 
                        </legend>
                            <div class="panel-body"> 
                               @if(isset($edit))
                               @else
                             @include('GestionUsuario.UsuarioMostrar')
                             @endif
                            </div>
                            
                        </div>
                    </div>
            </div>
            
    </div>
   
  </div>
</div>

@include('GestionUsuario.cuerpoUsuario')
@include('GestionUsuario.modalconfirmareliminacionUsuario')
@include('GestionCargosUsuarios.ModalcargoUsusario')


@endsection

           <script>
              $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>