<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Especialista</th>
                    <th>Paciente</th>
                    <th>Fecha de la cita</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($citas as $item)
                    <tr>
                        <td>{{ $item->specialist->prefix }} {{ $item->specialist->name }} {{ $item->specialist->last_name }}</td>
                        <td><a href="#" class="btn-customer" data-toggle="modal" data-target="#modal-historial" data-id="{{ $item->customer->id }}" title="Ver historial">{{ $item->customer->name }} {{ $item->customer->last_name }}</a></td>
                        <td>
                            {{ date('d-m-Y H:i', strtotime($item->date.' '.$item->start)) }} <br>
                            <small class="text-update" id="date-{{ $item->id }}" data-id="{{ $item->id }}" data-date="{{ $item->date.' '.$item->start }}" data-status="{{ strtolower($item->status) }}"></small>
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
                                    $type = 'default';
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
                            <label class="label label-{{ $type }}">{{ $item->status }}</label>
                            @if ($item->status == 'Finalizada')
                                @php
                                    $duracion = 'No definida';
                                    if($item->tracking){
                                        $inicio = Carbon::createFromDate(date('Y-m-d H:i:s', strtotime($item->tracking[0]->created_at)));
                                        $fin = Carbon::createFromDate(date('Y-m-d H:i:s', strtotime($item->tracking[count($item->tracking)-1]->created_at)));
                                        $duracion = str_pad($inicio->diffInMinutes($fin), 2, "0", STR_PAD_LEFT).':'.str_pad(($inicio->diffInSeconds($fin)%60), 2, "0", STR_PAD_LEFT);
                                    }
                                @endphp
                                <div style="margin-top: 5px">
                                    <label class="label label-danger">Duración {{ $duracion }} min.</label>
                                </div>
                            @endif
                        </td>
                        <td>{{ $item->observations }}</td>
                        <td class="no-sort no-click bread-actions text-right">
                            @if ($item->status == 'Validar')
                                <button type="button" title="Validar" class="btn btn-sm btn-warning btn-verify-payment edit" data-id="{{ $item->id }}">
                                    <i class="voyager-dollar"></i> <span class="hidden-xs hidden-sm">Validad</span>
                                </button>
                            @else
                                <a href="{{ url('meet/'.$item->id) }}" target="_blank" title="Ir a la llamada" class="btn btn-sm btn-warning view">
                                    <i class="voyager-video"></i> <span class="hidden-xs hidden-sm">Ir</span>
                                </a>
                                <button type="button" title="Finalizar cita" @if(strtolower($item->status)!=='en curso') disabled @endif class="btn btn-sm btn-dark btn-end-meet edit" data-id="{{ $item->id }}">
                                    <i class="voyager-check"></i> <span class="hidden-xs hidden-sm">Fin</span>
                                </button>
                            @endif
                            <a href="#" title="Editar" class="btn btn-sm btn-primary edit" data-date="{{ $item->date }}" data-id="{{ $item->id }}" data-start="{{ $item->start }}" data-toggle="modal" data-target="#modal-postpone">
                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">posponer</span>
                            </a>
                            <a href="javascript:;" title="Borrar" class="btn btn-sm btn-danger delete" data-id="3" id="delete-3">
                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                            </a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pull-left">
    <div role="status" class="show-res" aria-live="polite">Mostrando  a  de 0 entradas</div>
    </div>
    <div class="pull-right">    
    </div>

    {{-- modal postpone --}}
    <form id="form-postpone" action="{{ route('appointments.update', ['appointment' => '_id']) }}" method="post">
        @csrf
        @method('put')
        {{-- <input type="hidden" name="ajax" value="1"> --}}
        <div class="modal modal-info fade" tabindex="-1" id="modal-postpone" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="voyager-person"></i> Nuevo cliente</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="">Nueva fecha de consulta</label>
                            <input type="date" name="date" min="{{ date('Y-m-d') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hora de consulta</label>
                            <input type="time" name="start" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary pull-right"value="Guardar">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- modal historial --}}
    <div class="modal modal-info fade" tabindex="-1" id="modal-historial" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="voyager-person"></i> Historial clínico</h4>
                </div>
                <div class="modal-body">
                    <div id="historial-list"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('js/moment.js') }}"></script>

<script>
    $(document).ready(function(){
        // Actualizar horario de las citas
        setInterval(() => {
            $('.text-update').each(function(){
                let id = $(this).data('id');
                let date = $(this).data('date');
                let status = $(this).data('status');

                let diff = updateDiff(date)
                $(`#date-${id}`).text(diff.string);
                if(status === 'pendiente' && diff.diffMinute > 0){
                    $(`#date-${id}`).addClass('text-danger');
                }
            });
        }, 1000);

        // Finalizar reunión
        $('.btn-end-meet').click(function(){
            Swal.fire({
                title: 'Estás seguro?',
                text: "Deseas terminar la cita médica?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, finalizar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    let url = "{{ url('admin/appointments/status') }}";
                    $.get(`${url}/${$(this).data('id')}/Finalizada`, function(res){
                        if(!res.error){
                            Swal.fire(
                                'Finalizada!',
                                'Cita médica finalizada correctamente.',
                                'success'
                            )
                        }else{
                            Swal.fire(
                                'Error!',
                                'Ocurrió un  problema al finalizar la cita.',
                                'error'
                            )
                        }
                    });
                }
            })
        });

        $('.btn-verify-payment').click(function(){
            Swal.fire({
                title: 'Estás seguro?',
                text: "Deseas validar la transferencia a tu cuenta bancaria?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, validar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    let url = "{{ url('admin/appointments/status') }}";
                    $.get(`${url}/${$(this).data('id')}`, function(res){
                        if(!res.error){
                            Swal.fire(
                                'Bien hecho!', re.success, 'success'
                            )
                        }else{
                            Swal.fire(
                                'Error!', re.error, 'error'
                            )
                        }
                    });
                }
            })
        });

        // Editar reunión
        $('.edit').click(function(){
            let id = $(this).data('id');
            let date = $(this).data('date');
            let start = $(this).data('start');
            
            $('#form-postpone input[name="id"]').val(id);
            $('#form-postpone input[name="date"]').val(date);
            $('#form-postpone input[name="start"]').val(start);
            $('#form-postpone').attr('action', '{{ url("admin/appointments") }}/'+id);
        });

        // Ver histolrial
        $('.btn-customer').click(function(){
            let id = $(this).data('id');
            $.get('{{ url("admin/appointments/observations/browse") }}/'+id, function(res){
                $('#historial-list').html(res);
            });  
        });

    });

    function updateDiff(date){
        moment.updateLocale('es', {
            relativeTime : {
                future: 'en %s',
                past: 'hace %s',
                s: 'unos segundos',
                ss: '%d segundos',
                m: 'un minuto',
                mm: '%d minutos',
                h: 'una hora',
                hh: '%d horas',
                d: 'un día',
                dd: '%d días',
                M: 'un mes',
                MM: '%d meses',
                y: 'un año',
                yy: '%d años',
            }
        });
        
        let actual = moment();
        let fecha = moment(date, "YYYY-MM-DD HH:mm");
        return {
            string: fecha.fromNow(),
            diffMinute: actual.diff(fecha, 'minute')
        };
    }
</script>