@extends('voyager::master')

@section('page_title', 'Citas')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-browser"></i> Citas
        </h1>
        <a href="{{ route('appointments.create') }}" class="btn btn-success btn-add-new">
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

    {{-- Single delete modal --}}
    <div class="modal modal-dark fade" tabindex="-1" id="change_status_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-check"></i> {{ __('voyager::generic.delete_question') }} ?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Pedir autorización para mostrar notificaciones
        Notification.requestPermission();

        $(document).ready(function(){
            var loader = renderLoader();
            var inputSearch = '';
            $('#list-table').html(loader);

            // Cargar lista
            getList('{{ url("admin/appointments/list") }}', '#list-table');

            // Buscador
            $('#form-search').submit(function(e){
                e.preventDefault();
                let inputSearchNew = escape($('#search-input input[name="search"]').val()).split("/").join("");
                if(inputSearch !== inputSearchNew){
                    $('#list-table').html(loader);
                    inputSearch = inputSearchNew;
                    getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearch);
                }
            });

            // Reset input del buscador
            $('.btn-reset-search').click(function(e){
                e.preventDefault();
                $('#search-input input[name="search"]').val('')
                $(this).addClass('hidden');
                getList('{{ url("admin/appointments/list") }}', '#list-table');
            });


            // ***WebSockets***
            // Escuchando los pedidos nuevo
            Echo.channel('StartMeetChannel')
            .listen('StartMeetEvent', (res) => {
                if(Notification.permission==='granted'){
                    let notificacion = new Notification(`Cita médica ${res.meet.status}`,{
                        body: `${res.meet.especialista.prefix} ${res.meet.especialista.name} ${res.meet.especialista.last_name} - ${res.meet.cliente.name} ${res.meet.cliente.last_name}`,
                        // icon: '{{ url("img/assets/success.png") }}'
                    });
                }
                getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearch);
            });
        });
    </script>
@stop