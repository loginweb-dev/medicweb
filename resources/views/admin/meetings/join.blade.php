<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        </style>
        <title>Consulta médica</title>
    </head>
    <body>
        <div id="left-panel">
            <ul style="list-style: none">
                <li class="left-panel-item">
                    <div class="mt-3">
                        <a href="#" data-toggle="modal" data-target="#modalCall"><i class="fa fa-phone fa-2x text-white"></i></a>
                    </div>
                </li>
                <li class="left-panel-item">
                    <div class="mt-3">
                        <a href="#" title="Redactar una receta" data-toggle="modal" data-target="#modalReceta"><i class="fa fa-edit fa-2x text-white"></i></a>
                    </div>
                </li>
                <li class="left-panel-item">
                    <div class="mt-3">
                        <a href="#" title="Emitir orden de laboratorio" data-toggle="modal" data-target="#modalReceta"><i class="fa fa-newspaper-o fa-2x text-white"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <div id="meet"></div>
  
        <!-- Modal -->
        <div class="modal fade" id="modalReceta" tabindex="-1" role="dialog" aria-labelledby="modalRecetaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRecetaLabel">Redactar receta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Medicamento</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Indicaciones</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                </div>
            </div>
            </div>
        </div>

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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {{-- <script src='https://meet.jit.si/external_api.js'></script> --}}
        <script src='https://{{ setting('server-streaming.url_server') }}/external_api.js'></script>
        <script>
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
                        // 'raisehand', 'chat',
                    ],
                    SHOW_JITSI_WATERMARK: false
                }
            };
            const api = new JitsiMeetExternalAPI(domain, options);

            // Video conferencia clinte/médico inicada
            api.addEventListener('participantJoined', res => {
                $('.btn-call').text('Llamar');
                $('.loading-call').css('display', 'none');
                $('#modalCall').modal('hide')
            })

            // Finalizar la video conferencia
            api.addEventListener('videoConferenceLeft', res => {
                let id = "{{ $meet->id }}";
                let url = "{{ url('admin/appointments/status') }}";
                $.get(`${url}/${id}/Finalizada`, function(res){
                    window.close();
                });
            });

            $(document).ready(function(){

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
                    $.get(`${url}/${id}/En_curso`, function(res){
                        console.log('llamando...')
                    });
                });

                // Cancalar llamada
                $('.btn-cancel-call').click(function(){
                    $('.btn-call').text('Llamar');
                    $('.loading-call').css('display', 'none');
                });
            });
        </script>
    </body>
</html>