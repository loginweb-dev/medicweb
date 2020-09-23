<div class="col-md-12 mb-3">
    <h5><a href="#" class="btn-breadcrunb" data-show="#div-list-specialities">Especialidades</a> / {{ $especialidad }}</h5>
</div>

@forelse ($especialistas as $item)
<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="{{ asset('storage/'.str_replace('.', '-cropped.', $item->user->avatar)) }}" alt="Card image cap">
        <div class="card-body" style="padding-bottom: 10px">
            <h5 class="card-title">{{ $item->prefix }} {{ $item->name }} {{ $item->last_name }}</h5>
            <p class="card-text mb-0">
                @foreach ($item->specialities as $especialidad)
                    <label class="badge badge-{{ $especialidad->color }}">{{ $especialidad->name }}</label>
                @endforeach
            </p>
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="my-rating-{{ $item->id }}"></div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white text-right">
            <button class="btn btn-success btn-sm btn-new-appointment" data-id="{{ $item->id }}">Hacer cita <span class="fas fa-laptop-medical"></span></button>
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
            let id = $(this).data('id');
            if(id){
                $('#form-appointments input[name="specialist_id"]').val(id);
                $('#modal-appointments').modal('show');
            }
        });
    });
</script>