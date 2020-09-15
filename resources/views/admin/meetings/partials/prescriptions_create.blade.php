
<!-- Modal prescription-->
<form class="form-modal" action="{{ route('prescriptions.store') }}" method="post">
    @csrf
    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
    <input type="hidden" name="specialist_id" value="{{ $specialist_id }}">
    <input type="hidden" name="appointment_id" value="{{ $appointment_id }}">
    <input type="hidden" name="ajax" value="1">

    <div class="modal fade" id="modal-prescription" role="dialog" aria-labelledby="modal-prescriptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-info" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="modal-prescriptionLabel">Redactar prescripción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="medicine_name" id="select-medicine_name">
                                    <option value="">Seleccione el medicamento</option>
                                    @foreach ($medicines as $item)
                                    <option value="{{ $item->medicine_name }}">{{ $item->medicine_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group">
                                <textarea name="medicine_description" id="input-medicine_description" class="form-control custom-control" rows="2" style="resize:none" placeholder="1 comp. cada 8 horas..."></textarea>     
                                <span class="input-group-addon btn btn-success" id="btn-add-medicine" style="padding-top: 20px">
                                    <i class="fa fa-plus"></i> Agregar
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="table-responsive">
                                <table id="table-medicine" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Medicamento</th>
                                            <th>Indicaciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>