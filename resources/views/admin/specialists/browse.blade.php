@extends('voyager::master')

@section('page_title', 'Especialistas')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-people"></i> Especialistas
        </h1>
        <a href="{{ route('specialists.create') }}" class="btn btn-success btn-add-new">
            <i class="voyager-plus"></i> <span>Crear</span>
        </a>
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
    <script src="{{ url('js/partials.js') }}"></script>
    <script src="{{ url('js/loginweb.js') }}"></script>
    <script>
        $(document).ready(function(){
            var loader = renderLoader();
            var inputSearch = '';
            $('#list-table').html(loader);

            // Cargar lista
            getList('{{ url("admin/specialists/list") }}', '#list-table');

            // Buscador
            $('#form-search').submit(function(e){
                e.preventDefault();
                let inputSearchNew = escape($('#search-input input[name="search"]').val()).split("/").join("");
                if(inputSearch !== inputSearchNew){
                    $('#list-table').html(loader);
                    inputSearch = inputSearchNew;
                    getList('{{ url("admin/specialists/list") }}', '#list-table', inputSearch);
                }
            });

            // Reset input del buscador
            $('.btn-reset-search').click(function(e){
                e.preventDefault();
                $('#search-input input[name="search"]').val('')
                $(this).addClass('hidden');
                getList('{{ url("admin/specialists/list") }}', '#list-table');
            });
        })
    </script>
@stop
