<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">Cod.</th>
                    @if (Auth::user()->role_id != 5)
                    <th class="text-center">Especialista</th>
                    @endif
                    <th class="text-center">Detalles</th>
                    <th class="text-center">Fecha de la cita</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Costo</th>
                    <th class="text-right action-available" @if($specialist && !$specialist->status) style="display:none" @endif>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($citas as $item)
                    <tr>
                        <td>{{ str_pad($item->id, 5, "0", STR_PAD_LEFT) }}</td>
                        @if (Auth::user()->role_id != 5)
                        <td>{{ $item->specialist->prefix }} {{ $item->specialist->name }} {{ $item->specialist->last_name }}</td>
                        @endif
                        <td>
                            <small><b>Paciente: </b></small> <a href="#" class="btn-customer" data-toggle="modal" data-target="#modal-historial" data-id="{{ $item->customer->id }}" title="Ver historial">{{ $item->customer->name }} {{ $item->customer->last_name }}</a> <br>
                            <small><b>Celular: </b> {{ $item->customer->phones ?? 'No definido' }} </small> <br>
                            <small><b>Motivo de consulta: </b></small> <br>
                            {{ $item->observations }}
                        </td>
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
                                    $type = 'warning';
                                    break;
                                case 'anulada':
                                    $type = 'danger';
                                    break;
                                default:
                                    $type = 'dark';
                                    break;
                            }
                        @endphp
                        <td class="text-center">
                            <label class="label label-{{ $type }}">{{ $item->speciality_id == 3 && $item->status == 'Conectando' ? 'En espera' : $item->status }}</label>
                            @if ($item->status == 'Finalizada')
                                @php
                                    $duracion = '0';
                                    if(count($item->tracking)){
                                        $inicio = Carbon::createFromDate(date('Y-m-d H:i:s', strtotime($item->tracking[0]->created_at)));
                                        $fin = Carbon::createFromDate(date('Y-m-d H:i:s', strtotime($item->tracking[count($item->tracking)-1]->created_at)));
                                        $duracion = str_pad($inicio->diffInMinutes($fin), 2, "0", STR_PAD_LEFT).':'.str_pad(($inicio->diffInSeconds($fin)%60), 2, "0", STR_PAD_LEFT);
                                    }
                                @endphp
                                <div style="margin-top: 0px">
                                    <small style="font-size: 10px">{{ $duracion }} min.</small>
                                </div>
                            @endif
                        </td>
                        <td class="label-amount" data-amount="{{ !$item->paid && $item->status == 'Finalizada' ? $item->amount_paid : 0 }}" >{{ $item->amount + $item->amount_add }} Bs.</td>
                        <td class="no-sort no-click bread-actions text-left action-available" @if($specialist && !$specialist->status) style="display:none" @endif>
                            @if ($item->status == 'Validar')
                                <button type="button" title="Validar" class="btn btn-sm btn-success btn-verify-payment edit" data-id="{{ $item->id }}" data-firebase_token="{{ $item->customer->user->firebase_token }}">
                                    <i class="voyager-dollar"></i> <span class="hidden-xs hidden-sm">Validar</span>
                                </button>
                            @else
                                @if (strtolower($item->status) != 'finalizada' && strtolower($item->status) != 'anulada')
                                    @if ($item->speciality_id == 3)
                                        <a href="https://maps.google.com/?q={{ $item->customer->location }}" target="_blank" class="btn btn-success edit" title="Ver ubicación"><i class="voyager-location"></i></a>    
                                        <button type="button" title="Finalizar cita" class="btn btn-sm btn-dark btn-end-meet edit" data-id="{{ $item->id }}">
                                            <i class="voyager-check"></i> <span class="hidden-xs hidden-sm">Fin</span>
                                        </button>
                                    @else
                                        <a href="{{ url('meet/'.$item->id) }}" title="Ir a la llamada" class="btn btn-sm btn-warning view">
                                            <i class="voyager-video"></i> <span class="hidden-xs hidden-sm">Ir</span>
                                        </a>
                                        <button type="button" title="Finalizar cita" @if(strtolower($item->status)!=='en curso') disabled @endif class="btn btn-sm btn-dark btn-end-meet edit" data-id="{{ $item->id }}">
                                            <i class="voyager-check"></i> <span class="hidden-xs hidden-sm">Fin</span>
                                        </button>
                                    @endif                            
                                @endif
                            @endif

                            @if(strtolower($item->status) != 'finalizada' && strtolower($item->status) != 'en curso' && strtolower($item->status) != 'anulada' && Auth::user()->role_id != 5)
                                {{-- <a href="#" title="Editar" class="btn btn-sm btn-primary edit" data-date="{{ $item->date }}" data-id="{{ $item->id }}" data-start="{{ $item->start }}" data-toggle="modal" data-target="#modal-postpone">
                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">posponer</span>
                                </a> --}}
                                <a href="#" data-url="{{ route('appointments.destroy', ['appointment' => $item->id]) }}" title="Anular" class="btn btn-sm btn-danger btn-delete">
                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Anular</span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <div class="col-md-6" style="overflow-x:auto">
            @if(count($citas)>0)
                <p class="text-muted">Mostrando del {{$citas->firstItem()}} al {{$citas->lastItem()}} de {{$citas->total()}} registros.</p>
            @endif
        </div>
        <div class="col-md-6" style="overflow-x:auto">
            <nav class="text-right">
                {{ $citas->links() }}
            </nav>
        </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="voyager-person"></i> Historial clínico</h4>
                </div>
                <div class="modal-body">
                    <div id="historial-list"></div>
                    <div class="text-center">
                        <a href="#" id="btn-ver-todo" target="_blank" class="btn btn-primary"> <span class="voyager-eye"></span> Ver todo</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Form delete --}}
    <form name="form_delete" id="form-delete" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
</div>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/loginweb.js') }}"></script>

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
            });
        });

        // Validar pago
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
            }).then(async (result) => {
                if (result.value) {
                    let firebase_token = $(this).data('firebase_token')
                    let url = "{{ url('admin/appointments/status') }}";
                    $.get(`${url}/${$(this).data('id')}`, async function(res){
                        if(!res.error){
                            Swal.fire('Bien hecho!', res.success, 'success')

                            // Notificación movil
                            let urlMessaging = "{{ env('FIREBASE_CLOUD_MESSAGING_URL') }}";
                            let FCMToken = "{{ env('FIREBASE_CLOUD_MESSAGING_TOKEN') }}";
                            let title = "Tranferencia aceptada";
                            let message = `En un momento serás contactado por nuestro especialista.`;
                            let notification = {
                                title, message
                            }
                            let data = {
                                title, message,
                                type: 'accept_transfer'
                            }
                            
                            await sendNotificationApp(urlMessaging, FCMToken, firebase_token, notification, data);
                        }else{
                            Swal.fire('Error!', res.error, 'error')
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

        // Elimiar reunión
        $('.btn-delete').click(function(e){
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Estás seguro?',
                text: "Deseas anular la cita médica?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, anular!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    // $.post(url, $(this).serialize(), function(res){
                    //     console.log(res);
                    // });
                    $.ajax({
                        url,
                        type: 'DELETE',
                        data: $(this).serialize(),
                        success: function (res){
                            Swal.fire(
                                'Anulada!',
                                'Cita médica anulada correctamente.',
                                'success'
                            )
                            inputSearch = escape($('#search-input input[name="search"]').val()).split("/").join("");
                            getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearch);
                        }
                    });

                }
            });
        });

        // Ver histolrial
        $('.btn-customer').click(function(){
            let id = $(this).data('id');
            $('#btn-ver-todo').attr('href', '{{ url("admin/customers") }}/'+id);
            $('#historial-list').empty().html(` <div class="col-md-12 text-center">
                                                    <img src="{{ url('images/loader.gif') }}" alt="">
                                                </div>`);
            $.get('{{ url("admin/appointments/observations/browse") }}/'+id, function(res){
                $('#historial-list').html(res);
            });
        });

        getAmount();

        $('.page-link').click(function(e){
            e.preventDefault();
            let link = $(this).attr('href');
            if(link){
                page = link.split('=')[1];
                current_page = page;
                inputSearchNew = escape($('#search-input input[name="search"]').val()).split("/").join("");
                getList('{{ url("admin/appointments/list") }}', '#list-table', inputSearchNew, current_page);
            }
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