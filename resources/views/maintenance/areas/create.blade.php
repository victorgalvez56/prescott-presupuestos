@extends('adminlte::page')

@section('title','Áreas')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Áreas</h1>
                <!--                    --><?php //if ($permisos->insert == 1) : ?>
            {{--                    <a href="<?php echo base_url(); ?>mantenimiento/areas/add" class="btn btn-primary btn-flat"><span--}}
            {{--                            class="fa fa-plus"></span>Agregar Área</a>--}}
            <!--                    --><?php //endif; ?>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Áreas</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Áreas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Creado por</th>
                                <th>Actualizado por</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($areas)) : ?>
                            <?php foreach ($areas as $area) : ?>
                            <tr>
                                <td><?php echo $area->nombre; ?></td>
                                <td><?php echo $area->descripcion; ?></td>
                                <td><?php echo $area->nombreGerencia; ?></td>
                                <td><?php echo $area->create_by . " " . $area->create_at; ?></td>
                                <td><?php echo $area->update_by . " " . $area->update_at ?></td>

                                <td>
                                    <div class="btn-group">
                                        <?php if ($permisos->update == 1) : ?>
                                        <a href="<?php echo base_url() ?>mantenimiento/areas/edit/<?php echo $area->id; ?>"
                                           class="btn btn-warning btn-lg"><span class="fas fa-edit"></span></a>
                                        <?php endif; ?>
                                        <?php if ($permisos->delete == 1) : ?>
                                        <button class="btn btn-danger btn-lg" value="<?php echo $area->id;?>"
                                                id="modalConfirmacion" data-toggle="modal"
                                                data-target="#modal-default"><span class="fas fa-trash"></span>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
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
    <p>Bienvenido a este template</p>
@stop
