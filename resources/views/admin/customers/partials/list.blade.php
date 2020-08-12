<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cliente as $item)
                    <tr>
                        <th class="text-center" width="60px"><img src="{{ asset('storage/'.$item->user->avatar) }}" width="50px" alt="avatar"></th>
                        <td>{{ $item->name }} {{ $item->last_name }}</td>
                        <td>
                            @php
                                $phones = explode(',', $item->phones);
                            @endphp
                            @foreach ($phones as $phone)
                                <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            @endforeach
                            <br>
                            {{ $item->adress }}
                        </td>
                        <td></td>
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