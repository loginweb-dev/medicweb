<div class="card">
    <div class="card-header">
        <label>Horarios disponibles<br><small>Seleccione el horario en el que desea se que inicie su cita médica.</small></label>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
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
                    <div class="list-group" style="height: 250px; overflow-y: auto">
                        @while(date('H:i:s', strtotime($inicio_horario)) < $horario->end)
                            @php
                                $citas = \App\Appointment::where('date', date('Y-m-d', strtotime($inicio_horario)))->where('start', date('H:i:s', strtotime($inicio_horario)))->first();

                                $price_add = 0;
                                $hora_inicio = setting('horarios.hora_inicio');
                                $hora_fin = setting('horarios.hora_fin');

                                // Verificar si está dentro del horario especial
                                if(date('H', strtotime($inicio_horario)) >= date('H', strtotime($hora_inicio)) || (date('H', strtotime($inicio_horario)) > 0 && date('H', strtotime($inicio_horario)) < date('H', strtotime($hora_fin))) || date('w', strtotime($fecha_cita->format('Y-m-d '))) == 0){
                                    $price_add = setting('horarios.precio_adiciaonal');
                                }
                            @endphp
                            <a href="#list-group-schedules" class="list-group-item">
                                <div class="form-check-inline">
                                    <label class="form-check-label @if($citas) text-danger @endif" style="cursor: pointer; font-weight: bold">
                                        <input type="radio" class="form-check-input check-schedule" @if($citas) disabled @endif name="optradio" data-date="{{ date('Y-m-d', strtotime($inicio_horario)) }}" data-hour="{{ date('H:i', strtotime($inicio_horario)) }}" data-price_add="{{ $price_add }}">A las {{ date('h:i a', strtotime($inicio_horario)) }} @if($citas) (Reservado) @endif
                                    </label>
                                </div>
                            </a>
                            @php
                                $inicio_horario = date('Y-m-d H:i:s', strtotime("+$duracion_cita minutes", strtotime($inicio_horario)));
                            @endphp
                        @endwhile
                    </div>
                    @php
                        $cont++;
                    @endphp
                @endif
                @if ($cont == 0)
                    <div class="col-md-12 mt-3 text-center">
                        <span class="badge badge-danger">Horario no disponible</span>
                    </div>
                @endif
            </div>
            <div class="col-md-6 text-center" style="margin-top: 20px">
                <h4 class="text-info mt-5" id="message-reloj">Elija un horario <br> <small>Dando click sobre el</small> </h4>
                <canvas id="reloj"></canvas>
            </div>
        </div>
        @php
            $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("", "Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        @endphp
        <h5 class="text-center text-success mt-4">{{ $diassemana[date('w', strtotime($fecha_cita))].", ".date('d', strtotime($fecha_cita))." de ".$meses[date('n', strtotime($fecha_cita))]. " del ".date('Y', strtotime($fecha_cita)) }}</h5>
    </div>
</div>

<script src="{{ url('js/reloj_analogo.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.check-schedule').click(function(){
            let date = $(this).data('date');
            let hour = $(this).data('hour');
            let price_add = $(this).data('price_add');
            $('#form-appointments input[name="date"]').val(date);
            $('#form-appointments input[name="start"]').val(hour);
            $('#message-payment-amount').css('display', 'block');
            $('#message-reloj').css('display', 'none');
            $('#form-appointments input[name="price_add"]').val(price_add);
            $('.btn-payment').removeAttr('disabled');
            setTimeout(() => {
                calcularTotal();
                var reloj = new Reloj(hour.split(':')[0], hour.split(':')[1]);  
            }, 0);
        });

        // $('.list-group-item').click(function(e){
        //     e.preventDefault();
        // });
    });
</script>