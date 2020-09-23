<div class="col-md-12">
    <label>Horarios disponibles</label>
</div>
<div class="row mt-2 mb-3">
    @foreach($horarios as $horario)
        <div class="col-md-3 text-center">
            <div class="form-check-inline">
                <label class="form-check-inline-{{ $horario->id }}">
                <input type="radio" class="form-check-input" id="form-check-inline-{{ $horario->id }}" name="optradio" value="{{ $horario->start }}">{{ date('H:i', strtotime($horario->start)) }}
                </label>
            </div>
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function(){
        $('.form-check-input').click(function(){
            let value = $(this).val();
            $('#form-appointments input[name="start"]').val(value);
        });
    });
</script>