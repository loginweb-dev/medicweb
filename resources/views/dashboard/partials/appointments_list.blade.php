<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Historial de citas médicas</h1>
    {{-- <a href="#" data-toggle="modal" data-target="#modal-appointments" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-laptop-medical fa-sm text-white-50"></i> Nueva cita</a> --}}
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Especialista</th>
                        <th>Motivo</th>
                        <th>Fecha de la cita</th>
                        <th>Estado</th>
                        {{-- <th>Opciones</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($citas as $item)
                        <tr>
                            <td>{{ $item->specialist->prefix }} {{ $item->specialist->name }} {{ $item->specialist->last_name }}</td>
                            <td>{{ $item->observations }}</td>
                            <td>
                                {{ date('Y-m-d H:i', strtotime($item->date.' '.$item->start)) }}
                                <br> <small>{{\Carbon\Carbon::parse($item->date.' '.$item->start)->diffForHumans()}}</small>
                            </td>
                            @php
                                switch (strtolower($item->status)) {
                                    case 'pendiente':
                                        $type = 'primary';
                                        break;
                                    case 'en curso':
                                        $type = 'success';
                                        break;
                                    case 'finalizada':
                                        $type = 'warning';
                                        break;
                                    case 'validar':
                                        $type = 'danger';
                                        break;
                                    default:
                                        $type = 'dark';
                                        break;
                                }
                            @endphp
                            <td class="text-center">
                                <label class="badge badge-{{ $type }}">{{ $item->status }}</label>
                                @if ($item->status == 'Finalizada')
                                    @php
                                    $duracion = '0';
                                    if(count($item->tracking)){
                                        $inicio = Carbon::createFromDate(date('Y-m-d H:i:s', strtotime($item->tracking[0]->created_at)));
                                        $fin = Carbon::createFromDate(date('Y-m-d H:i:s', strtotime($item->tracking[count($item->tracking)-1]->created_at)));
                                        $duracion = str_pad($inicio->diffInMinutes($fin), 2, "0", STR_PAD_LEFT).':'.str_pad(($inicio->diffInSeconds($fin)%60), 2, "0", STR_PAD_LEFT);
                                    }
                                    @endphp
                                    <div style="margin-top: 5px">
                                        <small>Duración {{ $duracion }} min.</small>
                                    </div>
                                @endif
                            </td>
                            {{-- <td></td> --}}
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

<script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
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
            "order": [[ 2, "desc" ]]
        });
    });
</script>