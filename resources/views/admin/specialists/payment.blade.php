@extends('voyager::master')

@section('page_title', 'Pagos pendiente')

@if(!auth()->user()->hasPermission('browse_specialists'))
    @php
    return 0;
    @endphp
@endif

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-dollar"></i> Pagos pendiente
        </h1>
    </div>
@stop

@section('content')
    <form id="form-store" action="{{ route('specialists.payment.store', ['id' => $id]) }}" method="POST">
        <div class="page-content browse container-fluid">
            @include('voyager::alerts')
            <div class="alert alert-info">
                <strong>Información:</strong>
                <p>Seleccione las consultas médicas que desea registrar como pagadas al especialista y presione el boton <b>pagar</b>.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            {{-- <form id="form-search" class="form-search">
                                <div id="search-input">
                                    <div class="input-group col-md-12">
                                        <span class="input-group-btn" style="margin-left: 10px; margin-top: 5px">
                                            <a href="#" class="btn-reset-search hidden"><i class="voyager-x text-danger"></i></a>
                                        </span>
                                        <input type="search" name="search" class="form-control input-search" placeholder="Buscar" name="s" value="" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="submit">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div> 
                            </form> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="chack-all"></th>
                                            <th>Paciente</th>
                                            <th>Fecha</th>
                                            <th>Monto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_deuda = 0;
                                        @endphp
                                        @forelse ($citas as $cita)
                                            <tr>
                                                <td><input type="checkbox" class="check-amount" data-amount="{{ $cita->amount_paid }}" value="{{ $cita->id }}" name="appointment_id[]"></td>
                                                <td>{{ $cita->customer->name }} {{ $cita->customer->last_name }}</td>
                                                <td>
                                                    {{ date('d-m-Y H:i', strtotime($cita->date.' '.$cita->start)) }} <br>
                                                    <small>{{ \Carbon\Carbon::parse($cita->date.' '.$cita->start)->diffForHumans() }}</small>
                                                </td>
                                                <td><h5>Bs. {{ $cita->amount_paid }}</h5></td>
                                            </tr>
                                            @php
                                                $total_deuda += $cita->amount_paid;
                                            @endphp
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No hay registros</td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="3"><h5>Monto total</h5></td>
                                            <td><h4>Bs. {{ number_format($total_deuda, 2, ',', '.') }}</h4></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><h5>Monto a pagar</h5></td>
                                            <td>
                                                <h4 id="label-payment-amount">Bs. 0.00</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" data-toggle="modal" data-target="#modal-confirm" class="btn btn-primary">Pagar <i class="voyager-dollar"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- modal --}}
            <div class="modal modal-info fade" tabindex="-1" id="modal-confirm" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><i class="voyager-dollar"></i> Registrar pago a especialista</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <textarea name="observations" rows="5" class="form-control" placeholder="Observaciones..."></textarea>
                            <input type="hidden" name="amount" value="0">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="Sí, pagar!">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')

@stop

@section('javascript')
    <script>
        $(document).ready(function(){
            $('.check-amount').click(function(){
                calcularTotal()
            });

            $('.chack-all').click(function(){
                let check = $(this).is(':checked');
                if(check){
                    $('.check-amount').each(function(){
                        $(this).prop('checked', true);
                    });
                }else{
                    $('.check-amount').each(function(){
                        $(this).prop('checked', false);
                    });
                }
                calcularTotal()
            });
        });

        function calcularTotal(){
            let total = 0;
            let check_all = true;
            $('.check-amount').each(function(){
                if($(this).is(':checked')){
                    total += parseFloat($(this).data('amount'));
                }else{
                    check_all = false;
                }
            });
            $('#label-payment-amount').text(`Bs. ${total.toFixed(2)}`);
            $('#form-store input[name="amount"]').val(total);
            if(check_all){
                $('.chack-all').prop('checked', true);
            }else{
                $('.chack-all').prop('checked', false);
            }
        }
    </script>
@stop
