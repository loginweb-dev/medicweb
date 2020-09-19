@extends('dashboard.layouts.master')

@section('header')
  <title>{{ setting('site.title') }} | Perfil</title>
@endsection

@section('content')
    <div class="container-fluid mb-5" id="main-content">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
            {{-- <a href="#" data-toggle="modal" data-target="#modal-appointments" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-laptop-medical fa-sm text-white-50"></i> Nueva cita</a> --}}
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-9">
              <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <ul class="nav nav-tabs mt-2 mx-2" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos personales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">Datos de usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-lg-4 d-none d-lg-block">
                                    <div class="text-center mt-5 mx-5">
                                        <form id="form-avatar">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cliente->id }}">
                                            <img class="img-fluid img-thumbnail img-preview" src="{{ strpos($cliente->user->avatar, 'http') === false ? asset('storage/'.str_replace('.', '-cropped.', $cliente->user->avatar)) : $cliente->user->avatar }}" width="100%" alt="{{ $cliente->name }}">
                                            <div class="col-md-12 text-center load-image" style="display: none">
                                                Cargando...
                                            </div>
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-link btn-change-avatar">Cambiar <span class="fa fa-edit"></span></button>
                                            </div>
                                            <input type='file' name="avatar" style="display: none" id="input-avatar" accept="image/x-png,image/jpeg" />
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        {{-- <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-5">Datos personales</h1>
                                        </div> --}}
                                        <form class="form-user user" action="{{ route('customers.update', ['customer' => $cliente->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="ajax" value="1">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="input-name">Nombre(s)</label>
                                                    <input type="text" name="name" class="form-control form-control-user" id="input-name" value="{{ $cliente->name }}" aria-describedby="input-name" placeholder="John">
                                                    @error('name')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="input-last_name">Apellidos</label>
                                                    <input type="text" name="last_name" class="form-control form-control-user" id="input-last_name" value="{{ $cliente->last_name }}" aria-describedby="input-last_name" placeholder="Smith A.">
                                                    @error('last_name')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="input-phones">Telefonos</label>
                                                    <input type="text" name="phones" class="form-control form-control-user" id="input-phones" value="{{ $cliente->phones }}" aria-describedby="input-phones" placeholder="75199157">
                                                    @error('phones')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="input-adress">Dirección</label>
                                                    <textarea name="adress" class="form-control form-control-user" id="input-adress" aria-describedby="input-adress" placeholder="Av. David Shriqui Nª123">{{ $cliente->adress }}</textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" required>
                                                    <label class="custom-control-label" for="customCheck">Aceptar y actualizar</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Actualizar datos</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <div class="mt-5">
                                        <div class="col-xl-12 col-md-12 mb-4">
                                            <div class="card border-left-danger shadow h-100">
                                                <div class="card-body">
                                                    <h5 class="text-justify">Importante!</h5>
                                                    <p>
                                                        Por seguridad no debe revelar a nadie su email y contraseña para evitar riesgo de robo de identidad. <br>
                                                        Si desea cambiar su contraseña debe ingresar la contraseña actual para realizar la validación y la nueva contraseña con las que deseas reemplazar la actual.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <form class="form-user user" action="{{ route('customers.update', ['customer' => $cliente->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="ajax" value="1">
                                            <input type="hidden" name="change_password" value="1">
                                            
                                            {{-- Datos auxiliares para evitar que el validador nos devuelva error --}}
                                            <input type="hidden" name="name" value="{{ $cliente->name }}">
                                            <input type="hidden" name="last_name" value="{{ $cliente->last_name }}">
                                            <input type="hidden" name="phones" value="{{ $cliente->phones }}">
                                            
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="input-email">Email</label>
                                                    <input type="text" name="email" class="form-control form-control-user" id="input-email" value="{{ $cliente->user->email }}" aria-describedby="input-email" placeholder="John">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="input-password">Contraseña</label>
                                                    <input type="password" name="password" class="form-control form-control-user" id="input-password" aria-describedby="input-password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="input-new_password">Nueva ontraseña</label>
                                                    <input type="password" name="new_password" class="form-control form-control-user" id="input-new_password" aria-describedby="input-new_password">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                                    <label class="custom-control-label" for="customCheck1">Aceptar y actualizar</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Actualizar datos</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('script')
<script src="{{ url('js/loginweb.js') }}"></script>
    <script>
        $(document).ready(function(){
            
            // Actualizar información personal
            $('.form-user').on('submit', function(e){
                e.preventDefault();
                $.post($(this).attr('action'), $(this).serialize(), function(res){
                    if(res.success){
                        Swal.fire('Bien hecho!', res.success, 'success')
                    }

                    if(res.error){
                        Swal.fire('Error!', res.error, 'error')
                    }
                });
            });

            // Previsualizar avatar
            $('.btn-change-avatar').click(function(){
                $('#input-avatar').trigger('click');
            })
            $("#input-avatar").change(function() {
                $('.load-image').css('display', 'block');
                let formData = new FormData(document.getElementById("form-avatar"));
                formData.append("dato", "valor");
                storeFormData(formData, "{{ url('admin/customers/update/avatar') }}", function(res){
                    $('.load-image').css('display', 'none');
                    res = JSON.parse(res);
                    if(res.avatar){
                        let image = res.avatar ? `../../storage/${res.avatar.replace('.', '-cropped.')}` : `../../storage/users/default.png`;
                        $('.img-preview').attr('src', image)
                    }else{
                        if(res.error){
                            Swal.fire('Error!', res.error, 'error')
                        }
                    }
                });
            });
        });
    </script>
@endsection