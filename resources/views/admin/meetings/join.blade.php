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
                text-shadow: 2px 2px #000;
            }
        </style>
        <title>Consulta médica | {{ setting('site.title') }}</title>
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
            
            @include('admin.meetings.partials.history', ['meet_id' => $meet->id])

            @include('admin.meetings.partials.prescriptions_create', ['customer_id' => $meet->customer_id, 'specialist_id' => $meet->specialist_id, 'appointment_id' => $meet->id, 'medicines' => $medicines])

            @include('admin.meetings.partials.analysis_order_create', ['customer_id' => $meet->customer_id, 'customer_name' => $meet->customer->name.' '.$meet->customer->last_name, 'specialist_id' => $meet->specialist_id, 'appointment_id' => $meet->id, 'analisis' => $analisis])

            @include('admin.meetings.partials.call')
        @endif
        <div id="meet"></div>

        <div id="message-especialist" class="container" style="margin-top: 100px; display: none">
            <div class="jumbotron">
                <h1 class="display-4">Llamada finalizada</h1>
                <p class="lead">Gracias por utilizar {{ setting('site.title') }}.</p>
                <hr class="my-4">
                <p>Para registrar la finalización de la video conferencia precio el boton <b>Ir al panel</b>.</p>
                <button class="btn btn-primary btn-lg btn-ends-call" role="button">Ir al panel <i class="fa fa-dashboard"></i></button>
            </div>
        </div>

        <div id="message-customer" class="container" style="margin-top: 100px; display: none">
            <div class="jumbotron">
                <h1 class="display-4">Llamada finalizada</h1>
                <p class="lead">Gracias por utilizar {{ setting('site.title') }}.</p>
                <hr class="my-4">
                <p>Para volver al panel de inicio preciona el boton de abajo.</p>
                <a class="btn btn-primary btn-lg" href="{{ url("/home?id=".$meet->id) }}" role="button">Volver al inicio <i class="fa fa-home"></i></a>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {{-- <script src='https://meet.jit.si/external_api.js'></script> --}}
        <script src='https://{{ setting('server-streaming.url_server') }}/external_api.js'></script>
        
        {{-- Select2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

        {{-- SweetAler2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script src="{{ asset('js/loginweb.js') }}"></script>

        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            // Pedir autorización para mostrar notificaciones
            Notification.requestPermission();
            
            const domainServer = "{{ setting('server-streaming.url_server') }}";
            const roomName = 'Consulta-{{ $meet->code }}';
            const options = {
                roomName: roomName,
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

            const api = new JitsiMeetExternalAPI(domainServer, options);

            // Video conferencia clinte/médico inicada
            api.addEventListener('participantJoined', res => {
                $('.btn-call').text('Llamar');
                $('.loading-call').css('display', 'none');
                $('#modalCall').modal('hide');
                @if (Auth::user()->role_id == 2)
                    let id = "{{ $meet->id }}";
                    let url = "{{ url('admin/appointments/status') }}";
                    $.get(`${url}/${id}/En_curso`);
                @else
                    trackingMeet();
                @endif
            })

            // Finalizar la video conferencia
            api.addEventListener('videoConferenceLeft', res => {
                $('#meet').css('display', 'none');
                @if (Auth::user()->role_id == 2)
                    window.location = '{{ url("/home?id=".$meet->id) }}';
                    $('#message-customer').css('display', 'block');
                @else
                    $('#message-especialist').css('display', 'block');
                @endif
            });

            $(document).ready(function(){

                var index = 1;

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

                    // Notificación movil
                    let urlMessaging = "{{ env('FIREBASE_CLOUD_MESSAGING_URL') }}";
                    let FCMToken = "{{ env('FIREBASE_CLOUD_MESSAGING_TOKEN') }}";
                    let meet = @json($meet);
                    let uri = "{{ url('storage') }}";
                    let notification = {
                        title: "Videollamada entrante",
                        message: meet.specialist.full_name,
                    }
                    let data = {
                        id: meet.id,
                        url: `https://${domainServer}/${roomName}`,
                        specialistName: meet.specialist.full_name,
                        // specialistAvatar: 'https://livemedic.net/storage/users/October2020/p7Q6Gh4iQ8qLhd7obquZ-cropped.jpg'
                        specialistAvatar: `${uri}/${meet.specialist.user.avatar}`,
                        type: 'calling'
                    }
                    // console.log(data)
                    sendNotificationApp(urlMessaging, FCMToken, meet.customer.user.firebase_token, notification, data);
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
                            <tr id="tr-${index}">
                                <td><input type="number" class="form-control" name="quantity[]" value="1" style="width:100px"></td>
                                <td><input type="hidden" name="medicine_name[]" value="${medicina}">${medicina}</td>
                                <td><input type="hidden" name="medicine_description[]" value="${indicacion}">${indicacion}</td>
                                <td><button type="button" class="btn btn-link btn-sm text-danger" onclick="removeTr(${index})"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        `);
                        $('#input-medicine_description').val('');
                        index++;
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
                    $.post($(this).attr('action'), $(this).serialize(), (res) => {
                        if(res.success){
                            Toast.fire({
                                icon: 'success',
                                title: res.success
                            });
                            $('.form-modal').trigger("reset");
                            getObservations();
                            $('#table-medicine tbody').empty();

                            // Notificación movil
                            if($(this).data('type')){
                                let urlMessaging = "{{ env('FIREBASE_CLOUD_MESSAGING_URL') }}";
                                let FCMToken = "{{ env('FIREBASE_CLOUD_MESSAGING_TOKEN') }}";
                                let meet = @json($meet);
                                let notification = {
                                    title: "Nuevo historial clínico",
                                    message: meet.specialist.full_name,
                                }
                                let data = {
                                    message: $(this).data('type') == 'analysi' ? 'Tienes una orden de análisis nueva.' : 'Tienes una prescipción médica nueva.',
                                    type: 'prescription_analysi'
                                }
                                sendNotificationApp(urlMessaging, FCMToken, meet.customer.user.firebase_token, notification, data);
                            }

                            $('.modal-history').modal('hide');
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

                // Terminar llamada
                $('.btn-ends-call').click(async function(){
                    
                    // Notificación movil
                    let urlMessaging = "{{ env('FIREBASE_CLOUD_MESSAGING_URL') }}";
                    let FCMToken = "{{ env('FIREBASE_CLOUD_MESSAGING_TOKEN') }}";
                    let meet = @json($meet);
                    let notification = {
                        title: "Califica nuestro servicio",
                        message: `Por favor califica el servicio recibido por el/la ${meet.specialist.full_name}.`,
                    }
                    let data = {
                        id: meet.id,
                        type: 'call_rating'
                    }
                    
                    await sendNotificationApp(urlMessaging, FCMToken, meet.customer.user.firebase_token, notification, data);
                    
                    // Cambiar de estado y redireccionar
                    let id = "{{ $meet->id }}";
                    let url = "{{ url('admin/appointments/status') }}";
                    $.get(`${url}/${id}/Finalizada`, function(res){
                        // window.close();
                        window.location = "{{ url('admin/appointments') }}/";
                    });
                });
            });

            // ***WebSockets***

            // Escuchando receta nuevo
            Echo.channel('PrescriptionNewChannel-{{ Auth::user()->id }}')
            .listen('PrescriptionNewEvent', (res) => {
                try {
                    let notificacion = new Notification('Nueva receta médica!',{
                        body: `${res.prescription.specialist.prefix} ${res.prescription.specialist.name} ${res.prescription.specialist.last_name}`,
                        icon: '{{ url("images/icons/icon-512x512.png") }}'
                    });
                    notificacion.onclick = (e) => {
                        window.open("{{ url('home/prescriptions/details') }}/"+res.prescription.id, "_blank");
                    }
                } catch (error) {}
            });

            // Escuchando orden de analisis nueva
            Echo.channel('OrderAnalysisNewChannel-{{ Auth::user()->id }}')
            .listen('OrderAnalysisNewEvent', (res) => {
                try {
                    let notificacion = new Notification('Nueva orden de laboratorio!',{
                        body: `${res.order_analysis.specialist.prefix} ${res.order_analysis.specialist.name} ${res.order_analysis.specialist.last_name}`,
                        icon: '{{ url("images/icons/icon-512x512.png") }}'
                    });
                    notificacion.onclick = (e) => {
                        window.open("{{ url('home/order_analysis/details') }}/"+res.prescription.id, "_blank");
                    }
                } catch (error) {}
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

            function removeTr(index){
                $(`#tr-${index}`).remove();
            }
        </script>
    </body>
</html>