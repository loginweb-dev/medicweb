<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cliente as $customer)
                    <tr>
                        <th class="text-center" width="60px"><img src="{{ asset('storage/'.$customer->user->avatar) }}" width="50px" alt="avatar"></th>
                        <td>{{ $customer->name }} {{ $customer->last_name }}</td>
                        <td>
                            @php
                                $phones = explode(',', $customer->phones);
                            @endphp
                            @foreach ($phones as $phone)
                                <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            @endforeach
                            <br>
                            {{ $customer->adress }}
                        </td>
                        <td></td>
                        <td>
                        <a href="{{ route('customers.show', $customer) }}" title="ver" class="btn btn-info btn-sm">
                            <i class="voyager-eye"></i>
                        </a>
                         <a href="{{route('customers.edit',$customer)}}" title="editar" class="btn btn-success btn-sm">
                          <i class="voyager-list-add"></i>
                         </a>
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
    <div class="pull-left">
    <div role="status" class="show-res" aria-live="polite">Mostrando  a  de 0 entradas</div>
    </div>
    <div class="pull-right">    
    </div>
</div>