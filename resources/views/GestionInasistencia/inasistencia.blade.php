@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Register
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="">
            <div id="app">
                <div class="">
    
                        <div class="register-box-body"  >
                 
                        @include('GestionInasistencia.MostarUsuario_Recomendacio')
                                                                    
                    </div>
                  <!-- /.form-box -->       
                </div><!-- /.register-box -->
                <br>    
           </div>
        </div>
    </div>
    <div >
        <!-- TABLA DE LISTA DE USUARIOS -->
     
        
    </div>

</div>

<!--   MODAL PARA ACTUALIZAR DATOS USUARIOS -->

<!--MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN-->
@endsection

   