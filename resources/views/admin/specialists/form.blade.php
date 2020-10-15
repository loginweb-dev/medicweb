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
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Reseña del profesional</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description') ? : $specialist->description }}</textarea>
                                @error('adress')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: -10px">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 20px">
                                    <div class="col-md-6">
                                        <h3>Asignar horarios</h3>
                                    </div>
                                    <div class=" col-md-6 input-group pull-right">
                                        <select name="" class="form-control" id="select-day">
                                            <option value="1-7">Todos</option>
                                            <option value="1-5">Lunes - Viernes</option>
                                            <option value="1-1">Lunes</option>
                                            <option value="2-2">Martes</option>
                                            <option value="3-3">Miercoles</option>
                                            <option value="4-4">Jueves</option>
                                            <option value="5-5">Viernes</option>
                                            <option value="6-6">Sábado</option>
                                            <option value="7-7">Domingo</option>
                                        </select>
                                        <span class="input-group-addon">De</span>
                                        <input id="input-inicio" type="time" class="form-control" placeholder="Inicio">
                                        <span class="input-group-addon">a</span>
                                        <input id="input-fin" type="time" class="form-control" placeholder="Fin">
                                        <span class="input-group-addon text-primary" style="text-decoration: none"><a href="#" class="btn-add"><b>Agregar</b> <span class="voyager-plus"></span></a></span>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="200px">Días</th>
                                        <th class="text-center">Horarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $dias = ['', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                                    @endphp
                                    @for ($i = 1; $i < count($dias); $i++)
                                        <tr>
                                            <td><b>{{ $dias[$i] }}</b></td>
                                            <td id="tr-horario-{{ $i }}" class="text-center">
                                                @isset($horario_especialista)
                                                    @foreach ($horario_especialista as $h_e)
                                                        @if ($h_e->day == $i)
                                                            <div class="btn-group" id="div-schedule-{{ $h_e->id }}">
                                                                <button type="button" class="btn btn-success btn-sm schedule-button" >De {{ date('H:i', strtotime($h_e->start)) }} a {{ date('H:i', strtotime($h_e->end)) }}</button>
                                                                <button type="button" class="btn btn-danger btn-sm schedule-button" onclick="remove({{ $h_e->id }})" data-toggle="tooltip" title="Eliminar" ><span class="voyager-trash"></span></button>
                                                                <input type="hidden" name="schedules[]"  value="{{ $h_e->id }}">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endisset
                                            </td>
                                        </tr>
                                    @endfor
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

    <form id="form-schedules-create" action="{{ route('specialists.schedules.store') }}" method="post">
        @csrf
        <input type="hidden" name="day">
        <input type="hidden" name="start">
        <input type="hidden" name="end">
    </form>
@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('js/plugins/input-multiple/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('js/plugins/input-multiple/app.css')}}">
    <style>
        .schedule-button{
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px
        }
    </style>
@stop

@section('javascript')
    <script src="{{ url('js/plugins/input-multiple/bootstrap-tagsinput.js')}} "></script>
    <script src="{{ url('js/plugins/input-multiple/app.js') }}"></script>
    <script src="{{ url('js/plugins/image-preview.js') }}"></script>
    <script src="{{ url('js/plugins/select2-editable.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('#input-tags').tagsinput({});

            $('.btn-submit').click(function(){
                $('#form-store').submit();
            });

            @if ($specialist->id)
            $('.img-preview').attr('src', "{{ url('storage/'.$specialist->user->avatar) }}");
            @endif

            initSelect2Editable(`#select-location`);

            $('.btn-add').click(function(e){
                e.preventDefault();
                let days = $(`#select-day option:selected`).val().split('-');
                let inicio = $(`#input-inicio`).val();
                let fin = $(`#input-fin`).val();
                let find;
                if(inicio && fin){
                    for (let id = parseInt(days[0]); id <= parseInt(days[1]); id++) {
                        $('#form-schedules-create input[name="day"]').val(id);
                        $('#form-schedules-create input[name="start"]').val(inicio);
                        $('#form-schedules-create input[name="end"]').val(fin);
                        $('#form-schedules-create').trigger('reset');
                        $(`#input-inicio`).val('');
                        $(`#input-fin`).val('');
                        $.post($('#form-schedules-create').attr('action'), $('#form-schedules-create').serialize(), function(res){
                            find = false;
                            $('#form-store input[name="schedules[]"]').each(function(){
                                if($(this).val() == res.schedule.id){
                                    find = true;
                                }
                            });
                            if(res){
                                if(!find){
                                    $(`#tr-horario-${id}`).append(` <div class="btn-group" id="div-schedule-${res.schedule.id}">
                                                                        <button type="button" class="btn btn-success btn-sm schedule-button">De ${inicio} a ${fin}</button>
                                                                        <button type="button" class="btn btn-danger btn-sm schedule-button" onclick="remove(${res.schedule.id})" data-toggle="tooltip" title="Eliminar"><span class="voyager-trash"></span></button>
                                                                        <input type="hidden" name="schedules[]"  value="${res.schedule.id}">
                                                                    </div>`);
                                }else{
                                    toastr.remove();
                                    toastr.warning('El horario ya e encuentra agregado', 'Advertencia!');
                                }
                            }else{
                                toastr.error('Intente nuevamnete.', 'Error');
                            }
                        });
                    }
                }else{
                    toastr.warning('Debes completar el inicio y el fin.', 'Advertencia');
                }
            });
        });

        function remove(id){
            $(`#div-schedule-${id}`).remove();
        }
    </script>
@stop
