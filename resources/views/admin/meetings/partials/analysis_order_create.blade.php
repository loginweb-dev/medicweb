
<!-- Modal prescription-->
<form class="form-modal" action="{{ route('analysiscustomer.store') }}" method="post">
    @csrf
    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
    <input type="hidden" name="specialist_id" value="{{ $specialist_id }}">
    <input type="hidden" name="appointment_id" value="{{ $appointment_id }}">
    <input type="hidden" name="ajax" value="1">

    <div class="modal fade" id="modal-analysis-order" role="dialog" aria-labelledby="modal-analysis-orderLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-info" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="modal-analysis-orderLabel">Redactar orden de laboratorio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <small>Paciente</small>
                            <p>{{ $customer_name }}</p>
                        </div>
                        <div class="col-md-6 mb-3 text-right">
                            <small>Fecha</small>
                            <p>{{ date('d-m-Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="row">
                            @foreach ($analisis as $item)
                            <div class="col-md-6" style="border: 1px solid #dedede; padding: 10px">
                                <h5>{{ $item->name }}</h5>
                                @foreach ($item->analisis as $detalle)
                                    <div class="form-check">
                                        <input class="form-check-input" name="analysi_id[]" type="checkbox" value="{{ $detalle->id }}" id="defaultCheck{{ $detalle->id }}">
                                        <label class="form-check-label" for="defaultCheck{{ $detalle->id }}">{{ $detalle->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <textarea name="observations" id="" class="form-control" rows="3" placeholder="Otros..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>