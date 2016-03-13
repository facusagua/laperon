@extends('layouts.app')

<?php $message = Session::get('message'); ?>    

@if($message == 'store')
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Has creado correctamentee la tarea.-
    </div>
@endif

@if($message == 'delete')
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>La tarea se elimino correctamente.-
    </div>
@endif

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nueva Tarea
                </div>
                <div class="panel-body">
                    {!!Form::open(['url'=>'create'])!!}
                        <div class="form-group">
                                {!!Form::label('name','Nombre:',array('class' => 'col-sm-3 control-label'))!!}
                            <div class="col-sm-6">
                                {!!Form::text('task',null,['class'=>'col-sm-6 form-control'])!!}
                            </div>
                            {!!Form::submit('Agregar Tarea',['class'=>'col-sm-3 btn btn-info'])!!}
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tareas Recientes
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td class="col-md-3">
                                     {!!Form::open(['url'=> ['destroy',$task->id],'method'=>'DELETE'])!!}
                                        {!!Form::submit('X',['class'=>'col-sm-3 btn btn-danger'])!!}
                                    {!!Form::close()!!}
                                    </td>
                                    <td class="col-md-9 table-text">
                                        {{$task->nombre}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection
