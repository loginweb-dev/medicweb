@extends('voyager::master')

@section('page_title', 'Cliente')

@section('content')
<div class="page-content read container-fluid">
    <div class="panel panel-bordered">
        <div class="panel-body">
            <div class="col-md-12">
                <h2 class="text-center">Kardex</h2>
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-4 text-center">
                        <img src="{{ strpos($customer->user->avatar, 'http') === false ? asset('storage/'.$customer->user->avatar) : $customer->user->avatar }}" width="150px" alt="avatar">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre completo</label> <br>
                                <span style="font-size: 20px">{{ $customer->text }}</span>
                            </div>
                            <div class="col-md-6">
                                <label>Telefono(s)</label> <br>
                                <span style="font-size: 20px">{{ $customer->phones }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <label>Dirección</label> <br>
                                <span style="font-size: 20px">{{ $customer->address ?? 'No definida' }}</span>
                            </div>
                            <div class="col-md-2">
                                @if ($customer->location)
                                <a href="https://maps.google.com/?q={{ $customer->location }}" target="_blank" title="Ver ubicación" class="btn btn-success"><span class="voyager-location"></span></a>                                    
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label> <br>
                                <span style="font-size: 20px">{{ $customer->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="panel panel-bordered">
        <div class="panel-body">
            <h4 class="text-center">Historial médico</h4><br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Observaciones</th>
                            <th>Prescripciones médicas</th>
                            <th>Ordenes de laboratorio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($observaciones as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <h4>{{ $item->observations }} <br> <small>{{ strftime("%d de %B, %Y",  strtotime($item->created_at)) }}</small></h4>
                                    <hr style="margin-top: 10px">
                                    <ul class="timeline mb-3">
                                        @forelse ($item->details as $detail)
                                            <li>
                                                <p class="text-hidden text-{{ $item->id }}">{{ $detail->description }}</p>
                                            </li>
                                        @empty
                                        <p class="text-center">No hay observaciones</p>
                                        @endforelse
                                    </ul>
                                </td>
                                <td>
                                    @php
                                        $cont = 0;
                                    @endphp
                                    @foreach ($item->prescription as $receta)
                                        <div id="div-receta-{{ $receta->id }}">
                                            @if (!$receta->deleted_at)
                                                @foreach ($receta->details as $detail)
                                                    <h6>{{ intval($detail->quantity) }} {{ $detail->medicine_name }} <br> <small>{{ $detail->medicine_description }}</small></h6>
                                                @endforeach
                                                <div class="pull-right" style="margin-top: -20px">
                                                    <button type="button" class="btn btn-link btn-sm btn-delete-receta" data-id="{{ $receta->id }}"><span class="text-danger">Eliminar</span></button>
                                                </div>
                                                <hr>
                                                @php
                                                    $cont++;
                                                @endphp
                                            @endif
                                        </div>
                                    @endforeach
                                    @if ($cont == 0)
                                    <h6 class="text-center">Ninguna</h6>
                                    @endif
                                </td>
                                <td>
                                    <ul>
                                        @php
                                            $cont = 0;
                                        @endphp
                                        @foreach ($item->analysis as $orden)
                                            <div id="div-laboratorio-{{ $orden->id }}">
                                                @if (!$orden->deleted_at)                                                                
                                                    @foreach ($orden->details as $detail)
                                                        <li>{{ $detail->analysis->name }}</li>
                                                    @endforeach
                                                    <div class="pull-right" style="margin-top: -20px">
                                                        <button type="button" class="btn btn-link btn-sm btn-delete-laboratorio" data-id="{{ $orden->id }}"><span class="text-danger">Eliminar</span></button>
                                                    </div>
                                                    <hr>
                                                    @php
                                                        $cont++;
                                                    @endphp
                                                @endif
                                            </div>
                                        @endforeach
                                    </ul>
                                    @if ($cont == 0)
                                    <h6 class="text-center">Ninguna</h6>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><h3 class="text-center">No hay historial</h3></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
   
@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            $('.btn-delete-receta').click(function(){
                let id = $(this).data('id');
                if(confirm('Deseas eliminar la siguiente receta?')){
                    $.get("{{ url('admin/appointments/historial/prescriptions/delete') }}/"+id, function(res){
                        $('#div-receta-'+id).remove();
                    });
                } 
            });

            $('.btn-delete-laboratorio').click(function(){
                let id = $(this).data('id');
                if(confirm('Deseas eliminar la siguiente orden de laboratorio?')){
                    $.get("{{ url('admin/appointments/historial/order/delete') }}/"+id, function(res){
                        $('#div-laboratorio-'+id).remove();
                    });
                } 
            });
        })
    </script>
@stop