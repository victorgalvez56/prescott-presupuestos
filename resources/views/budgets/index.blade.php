@extends('adminlte::page')

@section('title','Presupuestos')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Agregar Presupuestos</h1>
                <!--                    --><?php //if ($permisos->insert == 1) : ?>
            {{--                    <a href="<?php echo base_url(); ?>mantenimiento/areas/add" class="btn btn-primary btn-flat"><span--}}
            {{--                            class="fa fa-plus"></span>Agregar Área</a>--}}
            <!--                    --><?php //endif; ?>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Presupuestos</li>
                    <li class="breadcrumb-item active">Agregar</li>

                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Regresar al inicio</a>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Meses</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            @foreach($months as $month)
                            <li class="nav-item active">
                                <a class="nav-link months" href="#tab_{{$month->id}}" data-toggle="tab">{{$month->name}}</a></
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Labels</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3 name_months">Seleccione un mes</h3>
                        <ul class="nav nav-pills ml-auto p-2">

{{--                        @foreach($months as $month)--}}

{{--                            <li class="nav-item"><a class="nav-link" href="#tab_{{$month->id}}" data-toggle="tab">{{$month->name}}</a></li>--}}
{{--                            @endforeach--}}
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            @foreach($months as $month)
                            <div class="tab-pane" id="tab_{{$month->id}}">
                                @foreach($batchs as $batch)
                                <div class="card card-success collapsed-card" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
                                        <div class="card-header">
                                            <h3 class="card-title">{{$batch['name']}}</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="card-refresh" data-source="widgets.html" data-source-selector="#card-refresh-content" data-load-on-init="false"><i class="fas fa-sync-alt"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body" style="display: none;">


                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                @endforeach

                            </div>
                        @endforeach
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
{{--                <div class="d-none card card-primary card-outline">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">Compose New Message</h3>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body">--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="note-editor note-frame card">--}}
{{--                                <div class="note-dropzone">--}}
{{--                                    <div class="note-dropzone-message">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!-- /.card-body -->--}}
{{--                    <div class="card-footer">--}}
{{--                        <div class="float-right">--}}
{{--                            <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft--}}
{{--                            </button>--}}
{{--                            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>--}}
{{--                        </div>--}}
{{--                        <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-footer -->--}}
{{--                </div>--}}
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('footer')
    @include('layouts.footer')
@stop
