<div class="col-md-12">
    <label>Horarios disponibles<br><small>Seleccione el horario en el que desea se atendido.</small></label>
</div>
<div class="row mt-2 mb-3">
    <div class="col-md-12" id="accordion">
        @forelse($horarios as $horario)
            @php
                $duracion_cita = setting('citas.duracion') ?? 15;
                $inicio_horario = $fecha.' '.$horario->start;
            @endphp
            
            <div class="card">
                <div class="card-header bg-success" id="heading-{{ $horario->id }}" data-toggle="collapse" data-target="#collapse-{{ $horario->id }}" aria-expanded="true" aria-controls="collapse-{{ $horario->id }}" style="cursor:pointer">
                    <h6 class="mb-0 text-white">
                        De {{ date('H:i', strtotime($horario->start)).' a '.date('H:i', strtotime($horario->end)) }}
                    </h6>
                </div>
                <div id="collapse-{{ $horario->id }}" class="collapse" aria-labelledby="heading-{{ $horario->id }}" data-parent="#accordion">
                    <div class="card-body">
                        @while(date('H:i:s', strtotime($inicio_horario)) < $horario->end)
                            @php
                                $citas = \App\Appointment::where('date', $fecha)->where('start', date('H:i:s', strtotime($inicio_horario)))->first();
                            @endphp
                            <div class="form-check-inline">
                                <label class="form-check-label @if($citas) text-danger @endif">
                                    <input type="radio" class="form-check-input" @if($citas) disabled @endif name="optradio" value="{{ date('H:i', strtotime($inicio_horario)) }}">A las {{ date('H:i', strtotime($inicio_horario)) }} @if($citas) (Reservado) @endif
                                </label>
                            </div>
                            @php
                                $inicio_horario = date('Y-m-d H:i:s', strtotime("+$duracion_cita minutes", strtotime($inicio_horario)));
                            @endphp
                        @endwhile
                    </div>
                </div>
            </div>
        @empty
        <div class="col-md-12 text-center mb-3">
            <span class="badge badge-danger">El especialista no realiza atención el día seleccionado</span>
        </div>
        @endforelse
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.form-check-input').click(function(){
            let value = $(this).val();
            $('#form-appointments input[name="start"]').val(value);
        });

        $('.form-check-input').click(function(e){
            let value = $(this).val();
            $('#form-appointments input[name="start"]').val(value);
            $('.btn-payment').removeAttr('disabled');
        });
    });
</script>