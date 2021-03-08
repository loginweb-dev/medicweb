@extends('voyager::master')

@section('page_title', 'Citas médicas')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-title">
                    <i class="voyager-browser"></i> Citas médicas
                </h1>
                {{-- <a href="{{ route('appointments.create') }}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>Crear</span>
                </a> --}}
                @if ($specialist )
                    <input type="checkbox" data-id="{{ $specialist->id }}" @if($specialist->status) checked @endif id="checkbox-status" data-toggle="toggle" data-on="Activo" data-off="Inactivo">
                @endif
            </div>
            <div class="col-md-6">
                @if (Auth::user()->role_id == 5)
                <h2 class="text-right text-muted" id="label-monto-acumulado" style="cursor: pointer"></h2>
                @endif
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="alert alert-danger alert-available" @if(!$specialist || ($specialist && $specialist->status)) style="display:none" @endif>
            <strong>Atención:</strong>
            <p>No puedes acceder a tus citas médicas debido a que estas inactivo.</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if (!$specialist )
                                <input type="checkbox" checked id="checkbox-view" data-toggle="toggle" data-on="Todas" data-off="Hoy día">
                                @endif
                            </div>
                            <div class="col-md-6">
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
    <style>
        .card-header{
            background-color: #f8f8f8;
            border: 2px solid #ccc
        }
    </style>
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
            var current_page = 1;

            $('#list-table').html(loader);

            // Cargar lista
            getList('{{ url("admin/appointments/list") }}', '#list-table');

            // Buscador
            $('#form-search').submit(function(e){
                e.preventDefault();
                inputSearchNew = escape($('#search-input input[name="search"]').val()).split("/").join("");
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

            // Actualizar status
            $('#checkbox-view').change(function(){
                let status = $(this).prop('checked') ? 1 : 0;
                getList('{{ url("admin/appointments/list") }}', '#list-table', 'all', 1, status ? 1 : 0);
            });

            // Actualizar status
            $('#checkbox-status').change(function(){
                let id = $(this).data('id');
                let status = $(this).prop('checked') ? 1 : 0;
                let url = '{{ url("admin/specialists/update/status") }}';
                $.get(`${url}/${id}/${status}`, function(res){
                    if(res.data){
                        toastr.success('Bien hecho!', 'Estado actualizado.');
                        if(res.data.status == 1){
                            $('.alert-available').fadeOut();
                            $('.action-available').fadeIn();
                        }else{
                            $('.alert-available').fadeIn();
                            $('.action-available').fadeOut();
                        }
                    }else{
                        toastr.error('Error!', res.error);
                    }
                });
            });

            $('#label-monto-acumulado').click(function(){
                Swal.fire(
                    'Información',
                    'El monto mostrado en la parte superior derecha se calcula a partir del número de citas realizadas multiplicado por el porcentaje de ganancia.',
                    'info'
                )
            });


            // ***WebSockets***
            // Escuchando inicio de cita médica
            Echo.channel('StartMeetChannel')
            .listen('StartMeetEvent', (res) => {
                if(Notification.permission==='granted'){
                    if(res.meet.status != 'Conectando'){
                        try {
                            let notificacion = new Notification(`Cita médica ${res.meet.status}`,{
                                body: `${res.meet.specialist.prefix} ${res.meet.specialist.name} ${res.meet.specialist.last_name} - ${res.meet.customer.name} ${res.meet.customer.last_name}`,
                                icon: '{{ url("images/icons/icon-512x512.png") }}'
                            });
                        } catch (error) {}
                    }
                }
                getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearch, current_page);
            });

            // Escuchando llamada a specialista
            Echo.channel('IncomingCallSpecialistChannel-{{ Auth::user()->id }}')
            .listen('IncomingCallSpecialistEvent', (res) => {
                if(Notification.permission==='granted'){
                    console.log(res)
                    try {
                        if(res.meet.status == 'Conectando' && '{{ Auth::user()->role_id }}' == 5){
                            let notificacion = new Notification(`Tienes un cliente en espera`,{
                                body: `Paciente ${res.meet.customer.name} ${res.meet.customer.last_name}`,
                                icon: '{{ url("images/icons/icon-512x512.png") }}'
                            });
                            notificacion.onclick = (e) => {
                                window.open("{{ url('meet') }}/"+res.meet.id, "_blank");
                            }
                        }
                    } catch (error) {}
                }
                getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearch, current_page);
            });

            // Escuchando pago en revisión
            Echo.channel('VerifyPaymentChannel')
            .listen('VerifyPaymentEvent', (res) => {
                if(Notification.permission==='granted'){
                    try {
                        if('{{ Auth::user()->role_id }}' == 1 || '{{ Auth::user()->role_id }}' == 3){
                            let notificacion = new Notification(`Tienes un pago por validar`,{
                                body: `Cliente ${res.appointment.customer.name} ${res.appointment.customer.last_name}`,
                                icon: '{{ url("images/icons/icon-512x512.png") }}'
                            });
                            notificacion.onclick = (e) => {
                                window.open("{{ url('admin/appointments') }}", "_blank");
                            }
                            getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearch);
                        }
                    } catch (error) {}
                }
            });
        });

        function getAmount(){
            let monto = 0;
            let cont = 0;
            $('.label-amount').each(function(){
                monto += parseFloat($(this).data('amount'));
                if($(this).data('amount') > 0){
                    cont++;
                }
            });
            let labelCitas = cont == 1 ? 'cita' : 'citas';
            $('#label-monto-acumulado').html(`${monto.toFixed(2)} Bs. <br><small>${cont} ${labelCitas} sin cobrar</small>`);
        }
    </script>
@stop
