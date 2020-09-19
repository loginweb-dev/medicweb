<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ url('images/icons/icon-512x512.png') }}" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <style>
            body, html, #meet {
                margin: 0;
                overflow-x: hidden; 
                overflow-y: auto;
            }
            #left-panel{
                position: fixed;
                display: flex;
                align-items: center;
                justify-content: center;
                left: 0px;
                width: 50px;
                height: 90vh;
                z-index: 0;
            }
            .left-panel-item{
                display: none;
            }
            .loading-call{
                display: none;
            }
            .text-shadow{
                text-shadow: 2px 2px #dedede;
            }
        </style>
        <title>Consulta médica</title>
    </head>
    <body>
        @if (Auth::user()->role_id != 2)
            <div id="left-panel">
                <ul style="list-style: none">
                    <li class="left-panel-item">
                        <div class="mt-3">
                            <a href="#" data-toggle="modal" data-target="#modalCall"><i class="fa fa-phone fa-2x text-white text-shadow"></i></a>
                        </div>
                    </li>
                    <li class="left-panel-item">
                        <div class="mt-3">
                            <a href="#" title="Ver historial clínico" data-toggle="modal" data-target="#modal-historial"><i class="fa fa-user fa-2x text-white text-shadow"></i></a>
                        </div>
                    </li>
                    <li class="left-panel-item">
                        <div class="mt-3">
                            <a href="#" title="Redactar una receta" data-toggle="modal" data-target="#modal-prescription"><i class="fa fa-edit fa-2x text-white text-shadow"></i></a>
                        </div>
                    </li>
                    <li class="left-panel-item">
                        <div class="mt-3">
                            <a href="#" title="Emitir orden de laboratorio" data-toggle="modal" data-target="#modal-analysis-order"><i class="fa fa-newspaper-o fa-2x text-white text-shadow"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        
            <!-- Modal -->
            {{-- modal historial --}}
            <form class="form-modal" action="{{ url('admin/appointments/observations/create') }}" method="post">
                <div class="modal modal-info fade" tabindex="-1" id="modal-historial" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="voyager-person"></i> Historial clínico</h4>
                            </div>
                            <div class="modal-body">
                                <div class="modal-body">

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="list-historial-tab" data-toggle="tab" href="#list-historial" role="tab" aria-controls="list-historial" aria-selected="true">Detalles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="new-historial-tab" data-toggle="tab" href="#new-historial" role="tab" aria-controls="new-historial" aria-selected="false">Nuevo</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="list-historial" role="tabpanel" aria-labelledby="list-historial-tab">
                                            <div class="form-group col-md-12 mt-3">
                                                <div id="historial-list"></div>
                                                {{-- @include('admin.customers.partials.historial') --}}
                                            </div>
                                            <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cerrar</button>
                                            <br>
                                        </div>
                                        <div class="tab-pane fade" id="new-historial" role="tabpanel" aria-labelledby="new-historial-tab">
                                            <div class="row">
                                                @csrf
                                                <input type="hidden" name="appointment_id" value="{{ $meet->id }}">
                                                <div class="form-group col-md-12 mt-3">
                                                    <textarea name="description" class="form-control" rows="10" placeholder="Observaciones de la cita médica..." required></textarea>
                                                </div>
                                                <div class="form-group col-md-12 mt-3">
                                                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @include('admin.meetings.partials.prescriptions_create', ['customer_id' => $meet->customer_id, 'specialist_id' => $meet->specialist_id, 'appointment_id' => $meet->id, 'medicines' => $medicines])

            @include('admin.meetings.partials.analysis_order_create', ['customer_id' => $meet->customer_id, 'customer_name' => $meet->customer->name.' '.$meet->customer->last_name, 'specialist_id' => $meet->specialist_id, 'appointment_id' => $meet->id, 'analisis' => $analisis])

            <div class="modal fade" id="modalCall" tabindex="-1" role="dialog" aria-labelledby="modalCallLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCallLabel">Llamar al paciente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="text-muted">Deseas iniciar la consulta virtual?</h6>
                        <div class="text-center mt-3 loading-call">
                            <div class="spinner-border text-success" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-cancel-call" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary btn-call">Lamar</button>
                    </div>
                </div>
                </div>
            </div>
        @endif
        <div id="meet"></div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {{-- <script src='https://meet.jit.si/external_api.js'></script> --}}
        <script src='https://{{ setting('server-streaming.url_server') }}/external_api.js'></script>
        
        {{-- Select2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        {{-- SweetAler2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            // Pedir autorización para mostrar notificaciones
            Notification.requestPermission();
            
            // const domain = 'meet.jit.si';
            const domain = "{{ setting('server-streaming.url_server') }}";
            const options = {
                roomName: 'Consulta-{{ $meet->code }}',
                height: screen.height-100,
                parentNode: document.querySelector('#meet'),
                devices: {
                    audioInput: '<deviceLabel>',
                    audioOutput: '<deviceLabel>',
                    videoInput: '<deviceLabel>'
                },
                interfaceConfigOverwrite: {
                    TOOLBAR_BUTTONS: [
                        'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                        'fodeviceselection', 'profile', 'etherpad', 'settings', 'hangup',
                        'videoquality', 'filmstrip', 'feedback', 'stats', 'shortcuts',
                        'tileview', 'download', 'help', 'mute-everyone', 'e2ee', 'security',
                        'chat',
                        // 'raisehand',
                    ],
                    SHOW_JITSI_WATERMARK: false
                }
            };

            // const api = new JitsiMeetExternalAPI(domain, options);

            // // Video conferencia clinte/médico inicada
            // api.addEventListener('participantJoined', res => {
            //     $('.btn-call').text('Llamar');
            //     $('.loading-call').css('display', 'none');
            //     $('#modalCall').modal('hide');
            //     @if (Auth::user()->role_id == 2)
            //         let id = "{{ $meet->id }}";
            //         let url = "{{ url('admin/appointments/status') }}";
            //         $.get(`${url}/${id}/En_curso`);
            //     @else
            //         trackingMeet();
            //     @endif
            // })

            // // Finalizar la video conferencia
            // api.addEventListener('videoConferenceLeft', res => {
            //     @if (Auth::user()->role_id == 2)
            //         window.location = '{{ url("/home") }}';
            //     @else
            //         let id = "{{ $meet->id }}";
            //         let url = "{{ url('admin/appointments/status') }}";
            //         $.get(`${url}/${id}/Finalizada`);
            //         window.close();
            //     @endif
            // });

            $(document).ready(function(){

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    // timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                getObservations();

                // Mostrar/Ocultar menu lateral
                $('#left-panel').mouseover(function(){
                    $('.left-panel-item').css('display', 'block');
                });
                $('#left-panel').mouseout(function(){
                    $('.left-panel-item').css('display', 'none');
                });

                // Iniciar llamada
                $('.btn-call').click(function(){
                    $(this).text('Llamando...');
                    $('.loading-call').css('display', 'block');
                    let id = "{{ $meet->id }}";
                    let url = "{{ url('admin/appointments/status') }}";
                    $.get(`${url}/${id}/Conectando`, function(res){});
                });

                // Cancelar llamada
                $('.btn-cancel-call').click(function(){
                    $('.btn-call').text('Llamar');
                    $('.loading-call').css('display', 'none');
                });

                // Select de nombre de medicamento
                $('#select-medicine_name').select2({
                    tags: true,
                    dropdownParent: $('#modal-prescription'),
                    width: '100%',
                    createTag: function (params) {
                        return {
                        id: params.term,
                        text: params.term,
                        newOption: true
                        }
                    },
                    templateResult: function (data) {
                        var $result = $("<span></span>");
                        $result.text(data.text);
                        if (data.newOption) {
                            $result.append(" <em>(ENTER para agregar)</em>");
                        }
                        return $result;
                    },
                });

                // Agregar detalle de receta
                $('#btn-add-medicine').click(function(){
                    let medicina = $('#select-medicine_name').val();
                    let indicacion = $('#input-medicine_description').val();
                    if(medicina && indicacion){
                        $('#table-medicine tbody').append(`
                            <tr>
                                <td><input type="hidden" name="medicine_name[]" value="${medicina}">${medicina}</td>
                                <td><input type="hidden" name="medicine_description[]" value="${indicacion}">${indicacion}</td>
                            </tr>
                        `);
                        $('#input-medicine_description').val('');
                    }else{
                        Toast.fire({
                            icon: 'error',
                            title: 'Debes ingresar ambos campos'
                        })
                    }
                });

                // Guardar receta
                $('.form-modal').on('submit', function(e){
                    e.preventDefault();
                    $.post($(this).attr('action'), $(this).serialize(), function(res){
                        if(res.success){
                            Toast.fire({
                                icon: 'success',
                                title: res.success
                            });
                            $('.modal').modal('hide');
                            $('.form-modal').trigger("reset");
                            if(res.action){
                                switch (res.action) {
                                    case 'observations':
                                        getObservations()
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: res.error
                            });
                        }
                    });
                });

                // Actualizar ultimo hora de la reunión
                setInterval(() => {
                    @if (Auth::user()->role_id == 2)
                        if(api.getNumberOfParticipants() > 1){
                            trackingMeet();
                        }
                    @endif
                }, 20000);
            });

            // ***WebSockets***

            // Escuchando receta nuevo
            Echo.channel('PrescriptionNewChannel-{{ Auth::user()->id }}')
            .listen('PrescriptionNewEvent', (res) => {
                let notificacion = new Notification('Nueva prescripción médica!',{
                    body: `${res.prescription.specialist.prefix} ${res.prescription.specialist.name} ${res.prescription.specialist.last_name}`,
                    icon: '{{ url("images/icons/icon-512x512.png") }}'
                });
            });

            // Escuchando orden de analisis nueva
            Echo.channel('OrderAnalysisNewChannel-{{ Auth::user()->id }}')
            .listen('OrderAnalysisNewEvent', (res) => {
                let notificacion = new Notification('Nueva orden de laboratorio!',{
                    body: `${res.order_analysis.specialist.prefix} ${res.order_analysis.specialist.name} ${res.order_analysis.specialist.last_name}`,
                    icon: '{{ url("images/icons/icon-512x512.png") }}'
                });
            });

            // Escuchando desvío de llamada
            Echo.channel('DivertCallChannel-{{ $meet->id }}')
            .listen('DivertCallEvent', (res) => {
                $('.btn-call').text('Llamar');
                $('.loading-call').css('display', 'none');
                $('#modalCall').modal('hide');
                Swal.fire('Llamada desviada', `Motivo: ${res.message ? res.message : 'No definido'}`, 'warning')
            });

            // Obtener el historial de un cliente
            function getObservations(){
                $.get('{{ url("admin/appointments/observations/browse/".$meet->customer_id) }}', function(res){
                    $('#historial-list').html(res);
                });
            }

            // Hacer tracking a la reunión para ver su duración
            function trackingMeet(){
                let id = "{{ $meet->id }}";
                let url = "{{ url('admin/appointments/tracking') }}";
                $.get(`${url}/${id}`);
            }
        </script>
    </body>
</html>