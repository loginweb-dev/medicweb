@extends('dashboard.layouts.master')

@section('header')
  <title>{{ setting('site.title') }} | Inicio</title>
@endsection

@section('content')
    <div class="container-fluid mb-5" id="main-content">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
            {{-- <a href="#" data-toggle="modal" data-target="#modal-appointments" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-laptop-medical fa-sm text-white-50"></i> Nueva cita</a> --}}
        </div>

        {{-- Buscador --}}
        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="card">
              <div class="card-body">
                <label for="select-search">
                  Busqueda de especialistas por nombre o ciudad <br>
                </label>
                <select name="" id="select-search" class="form-control"></select>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row div-dismiss" id="div-list-specialities">

            <div class="col-md-12 mb-3"><h5>Especialidades</h5></div>

            @foreach ($especialidades as $item)
              <div class="col-xl-3 col-md-6 mb-4 card-speciality" data-id="{{ $item->id }}" style="cursor: pointer">
                <div class="card border-left-{{ $item->color }} shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-{{ $item->color }} text-uppercase mb-1">{{ $item->name }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($item->specialists) }}</div>
                      </div>
                      <div class="col-auto">
                        <i class="{{ $item->icon }} fa-2x text-{{ $item->color }}"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            
        </div>

        <div class="row div-dismiss" id="div-list-specialists" style="display: none"></div>
    </div>

    <div class="col-md-12 text-center" id="div-loading" style="display: none;top: 25%;">
      <img src="{{ url('images/loader.gif') }}" width="150px" />
    </div>

    {{-- Modal de nueva cita --}}
    <form id="form-appointments" action="{{ route('appointments.store') }}" method="post">
        <div class="modal fade" id="modal-appointments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-laptop-medical"></i> Crear nueva cita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    @php
                        $customer = \App\Customer::where('user_id', Auth::user()->id)->first();
                        $customer_id = 0;
                        if($customer){
                          $customer_id = $customer->id;
                        }
                    @endphp
                    <div class="modal-body">
                        <div id="div-appointment-details">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row mt-3" style="display: none">
                                  <div class="form-group col-md-6">
                                      <label>Fecha de cita</label>
                                      <input type="date" id="input-date-1" readonly name="date" class="form-control input-date" required>
                                      @error('date')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                      <label>Hora de inicio</label>
                                      <input type="time" readonly name="start" class="form-control" required>
                                      @error('start')
                                        <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            {{-- Detalles del especialista --}}
                            <div class="col-md-12 mt-3">
                              <div id="accordion-specilaist">
                                <div class="card">
                                  <div class="card-header" id="headingOne-1" data-toggle="collapse" data-target="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">Información</div>
                                  <div id="collapseOne-1" class="collapse show" aria-labelledby="headingOne-1" data-parent="#accordion-specilaist">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-3 text-center mb-3">
                                          <img id="img-specialist" width="100%">
                                          <div class="mt-2" id="title-specialist"></div>
                                          <div id="badge-available"></div>
                                        </div>
                                        <div class="col-md-9">
                                          <div class="row" id="div-schedules-specilaist"></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{-- ========================= --}}

                            {{-- Mensaje de no disponible --}}
                            <div class="col-md-12 mt-3">
                                <div class="card border-left-danger shadow h-100 py-2 alert-message" style="display: none" id="message-error-available">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">No disponible</div>
                                        <div class="h6 mb-0 font-weight-bold text-danger">
                                          <p>El especialista no está disponible en este momento, debe programar una cita seleccionando algún horario de la lista superior.</p>
                                        </div>
                                      </div>
                                      <div class="col-auto">
                                        <i class="fas fa-ban fa-2x text-danger"></i>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>

                            {{-- Mensaje de disponible --}}
                            <div class="col-md-12 mt-3">
                              <div class="card border-left-success shadow h-100 py-2 alert-message" style="display: none" id="message-success-available">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">Disponible</div>
                                      <div class="h6 mb-0 font-weight-bold text-success">
                                        <p>El especialista está disponible en este momento, ingrese el motivo de su cosulta y realize el pago para ser atendido en un momento.</p>
                                      </div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-video fa-2x text-success"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div id="schedules-list"></div>
                            </div>

                            <div class="col-md-12 mt-3" id="div-select-speciality">
                              <div class="card">
                                <div class="card-body">
                                  <label for="select-speciality">Elija la especialidad</label>
                                  <select name="speciality_id" class="form-control" id="select-speciality"></select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-md-12 mt-3">
                              <div class="card border-left-info shadow h-100 py-2" style="display: none" id="message-payment-amount">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="h6 mb-0 font-weight-bold text-info">
                                        <p>La tarifa del especialista en este horario es:</p>
                                      </div>
                                    </div>
                                    <div class="col-auto">
                                      <h4 class="text-info label-price-appointment"></h4>
                                      <input type="hidden" class="input-price" name="price">
                                      <input type="hidden" class="input-price" name="price_add">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            @csrf
                            <input type="hidden" name="ajax" value="1">
                            <input type="hidden" name="specialist_id">
                            <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                            <input type="hidden" name="payment_type" value="1">
                            <input type="hidden" name="payment_account_id">
                            <div class="form-group col-md-12 mt-3">
                                <textarea name="observations" class="form-control" placeholder="Describa el motivo de su consulta" rows="3" required></textarea>
                                <p class="text-danger text-error" style="display:none">Debe describir el motivo de su consulta</p>
                            </div>
                          </div>
                        </div>
                        <div id="div-payment-details" style="display: none">
                          <div class="row">
                            <div class="col-md-12">
                              <div id="accordion">
                                <div class="card">
                                  <div class="card-header bg-primary btn-payment-type" data-value="1" id="headingTransferencia" data-toggle="collapse" data-target="#collapseTransferencia" aria-expanded="true" aria-controls="collapseTransferencia" style="cursor: pointer">
                                    <h6 class="mb-0 text-white">
                                      Transferencia bancaria
                                    </h6>
                                  </div>
                                  <div id="collapseTransferencia" class="collapse show" aria-labelledby="headingTransferencia" data-parent="#accordion">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-12 mb-3">
                                          <div class="card border-left-success shadow h-100 py-2">
                                            <div class="card-body">
                                              <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                  <div class="h5 mb-0 font-weight-bold text-success">
                                                    <p>Costo del servicio:</p>
                                                  </div>
                                                </div>
                                                <div class="col-auto">
                                                  <h4 class="text-success label-price-appointment"></h4>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-7 text-center">
                                          <table class="table table-hover">
                                            <tbody>
                                              @php
                                                $cuentas = \App\PaymentAccount::all();
                                              @endphp
                                              @forelse ($cuentas as $item)
                                              <tr class="tr-payment" id="tr-payment-{{ $item->id }}" data-id="{{ $item->id }}" style="cursor: pointer">
                                                <td width="120px"><img src="{{ $item->image ? asset('storage/'.str_replace('.', '-cropped.', $item->image)) : asset('images/payment.jpg') }}" width="120px" alt=""></td>
                                                <td>
                                                  <h6>{{ $item->number }}<br><small>{{ $item->title }}</small></h6>
                                                  <small>{{ $item->name }}</small><br>
                                                  <small>{{ $item->ci }}</small><br>
                                                  <small>{{ $item->type }} - {{ $item->currency }}</small>
                                                </td>
                                              </tr>
                                              @empty
                                                  
                                              @endforelse
                                            </tbody>
                                          </table>
                                        </div>
                                        <div class="col-md-5 text-center">
                                          <div id="div-payment-details">
                                            <div class="card text-white bg-info">
                                              <div class="card-header bg-info">Instrucciones</div>
                                              <div class="card-body">
                                                {{-- <h5 class="card-title">Info card title</h5> --}}
                                                <p id="message-1" class="card-justify">Dar click sobre la cuenta a la que realizará la tranferencia</p>
                                                <p id="message-2" style="display: none" class="card-justify">Debe transferir <b class="label-price-appointment"></b> mediante la web o su dispositivo móvil a la cuenta seleccionada. Una vez realizado este proceso presionar el botón <b>Registrar</b> para que validemos su cita médica.</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="card">
                                  <div class="card-header bg-primary btn-payment-type" data-value="2" id="headingTarjeta" data-toggle="collapse" data-target="#collapseTarjeta" aria-expanded="false" aria-controls="collapseTarjeta" style="cursor: pointer">
                                    <h6 class="mb-0 text-white">
                                      Pago con tarjeta de crédito/débito
                                    </h6>
                                  </div>
                                  <div id="collapseTarjeta" class="collapse" aria-labelledby="headingTarjeta" data-parent="#accordion">
                                    <div class="card-body">
                                      <h4 class="text-muted text-center">En desarrollo</h4>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-cancel" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-secondary btn-back-payment" type="button" style="display:none"><span class="fas fa-arrow-alt-circle-left"></span> Volver</button>
                        <button type="button" class="btn btn-success btn-payment">Forma de pago <span class="fas fa-money-bill"></span></button>
                        <button type="submit" class="btn btn-primary btn-store-appointment" disabled style="display:none">Registrar <span class="fa fa-check-square"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Logout Modal-->
    <form id="form-rating" action="{{ url('meet/rating/store') }}"method="post">
      <div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ratingModalLabel">Que te pareció la atención?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="col-md-12 text-center">
                <div class="store-rating"></div>
                <br>
                @csrf              
                <input type="hidden" name="id" value="{{ $meet_id }}">
                <input type="hidden" name="rating">
                <textarea name="comment" class="form-control mt-3" rows="5" placeholder="Si deseas déjanos un comentario..."></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success btn-rating" disabled>Puntuar</button>
            </div>
          </div>
        </div>
      </div>
    </form>

@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
      .select2-selection{
        height: 40px !important;
        padding: 10px
      }
      .select2-selection__arrow{
        margin: 10px
      }
    </style>
@endsection

@section('script')
    <script src="{{ url('js/plugins/formatSelect2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        let url_loader = "{{ url('images/loader.gif') }}";
        var loading = `<div class="col-md-12 text-center mt-5 mb-5">
                        <img src="${url_loader}" width="150px" />
                      </div>`;
        $(document).ready(function(){
            // Inicializar select2 personalizado
            $('#select-search').select2({
                placeholder: '<i class="fa fa-search"></i> Buscar especialista...',
                allowClear: true,
                theme: "bootstrap",
                width: '100%',
                escapeMarkup : function(markup) {
                    return markup;
                },
                language: {
                    inputTooShort: function (data) {
                        return `Por favor ingrese ${data.minimum - data.input.length} o más caracteres`;
                    },
                    noResults: function () {
                        return `<i class="far fa-frown"></i> No hay resultados encontrados`;
                    }
                },
                quietMillis: 250,
                minimumInputLength: 4,
                ajax: {
                    url: function (params) {
                        return `../../admin/specialists/get/${escape(params.term)}`;
                    },        
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                templateResult: formatResultAfiliados,
                templateSelection: (opt) => opt.full_name
            })
            .change(function(){
              // let id = $(this).val();
              // if(id){
              //   $('#form-appointments input[name="specialist_id"]').val(id);
              //   $('#modal-appointments').modal('show');
              // }
            });

            @if($meet_id)
            // Mostrar modal de puntuación
            $('#ratingModal').modal('show');
            // Inicializar Ratings
            $(".store-rating").starRating({
                starSize: 40,
                starGradient: {start: '#FFDC0F', end: '#F0CF0E'},
                callback: function(currentRating){
                  $('#ratingModal input[name="rating"]').val(currentRating);
                  $('.btn-rating').removeAttr('disabled');
                }
            });
            @endif

            // Guardar puntuación
            $('#form-rating').submit(function(e){
              e.preventDefault();
              $.post($(this).attr('action'), $(this).serialize(), function(res){
                $('#ratingModal').modal('hide');
                if(res.success){
                  Swal.fire(res.success, res.message, 'success');
                }else{
                  Swal.fire(res.error, res.message,'error');
                }
                $('#form-rating').trigger('reset');
              });
            });

            // Registrar cita
            $('#form-appointments').on('submit', function(e){
              e.preventDefault();
              $('#modal-appointments').modal('hide');
              $.post($(this).attr('action'), $(this).serialize(), function(res){
                if(res.success){
                  Swal.fire(
                    res.success,
                    'Se procederá a validar tu pago y un especialista se pondrá en contacto contigo, aguarda un momento.',
                    'success'
                  );
                  $('#form-appointments').trigger('reset');
                  $('#schedules-list').empty();
                  loadPage('appointments')
                }else{
                  Swal.fire(
                    res.error,
                    'Ocurrió un error al registrar la cita médica.',
                    'error'
                  )
                }
              })
            });

            var spinner_loader = `  <div class="d-flex justify-content-center">
                                      <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                    </div>`;

            // Desplegar lista de especialistas
            $('.card-speciality').click(function(){
              let id = $(this).data('id');
              $('#div-list-specialists').html(loading);
              $('#div-list-specialities').fadeOut("fast", () => {
                $('#div-list-specialists').fadeIn();
                $.get('{{ url("admin/specialists/specialities") }}/'+id, (res) => {
                  $('#div-list-specialists').html(res);
                });
              });
            });

            // Mostrar formulario de pasarela de pago
            $('.btn-payment').click(function(){
              if($('#form-appointments textarea[name="observations"]').val()){
                $(this).css('display', 'none');
                $('.btn-cancel').css('display', 'none');
                $('.btn-store-appointment').css('display', 'block');
                $('.btn-back-payment').css('display', 'block');
                $('#div-appointment-details').fadeOut('fast');
                $('#div-payment-details').fadeIn();
                $('#form-appointments input[name="payment_type"]').val(1);
              }else{
                $('#form-appointments textarea[name="observations"]').css('border', '1px solid red');
                $('.text-error').css('display', 'block');
              }
            });

            $('#form-appointments textarea[name="observations"]').click(function(){
              $('#form-appointments textarea[name="observations"]').css('border', '1px solid #dedede');
              $('.text-error').css('display', 'none');
            });

            // Mostrar formulario de detalles de cita
            $('.btn-back-payment').click(function(){
              $(this).css('display', 'none');
              $('.btn-store-appointment').css('display', 'none');
              $('.btn-payment').css('display', 'block');
              $('.btn-cancel').css('display', 'block');
              $('#div-payment-details').fadeOut('fast');
              $('#div-appointment-details').fadeIn();
            });

            // Asignar valor del tipo de pago de ña cita médica
            $('.btn-payment-type').click(function(){
              let value = $(this).data('value');
              $('#form-appointments input[name="payment_type"]').val(value);
              if(value == 1){
                $('.btn-store-appointment').removeAttr('disabled');
              }else{
                $('.btn-store-appointment').attr('disabled', 'disabled');
              }
            });

            // Seleccionar método de pago
            $('.tr-payment').click(function(e){
              e.preventDefault();
              let id = $(this).data('id');
              $(`.tr-payment`).css('background-color', 'transparent');
              $(`#tr-payment-${id}`).css('background-color', '#B4DCFF');
              $('.btn-store-appointment').removeAttr('disabled');
              $('#form-appointments input[name="payment_account_id"]').val(id);
              $('#message-1').fadeOut('fast');
              $('#message-2').fadeIn();
            });
        });

        function calcularTotal(){
          let total = 0;
          let monto = 0;
          $('.input-price').each(function(){
            monto = $(this).val() ? $(this).val() : '0';
            total += parseFloat(monto);
          });
          $('.label-price-appointment').html(`${total.toFixed(2)} Bs.`);
        }
    </script>
@endsection