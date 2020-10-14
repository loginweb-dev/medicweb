<form class="form-modal" action="{{ url('admin/appointments/observations/create') }}" method="post">
    <div class="modal fade" tabindex="-1" id="modal-historial" role="dialog">
        <div class="modal-dialog modal-lg bg-info">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white"><i class="voyager-person"></i> Historial clínico</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="list-historial-tab" data-toggle="tab" href="#list-historial" role="tab" aria-controls="list-historial" aria-selected="true">Detalles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-historial-tab" data-toggle="tab" href="#new-historial" role="tab" aria-controls="new-historial" aria-selected="false">Nuevo</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="list-historial" role="tabpanel" aria-labelledby="list-historial-tab">
                                <div class="form-group col-md-12 mt-3">
                                    <div id="historial-list"></div>
                                </div>
                                <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Cerrar</button>
                                <br>
                            </div>
                            <div class="tab-pane fade" id="new-historial" role="tabpanel" aria-labelledby="new-historial-tab">
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="appointment_id" value="{{ $meet_id }}">
                                    <div class="form-group col-md-12 mt-3">
                                        <textarea name="description" class="form-control" rows="10" placeholder="Observaciones de la cita médica..." required></textarea>
                                    </div>
                                    <div class="form-group col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>