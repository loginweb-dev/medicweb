@if(!auth()->user()->hasPermission('browse_specialists'))
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
                    <th>Usuario</th>
                    <th>Citas</th>
                    <th class="text-right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($especialistas as $specialist)
                    @php
                        if($specialist->user->avatar != 'users/default.png'){
                            $specialist->user->avatar = str_replace('.', '-cropped.', $specialist->user->avatar);
                        }
                        $citas_finalizadas = count($specialist->appointments) ? $specialist->appointments->where('status', 'Finalizada')->count() : 0;
                        $citas_adeudadas = count($specialist->appointments) ? $specialist->appointments->where('status', 'Finalizada')->where('paid', NULL)->count() : 0;
                    @endphp
                    <tr>
                        <th class="text-center" width="60px"><img src="{{ asset('storage/'.$specialist->user->avatar) }}" width="50px" alt="avatar"></th>
                        <td>
                            {{ $specialist->prefix }} {{ $specialist->name }} {{ $specialist->last_name }} <br>
                            <label class="label label-{{ $specialist->status ? 'success' : 'warning' }}">{{ $specialist->status ? 'Activo' : 'Inactivo' }}</label>
                        </td>
                        <td>
                            @php
                                $phones = explode(',', $specialist->phones);
                            @endphp
                            @foreach ($phones as $phone)
                                <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            @endforeach
                            <br>
                            {{ $specialist->address }} <br>
                            {{ $specialist->location }}
                        </td>
                        <td>{{$specialist->user->name}}<br>{{$specialist->user->email}}</td>
                        <td>
                            <span>Realizadas: {{ $citas_finalizadas }}</span> <br>
                            <span>Adeudadas: {{ $citas_adeudadas }}</span>
                        </td>
                        <td class="no-sort no-click bread-actions text-right">
                            <a href="{{ route('specialists.payment', ['id' => $specialist->id]) }}" title="Ver monto de deuda" class="btn btn-success btn-sm">
                                <i class="voyager-dollar"></i> Pagar
                            </a>
                            <a href="{{route('specialists.edit',$specialist)}}" title="editar" class="btn btn-primary btn-sm">
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
    <div class="col-md-12">
        <div class="col-md-6" style="overflow-x:auto">
            @if(count($especialistas)>0)
                <p class="text-muted">Mostrando del {{$especialistas->firstItem()}} al {{$especialistas->lastItem()}} de {{$especialistas->total()}} registros.</p>
            @endif
        </div>
        <div class="col-md-6" style="overflow-x:auto">
            <nav class="text-right">
                {{ $especialistas->links() }}
            </nav>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.page-link').click(function(e){
            e.preventDefault();
            let link = $(this).attr('href');
            if(link){
                page = link.split('=')[1];
                inputSearchNew = escape($('#search-input input[name="search"]').val()).split("/").join("");
                getList('{{ url("admin/specialists/list") }}', '#list-table', inputSearchNew, page);
            }
        });
    });
</script>