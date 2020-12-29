<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">Cod.</th>
                    <th class="text-center">Especialista</th>
                    <th class="text-center">Paciente</th>
                    <th class="text-center">Fecha de la cita</th>
                    <th class="text-center">Motivo</th>
                    <th class="text-center">Costo</th>
                    <th class="text-center">Ganancia</th>
                </tr>
            </thead>
            @php
                $monto_total = 0;
                $ganancia_total = 0;
            @endphp
            <tbody>
                @forelse ($citas as $item)
                    @php
                        $monto = $item->amount + $item->amount_add;
                        $monto_total += strtolower($item->status) != 'anulada' ? $monto : 0;

                        $ganancia = strtolower($item->status) == 'finalizada' ? $monto - $item->amount_paid : 0;
                        $ganancia_total += $ganancia;
                    @endphp
                    <tr>
                        <td>{{ str_pad($item->id, 5, "0", STR_PAD_LEFT) }}</td>
                        <td>{{ $item->specialist->prefix }} {{ $item->specialist->name }} {{ $item->specialist->last_name }}</td>
                        <td>{{ $item->customer->name }} {{ $item->customer->last_name }}</td>
                        <td>
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
                            {{ date('d-m-Y H:i', strtotime($item->date.' '.$item->start)) }} <br>
                            <small class="text-update" id="date-{{ $item->id }}" data-id="{{ $item->id }}" data-date="{{ $item->date.' '.$item->start }}" data-status="{{ strtolower($item->status) }}"></small> <br>
                            <label class="label label-{{ $type }}">{{ $item->status }}</label>
                        </td>
                        <td>{{ $item->observations }}</td>
                        <td>{{ $monto }} Bs.</td>
                        <td>{{ $ganancia }} Bs.</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay registros</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="5"><b>TOTAL</b></td>
                    <td><h4>{{ number_format($monto_total, 2, ',', '') }} Bs.</h4></td>
                    <td><h4>{{ number_format($ganancia_total, 2, ',', '') }} Bs.</h4></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){

    })
</script>