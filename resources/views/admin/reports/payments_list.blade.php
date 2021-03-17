@if(!auth()->user()->hasPermission('browse_users'))
    @php
    return 0;
    @endphp
@endif

<div>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">Especialista</th>
                    <th class="text-center">Observaciones</th>
                    <th class="text-center">Pagado por</th>
                    <th class="text-center">Detalles</th>
                    <th class="text-center">Monto</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @forelse ($pagos as $item)
                    @php
                        $monto = 0;
                        foreach($item->details as $detail){
                            $monto += $detail->appointment->amount_paid;
                        }
                        $total += $monto;
                    @endphp
                    <tr>
                        <td>{{ $item->specialist->full_name }}</td>
                        <td>{{ $item->observations }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <ul>
                                @foreach ($item->details as $detail)
                                    <li><b>#{{ str_pad($detail->appointment->id, 5, "0", STR_PAD_LEFT) }}</b> {{ $detail->appointment->customer->name.' '.$detail->appointment->customer->last_name }} | {{ $detail->appointment->amount_paid }} Bs.</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ number_format($monto, 2, ',', '') }}</td>
                    </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No hay registros</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="4">TOTAL</td>
                    <td>{{ number_format($total, 2, ',', '') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){

    })
</script>