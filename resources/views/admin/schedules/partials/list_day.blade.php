<div class="col-md-12">
    <label>Horarios disponibles</label>
</div>
<div class="row mt-2 mb-3">
    @php
        $cont = 0;
    @endphp
    @foreach($horarios->schedules as $horario)
        @php
            $duracion_cita = setting('citas.duracion') ?? 15;
            $inicio_horario = $fecha.' '.$horario->start;
        @endphp
        @if($horario->day == date('N', strtotime($fecha)))
            <div class="col-md-3 text-center">
                <div class="dropdown show disabled">
                    <a class="btn btn-info dropdown-toggle" href="#" role="button" id="-{{ $horario->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ date('H:i', strtotime($horario->start)).' a '.date('H:i', strtotime($horario->end)) }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-{{ $horario->id }}">
                        @php
                            $cont_schedules = 0;
                        @endphp
                        @if($inicio_horario >= date('Y-m-d H:i:s'))
                            @while(date('H:i:s', strtotime($inicio_horario)) < $horario->end)
                                @php
                                    $citas = \App\Appointment::where('date', $fecha)->where('start', date('H:i:s', strtotime($inicio_horario)))->first();
                                @endphp
                                <a class="dropdown-item dropdown-item-schedule @if($citas) disabled text-danger @endif" data-schedule="{{ date('H:i', strtotime($inicio_horario)) }}" @if($citas) disabled @endif href="#">
                                    A las {{ date('H:i', strtotime($inicio_horario)) }} @if($citas) (Reservado) @endif
                                </a>
                                @php
                                    $inicio_horario = date('Y-m-d H:i:s', strtotime("+$duracion_cita minutes", strtotime($inicio_horario)));
                                    $cont_schedules++;
                                @endphp
                            @endwhile
                        @endif
                        @if(!$cont_schedules)
                        <a class="dropdown-item disabled" disabled href="#">
                            Horario no disponible
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @php
                $cont++;
            @endphp
        @endif
    @endforeach
    @if(!$cont)
    <div class="col-md-12 text-center mb-3">
        <span class="badge badge-danger">El especialista no realiza atención el día seleccionado</span>
    </div>
    @else
    <div class="col-md-12 text-center mt-5">
        <h5 class="text-info text-schedule-selected">Elija un horario disponible</h5>
    </div>
    @endif
</div>

<script>
    $(document).ready(function(){
        $('.form-check-input').click(function(){
            let value = $(this).val();
            $('#form-appointments input[name="start"]').val(value);
        });

        $('.dropdown-item-schedule').click(function(e){
            e.preventDefault();
            $('.dropdown-item-schedule').removeClass('text-primary font-weight-bold');
            $(this).addClass('text-primary font-weight-bold');
            let value = $(this).data('schedule');
            $('.text-schedule-selected').text(`Inicio de cita médica ${value}.`);
            $('#form-appointments input[name="start"]').val(value);
            $('.btn-payment').removeAttr('disabled');
        });
    });
</script>