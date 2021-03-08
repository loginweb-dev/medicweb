<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Direccion</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cliente as $customer)
                    <tr>
                        <td class="text-center" width="60px"><img src="{{ strpos($customer->user->avatar, 'http') === false ? asset('storage/'.$customer->user->avatar) : $customer->user->avatar }}" width="50px" alt="avatar"></td>
                        <td>{{ $customer->name }} {{ $customer->last_name }}</td>
                        <td>
                            @php
                                $phones = explode(',', $customer->phones);
                            @endphp
                            @foreach ($phones as $phone)
                                <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            @endforeach
                            <br>
                            {{ $customer->address }}
                        </td>
                        <td></td>
                        <td class="no-sort no-click bread-actions text-right">
                            <a href="#" data-toggle="modal" data-target="#modal-historial" data-id="{{ $customer->id }}" title="Hitorial clínico" class="btn btn-dark btn-sm btn-customer">
                                <i class="voyager-list"></i> Hitorial clínico
                            </a>
                            <a href="{{ route('customers.show', $customer) }}" title="ver" class="btn btn-warning btn-sm">
                                <i class="voyager-eye"></i> Ver
                            </a>
                            <a href="{{route('customers.edit',$customer)}}" title="editar" class="btn btn-primary btn-sm">
                            <i class="voyager-edit"></i> Editar
                            </a>
                        </td>
                    </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No hay registros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- modal historial --}}
    <div class="modal modal-info fade" tabindex="-1" id="modal-historial" role="dialog">
        <div class="modal-dialog modal-lg">
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

<script>
    $(document).ready(function(){
        // Ver histolrial
        $('.btn-customer').click(function(){
            let id = $(this).data('id');

            $('#historial-list').empty().html(` <div class="col-md-12 text-center">
                                                    <img src="{{ url('images/loader.gif') }}" alt="">
                                                </div>`);
            $.get('{{ url("admin/appointments/observations/browse") }}/'+id, function(res){
                $('#historial-list').html(res);
            });  
        });
    });
</script>