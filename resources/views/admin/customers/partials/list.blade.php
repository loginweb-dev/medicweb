@if(!auth()->user()->hasPermission('browse_customers'))
    @php
    return 0;
    @endphp
@endif

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
    <div class="pull-left">
    <div role="status" class="show-res" aria-live="polite">Mostrando  a  de 0 entradas</div>
    </div>
    <div class="pull-right">    
    </div>
</div>