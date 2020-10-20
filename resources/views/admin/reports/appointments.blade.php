@extends('voyager::master')

@section('page_title', 'Reporte de Citas médicas')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-browser"></i> Reporte de Citas médicas
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
                        <form id="form-search" class="form-search">
                            <div id="search-input">
                                <div class="input-group col-md-12">
                                    <span class="input-group-btn" style="margin-left: 10px; margin-top: 5px">
                                        <a href="#" class="btn-reset-search hidden"><i class="voyager-x text-danger"></i></a>
                                    </span>
                                    <input type="search" name="search" class="form-control input-search" placeholder="Buscar" name="s" value="" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="submit">
                                            <i class="voyager-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> 
                        </form>
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

@stop
