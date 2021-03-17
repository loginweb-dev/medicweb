@extends('voyager::master')

@section('page_title', 'Reporte de pagos a especialistas')

@if(!auth()->user()->hasPermission('browse_users'))
    @php
    return 0;
    @endphp
@endif

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-dollar"></i> Reporte de pagos a especialistas
        </h1>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form id="form" class="form-inline" method="POST" action="{{ url('admin/reportes/payments/list') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="date" name="start" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="pwd">hasta</label>
                                        <input type="date" name="finish" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="specialist_id" class="form-control">
                                            <option value="">Todos</option>
                                            @foreach (\App\Specialist::where('deleted_at', NULL)->get() as $item)
                                            <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">Generar <i class="voyager-settings"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="list-table">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            $('#form').submit(function(e){
                $('#list-table').html('<h5 class="text-center" style="margin-top: 50px">Cargando...</h5>');
                e.preventDefault();
                let data = $(this).serialize();
                $.post($(this).attr('action'), data, function(res){
                    $('#list-table').html(res);
                });
            });
        });
    </script>
@stop
