@extends('voyager::master')

@section('page_title', 'Agregar cliente')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-people"></i> Editar cliente
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <form id="form-store" name="form" action="{{ route('customers.update',$customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{ $customer->name }}" placeholder="Jhon" required>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Apellidos</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ $customer->last_name }}" placeholder="Doe Smith" required>
                                    @error('last_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Número(s) de telefono(s)</label>
                                <input type="text" name="phones" id="input-tags" data-role="tagsinput" class="form-control" value="{{ $customer->phones }}" placeholder="Telefono">
                                @error('phones')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Direción</label>
                                <textarea name="adress" class="form-control" rows="3">{{$customer->adress}}</textarea>
                                @error('adress')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Usuario(correo)</label>
                                        <input type="text" name="email" class="form-control" value="{{$customer->user->email}}" required>
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" class="form-control" required>
                                        @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="text-align:center; margin-top: 40px">
                                        <input type='file' name="avatar" class="input-preview" id="input-preview" />
                                        <img class="img-thumbnail img-preview" id="img-preview" data-toggle="tooltip" title="Has click para agregar una imagen" alt="avatar" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div style="height: 80px"></div>
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
                            <button type="button" class="btn btn-primary btn-submit">Guardar</button>
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

            $('.btn-submit').click(function(){
                $('#form-store').submit();
            });
        });
    </script>
@stop
