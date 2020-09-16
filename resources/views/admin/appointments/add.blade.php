@extends('voyager::master')

@section('page_title', 'Agregar cita')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-browser"></i> Agregar cita
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <form id="form-store" action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Especialista</label>
                                    <select name="specialist_id" class="form-control select2" id="" required>
                                        <option value="">Seleccione al especialista</option>
                                        @foreach ($especialistas as $item)
                                            <option value="{{ $item->id }}">{{ $item->prefix }} {{ $item->name }} {{ $item->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('specialist_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Cliente</label>
                                    <select name="customer_id" class="form-control select2" id="" required>
                                        <option value="">Seleccione al cliente</option>
                                        @foreach ($clientes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha</label>
                                    <input type="date" name="date" class="form-control" required>
                                    @error('date')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Hora de inicio</label>
                                    <input type="time" name="start" class="form-control" required>
                                    @error('start')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Descripción</label>
                                    <textarea name="observations" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: -10px">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="return" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Permanecer aquí</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('js/plugins/input-multiple/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('js/plugins/input-multiple/app.css')}}">
@stop

@section('javascript')
    <script src="{{ url('js/plugins/input-multiple/bootstrap-tagsinput.js')}} "></script>
    <script src="{{ url('js/plugins/input-multiple/app.js') }}"></script>
    <script src="{{ url('js/plugins/image-preview.js') }}"></script>
    <script src="{{ url('js/plugins/select2-editable.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#input-tags').tagsinput({});
        });
    </script>
@stop
