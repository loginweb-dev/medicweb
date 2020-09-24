@extends('voyager::master')

@section('page_title', 'Editar especialista')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-people"></i> Editar especialista
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <form id="form-store" name="form" action="{{ ! $specialist->id ? route('specialists.store') : route('specialists.update', $specialist->id)}}" method="POST" enctype="multipart/form-data">
            @if($specialist->id)
                @method('PUT')
            @endif
                @csrf
                <div class="col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') ? :  $specialist->name }}" placeholder="Jhon" required>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Apellidos</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') ? : $specialist->last_name }}" placeholder="Doe Smith" required>
                                    @error('last_name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Número(s) de telefono(s)</label>
                                <input type="text" name="phones" id="input-tags" data-role="tagsinput" class="form-control" value="{{ old('phones') ? : $specialist->phones }}" placeholder="Telefono">
                                @error('phones')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Localidad</label>
                                <select name="location" id="select-location" class="form-control" required>
                                    <option value="">Seleccione la localidad</option>
                                    @foreach(\App\Specialist::groupBy('location')->get() as $locat)
                                        <option {{old('location') === $locat || $specialist->location === $locat->location  ? 'selected' : ''}} value="{{ $locat->location  }}">{{ $locat->location  }} </option>
									@endforeach
                                </select>
                                @error('location')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Direción</label>
                                <textarea name="adress" class="form-control" rows="3">{{ old('adress') ? :$specialist->adress }}</textarea>
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
                            <div class="form-group">
                                <label>Prefijo por defecto</label>
                                <input type="text" name="prefix" class="form-control" value="{{ old('prefix') ? : $specialist->prefix }}" placeholder="Dr." required>
                            </div>
                            <div class="form-group">
                                <label>Especialidades</label>
                                <select name="specialities[]" class="form-control select2" multiple id="">
                                    @foreach(\App\Speciality::orderBy('name')->pluck('name','id') as $id => $especialidad)
											<option {{collect(old('',$specialist->specialities->pluck('id')))->contains($id) ? 'selected' : ''}} value="{{ $id }}">{{ $especialidad }} </option>
									@endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    @php

                                       if($specialist->user()->exists()) {
                                        $email = $specialist->user->email;
                                       } else {
                                         $email = '';
                                       }
                                    @endphp
                                    <div class="form-group">
                                        <label>Usuario(correo)</label>
                                        <input type="text" name="email" class="form-control" value="{{ old('email') ? : $email}}" required>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: -10px">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <h4>Asignar horarios <br>  <small>Los horarios tienen una duración de 2 horas</small></h4>
                            {{-- <div class="form-group">
                              <select name="horarios[]" id="horarios" class="form-control select2" multiple>
                                @foreach(\App\Horario::orderBy('titulo')->pluck('titulo','id') as $id => $horario)
									<option {{collect(old('',$specialist->horarios->pluck('id')))->contains($id) ? 'selected' : ''}} value="{{ $id }}">{{ $horario }} </option>
								@endforeach
                              </select>
                            </div> --}}
                            <table class="table">
                                <tbody>
                                    @php
                                        $dias = ['', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                                    @endphp
                                    @foreach ($horarios->groupBy('day') as $item)
                                    <tr>
                                        <td><b>{{ $dias[$item[0]->day] }}</b></td>
                                        @foreach ($item as $horario)
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="schedules[]" value="{{ $horario->id }}" id="exampleCheck-{{ $horario->id }}"
                                                    @isset($horario_especialista)
                                                        @foreach ($horario_especialista as $h_e)
                                                            @if ($h_e->id == $horario->id)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                >
                                                <label class="form-check-label" for="exampleCheck-{{ $horario->id }}">{{ date('H', strtotime($horario->start)).' - '.date('H  A', strtotime($horario->end)) }}</label>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: -10px">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            @if (!$specialist->id)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="return" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">Permanecer aquí</label>
                                </div>
                            @endif
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

            @if ($specialist->id)
            $('.img-preview').attr('src', "{{ url('storage/'.$specialist->user->avatar) }}");
            @endif

            initSelect2Editable(`#select-location`);
        });
    </script>
@stop
