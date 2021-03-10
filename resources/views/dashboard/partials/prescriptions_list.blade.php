<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Historial de recetas</h1>
    <a href="#" data-toggle="modal" data-target="#modal-recetas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-laptop-medical fa-sm text-white-50"></i> Ver lista de farmacias</a>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Especialista</th>
                        <th>Fecha de emisión</th>
                        <th>Detalles</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($recetas as $item)
                        <tr>
                            <td>{{ $item->specialist->prefix }} {{ $item->specialist->name }} {{ $item->specialist->last_name }}</td>
                            <td>
                                {{ date('Y-m-d H:i', strtotime($item->created_at)) }}
                                <br> <small>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</small>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($item->details as $detalle)
                                    <li>{{ $detalle->medicine_name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a title="Ver" class="btn btn-warning btn-sm" href="{{ route('home.prescriptions.details.pdf', ['id' => $item->id]) }}" target="_blank"><span class="hidden-xs hidden-sm">Ver</span> <i class="fa fa-eye"></i></a>
                                <a title="Descagar en PDF" class="btn btn-danger btn-sm" href="{{ route('home.prescriptions.details.pdf', ['id' => $item->id, 'type' => 'download']) }}" target="_blank"> <span class="hidden-xs hidden-sm">PDF</span> <i class="fa fa-download"></i></a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay registros</td>
                    </tr>
                    @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-recetas" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Farmacias con las que trabajamos</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Telefono(s)</th>
                            <th>dirección(es)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Contact::where('deleted_at', NULL)->where('type', 'Farmacia')->get() as $item)
                            <tr>
                                <td><img src="{{ url('storage/'.$item->logo) }}" height="50px" alt="{{ $item->name }}"></td>
                                <td>{{ $item->type }} "{{ $item->name }}"</td>
                                <td>{{ $item->phones }}</td>
                                <td>{{ $item->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.dataTable').DataTable({
            language: {
                processing:     "En proceso...",
                search:         "Buscar&nbsp;:",
                lengthMenu:     "Mostrando _MENU_ registros",
                info:           "Mostrando _START_ hasta _END_ de _TOTAL_ registros",
                infoEmpty:      "Mostrando 0 hasta 0 sur 0 registros",
                infoFiltered:   "filtro de _MAX_ registros en total",
                infoPostFix:    "",
                loadingRecords: "Carga en curso...",
                zeroRecords:    "No hay registros",
                emptyTable:     "Registro vacío",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
                aria: {
                    sortAscending:  ": orden ascendente",
                    sortDescending: ": orden descendente"
                }
            },
            "order": [[ 1, "desc" ]]
        });
    });
</script>