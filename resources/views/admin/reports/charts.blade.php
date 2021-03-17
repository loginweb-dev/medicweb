@extends('voyager::master')

@section('page_title', 'Gráficos')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-dollar"></i> Gráficos
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
                            <div class="col-md-12 text-right">
                                <form id="form" class="form-inline" method="POST" action="{{ url('admin/reportes/payments/list') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="number" min="2020" step="1" name="anio" class="form-control" value="{{ date('Y') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="specialist_id" class="form-control">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
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
