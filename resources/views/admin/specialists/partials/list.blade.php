<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($especialistas as $specialist)
                    <tr>
                        <th class="text-center" width="60px"><img src="{{ asset('storage/'.$specialist->user->avatar) }}" width="50px" alt="avatar"></th>
                        <td>{{ $specialist->prefix }} {{ $specialist->name }} {{ $specialist->last_name }}</td>
                        <td>
                            @php
                                $phones = explode(',', $specialist->phones);
                            @endphp
                            @foreach ($phones as $phone)
                                <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            @endforeach
                            <br>
                            {{ $specialist->adress }} <br>
                            {{ $specialist->location }}
                        </td>
                        <td>{{$specialist->user->name}}<br>{{$specialist->user->email}}
                        </td>
                        <td>
                        <a href="{{route('specialists.edit',$specialist)}}" title="editar" class="btn btn-success btn-sm">
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