<div class="card">
    <div class="card-header">
        <label>Horarios disponibles<br><small>Seleccione el horario en el que desea se que inicie su cita médica.</small></label>
    </div>
    <div class="card-body">
        @php
            setlocale(LC_ALL, 'es_Es');
            $fecha_actual = date('Y-m-d');
            $fecha_cita = Carbon::create($fecha_actual);
            while (date('N', strtotime($fecha_cita)) != $horario->day) {
                $fecha_cita = $fecha_cita->addDays(1);
            }

            $inicio_horario = $fecha_cita->format('Y-m-d ').$horario->start;
            $duracion_cita = setting('citas.duracion') ?? 30;
            $cont = 0;
        @endphp
        @if ($fecha_cita->format('Y-m-d ').$horario->start >= date('Y-m-d H:i:s'))
            @while(date('H:i:s', strtotime($inicio_horario)) < $horario->end)
                @php
                    $citas = \App\Appointment::where('date', date('Y-m-d', strtotime($inicio_horario)))->where('start', date('H:i:s', strtotime($inicio_horario)))->first();
                @endphp
                <div class="form-check-inline">
                    <label class="form-check-label @if($citas) text-danger @endif">
                        <input type="radio" class="form-check-input" @if($citas) disabled @endif name="optradio" data-date="{{ date('Y-m-d', strtotime($inicio_horario)) }}" data-hour="{{ date('H:i', strtotime($inicio_horario)) }}" data-price_add="{{ $horario->price_add }}">A las {{ date('h:i a', strtotime($inicio_horario)) }} @if($citas) (Reservado) @endif
                    </label>
                </div>
                @php
                    $inicio_horario = date('Y-m-d H:i:s', strtotime("+$duracion_cita minutes", strtotime($inicio_horario)));
                @endphp
            @endwhile
            @php
                $cont++;
            @endphp
        @endif
        @if ($cont == 0)
            <div class="col-md-12 mt-3 text-center">
                <span class="badge badge-danger">Horario no disponible</span>
            </div>
        @endif
        <h5 class="text-center text-success mt-3">{{ ucwords(strftime('%A, %e de %B de %Y', strtotime($fecha_cita))) }}</h5>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.form-check-input').click(function(){
            let date = $(this).data('date');
            let hour = $(this).data('hour');
            let price_add = $(this).data('price_add');
            $('#form-appointments input[name="date"]').val(date);
            $('#form-appointments input[name="start"]').val(hour);
            $('.btn-payment').removeAttr('disabled');
            $('#message-payment-amount').css('display', 'block');
            $('#form-appointments input[name="price_add"]').val(price_add);
            setTimeout(() => calcularTotal(), 0);
        });
    });
</script>