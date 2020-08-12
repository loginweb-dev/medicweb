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
                        <td>{{ $item->especialista->prefix }} {{ $item->especialista->name }} {{ $item->especialista->last_name }}</td>
                        <td>{{ $item->cliente->name }} {{ $item->cliente->last_name }}</td>
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
                                default:
                                    $type = 'dark';
                                    break;
                            }
                        @endphp
                        <td><label class="label label-{{ $type }}">{{ $item->status }}</label></td>
                        <td>{{ $item->observations }}</td>
                        <td class="no-sort no-click bread-actions text-right">
                            @if(strtolower($item->status)==='pendiente' || strtolower($item->status)==='en curso')
                            <a href="{{ url('meet/'.$item->id) }}" target="_blank" title="Ir a la llamada" class="btn btn-sm btn-warning view">
                                <i class="voyager-video"></i> <span class="hidden-xs hidden-sm">Ir</span>
                            </a>
                            @else
                            <button disabled title="Ir a la llamada" class="btn btn-sm btn-warning view">
                                <i class="voyager-video"></i> <span class="hidden-xs hidden-sm">Ir</span>
                            </button>
                            @endif
                            
                            <button type="button" title="Finalizar cita" @if(strtolower($item->status)!=='en curso') disabled @endif class="btn btn-sm btn-dark btn-end-meet edit" data-id="{{ $item->id }}">
                                <i class="voyager-check"></i> <span class="hidden-xs hidden-sm">Fin</span>
                            </button>
                            <a href="#" title="Editar" class="btn btn-sm btn-primary edit">
                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
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

        $('.btn-end-meet').click(function(){
            Swal.fire({
                title: 'Estás seguro?',
                text: "deseas terminar la cita médica!",
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