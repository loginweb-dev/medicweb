<div class="col-md-12 mb-3">
    <h5><a href="#" class="btn-breadcrunb" data-show="#div-list-specialities">Especialidades</a> / {{ $especialidad }}</h5>
</div>
@forelse ($especialistas as $item)
<div class="col-md-3 mb-5">
    <div class="card">
        <img class="card-img-top" src="{{ $item->user->avatar != 'users/default.png' ? asset('storage/'.str_replace('.', '-cropped.', $item->user->avatar)) : url('images/doctor.png') }}" alt="{{ $item->name }} {{ $item->last_name }}">
        <div class="card-body" style="padding-bottom: 10px">
            <h5 class="card-title mb-0">{{ $item->prefix }} {{ $item->name }} {{ $item->last_name }} <br> <small>{{ $item->location }}</small> </h5>
            <p class="card-text mt-0 mb-0">
                @foreach ($item->specialities as $especialidad)
                    <label class="badge badge-{{ $especialidad->color }}">{{ $especialidad->name }}</label>
                @endforeach
            </p>
            <h6 class="card-title text-right"><small>Precio de consulta </small>{{ count($item->specialities) ? $item->specialities[0]->price : 'NN' }} Bs.</h6>
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="my-rating-{{ $item->id }}"></div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white text-center">
            @if($item->status == 2)
            <span class="badge badge-danger mb-2">En una consulta médica</span> <span class="fas fa-circle faa-flash animated text-danger"></span>
            @elseif($item->status == 0)
            <span class="badge badge-danger mb-2">No disponible</span>
            @endif
            <button class="btn btn-success btn-sm btn-block btn-new-appointment" data-specilalist='@json($item)'>Nueva cita <span class="fas fa-laptop-medical"></span></button>
            <button class="btn btn-info btn-sm btn-block" data-id="{{ $item->id }}">Ver detalles <span class="fas fa-calendar"></span></button>
        </div>
    </div>
</div>
@empty
    <div class="col-md-8 offset-md-2 text-center">
        <div class="card">
            <div class="card-header">No hay especialistas</div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Estamos trabajando para habilitar esta especialidad muy pronto con el fin de brindarle una mejor atención.</p>
                    <footer class="blockquote-footer">Gracias por su compresión <cite title="Source Title">{{ setting('site.title') }}</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
@endforelse

<div class="col-md-12 text-center mt-5">
    <button type="button" class="btn btn-lg btn-primary btn-breadcrunb" data-show="#div-list-specialities"> <span class="fas fa-arrow-alt-circle-left"></span> Volver atras</button>
</div>

<style>
    .btn-schedules:hover{
        text-decoration-line: underline;
        font-size: 14px
    }
</style>

<script>
    $(document).ready(function(){
        // Presionar en la miga de pan
        $('.btn-breadcrunb').click(function(){
            let value = $(this).data('show');
            $('.div-dismiss').fadeOut('fast', () => {
                $(value).fadeIn();
            });
        });

        // Inicializar Ratings
        @foreach($especialistas as $item)
        @php
            // Calcular puntuación
            $cont = 0;
            $rating = 0;
            foreach($item->appointments as $citas){
                if(count($citas->rating)){
                    $cont++;
                    $rating += $citas->rating[0]->rating;
                }
            }
        @endphp
        $(".my-rating-{{ $item->id }}").starRating({
            starSize: 20,
            initialRating: {{ $cont > 0 ? $rating/$cont : 0 }},
            readOnly: true,
            starGradient: {start: '#FFDC0F', end: '#F0CF0E'}
        });
        @endforeach

        // Crear nueva cita
        $('.btn-new-appointment').click(function(){
            $('#div-schedules-specilaist').empty();
            $('#schedules-list').empty();
            $('.btn-payment').removeAttr('disabled');
            
            let specilalist = $(this).data('specilalist');
            if(specilalist.id){
                $('#form-appointments input[name="specialist_id"]').val(specilalist.id);
                if(specilalist.specialities.length){
                    $('#form-appointments input[name="price"]').val(specilalist.specialities[0].price);
                    $('#form-appointments input[name="price_add"]').val('{{ $horario_actual->price_add }}');
                }
                $('#modal-appointments').modal('show');
                let date = new Date();
                let year = date.getFullYear();
                let month = String(date.getMonth()+1).padStart(2, "0");
                let day = String(date.getDate()).padStart(2, "0");;
                let hours = String(date.getHours()).padStart(2, "0");
                let minutes = String(date.getMinutes()).padStart(2, "0");
                $('#input-date-1').val(`${year}-${month}-${day}`);
                $('#form-appointments input[name="start"]').val(`${hours}:${minutes}`);

                // Set información del especialista
                $('#img-specialist').attr('src', `storage/${specilalist.user.avatar.replace('.','-cropped.')}`);
                
                let days = ['', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo']
                for (let index = 1; index <= 7; index++) {
                    let schedules_details = '';
                    specilalist.schedules.map(data => {
                        if(index == data.day){
                            schedules_details += `<small style="cursor:pointer;" class="text-primary btn-schedules" onclick="getAvalilable(${data.id})"><b>${data.start.slice(0, -3)} a ${data.end.slice(0, -3)}</b></small><a><br>`;
                        }
                    });
                    $('#div-schedules-specilaist').append(`
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <div class="card-header text-center" style="padding:0px">${days[index]}</div>
                                <div class="card-body text-center" style="padding:0px">
                                    ${schedules_details}
                                </div>
                            </div>
                        </div>
                    `);
                }

                $('.alert-message').css('display', 'none');
                $('#title-specialist').html(`<h6 class="">${specilalist.prefix} ${specilalist.name} ${specilalist.last_name}</h6>`);
                
                // Montrar las instrucciones según el estado del mñedico
                if(specilalist.status == 0){
                    $('#message-error-available').css('display', 'block');
                    $('#badge-available').html(`<span class="badge badge-danger">No disponible</span>`);
                    $('.btn-payment').attr('disabled', 'disabled');
                }else if(specilalist.status == 1){
                    $('#message-success-available').css('display', 'block');
                    $('#message-payment-amount').css('display', 'block');
                    $('#badge-available').html(`<span class="badge badge-success">Disponible Ahora</span>`);
                    calcularTotal();
                }

                // Cargar la lista de especialidades del médico
                $('#select-speciality').empty();
                specilalist.specialities.map(item => {
                    $('#select-speciality').append(`<option value="${item.id}" data-price="${item.price}">${item.name}</option>`);
                });

                // En caso de solo tener una espcialidad ocultar la selcción de especialidades
                if(specilalist.specialities.length <= 1){
                    $('#div-select-speciality').css('display', 'none');
                }else{
                    $('#div-select-speciality').css('display', 'block');
                }
            }
        });

        // Obtener precio de la especialidad al cambiar la opción
        $('#select-speciality').change(function(){
            let price = $('#select-speciality option:selected').data('price');
            $('#form-appointments input[name="price"]').val(price);
            calcularTotal();
        });
    });

    var spinner_loader = `  <div class="d-flex justify-content-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>`;

    // Obtener lista de turnos disponibles
    function getAvalilable(id){
        $('#schedules-list').empty().html(spinner_loader);
        $('.alert-message').css('display', 'none');
        $('#message-payment-amount').css('display', 'none');
        $("#modal-appointments").animate({scrollTop: $('#schedules-list').offset().top}, 500);
        $.get("{{ url('admin/specialists/schedules/') }}/"+id ,function(res){
            $('#schedules-list').html(res);
            $('.btn-payment').attr('disabled', 'disabled');
        });
    }
</script>