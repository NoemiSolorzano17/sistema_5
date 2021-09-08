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
                 
                                @include('GestionAsignarRecomendacion.Tablaregistro')
                                                                    
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
@include('GestionAsignarRecomendacion.modalMisRecomendaciones')
@include('GestionAsignarRecomendacion.ModalTareas') 
@include('GestionAsignarRecomendacion.ModalModificarTarea') 
@include('GestionAsignarRecomendacion.ModalEntregables')
@include('GestionAsignarRecomendacion.ModalEstrategia')


<!--MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN-->
@endsection


