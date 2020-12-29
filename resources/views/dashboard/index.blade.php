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

        {{-- Especialistas --}}
        <div class="row div-dismiss" id="div-list-specialists" style="display: none"></div>

        {{-- Detalles de especialistas --}}
        <div class="row div-dismiss" id="div-details-specialists" style="display: none">
          <div class="col-md-12 mb-3">
            <h5 id="title-details-specialist"><a href="#" onclick="breadCrunb('#div-list-specialities')">Especialidades</a> / <a href="#" onclick="breadCrunb('#div-list-specialists')">Especialidades</a>  / hols</h5>
          </div>
          <div class="card">
            <div class="card-body">
              <form id="form-appointments" action="{{ route('appointments.store') }}" method="post">
                @php
                    $customer = \App\Customer::where('user_id', Auth::user()->id)->first();
                    $customer_id = 0;
                    if($customer){
                      $customer_id = $customer->id;
                    }
                @endphp         
                <div class="row">
                  <div class="col-md-12">
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
                        <input type="hidden" name="payment_type" value="2">
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
                              <div class="card-header bg-primary btn-payment-type" data-value="2" id="headingTarjeta" data-toggle="collapse" data-target="#collapseTarjeta" aria-expanded="false" aria-controls="collapseTarjeta" style="cursor: pointer">
                                <h6 class="mb-0 text-white">
                                  Pago con tarjeta de crédito/débito
                                </h6>
                              </div>
                              <div id="collapseTarjeta" class="collapse show" aria-labelledby="headingTarjeta" data-parent="#accordion">
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
                                    @php
                                      $stripe_key = 'pk_test_ytzvi8dfXTzPkZ26tQ2Qyuj700BwiGRmXf';
                                    @endphp
                                    <div class="col-md-7 text-center">
                                      <div class="row">
                                        <div class="col-md-12">                    
                                          <div class="form-group">
                                              <div class="card-header">
                                                  <label for="card-element">Información de tu tarjeta</label>
                                              </div>
                                              <div class="card-body">
                                                  <div id="card-element">
                                                  <!-- A Stripe Element will be inserted here. -->
                                                  </div>
                                                  <!-- Used to display form errors. -->
                                                  <div id="card-errors" role="alert" style="margin-top: 50px"></div>
                                                  <input type="hidden" name="plan" value="" />
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-5 text-center">
                                      <div id="div-payment-details">
                                        <div class="card text-white bg-info">
                                          <div class="card-header bg-info">Instrucciones</div>
                                          <div class="card-body">
                                            {{-- <h5 class="card-title">Info card title</h5> --}}
                                            <p class="card-justify">Debes habilitar tus compras por internet e ingresar los datos de tu tarjeta</p>
                                            <small>NOTA: en caso de pedir CP (Código postal) ingresa 00000</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 text-right" style="margin-top: 30px">
                                      <button id="card-button" class="btn btn-success btn-lg" type="button">Realizar cita <span class="fa fa-check-square"></span></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="card">
                              <div class="card-header bg-primary btn-payment-type" data-value="1" id="headingTransferencia" data-toggle="collapse" data-target="#collapseTransferencia" aria-expanded="true" aria-controls="collapseTransferencia" style="cursor: pointer">
                                <h6 class="mb-0 text-white">
                                  Transferencia bancaria
                                </h6>
                              </div>
                              <div id="collapseTransferencia" class="collapse" aria-labelledby="headingTransferencia" data-parent="#accordion">
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
                                    <div class="col-md-5">
                                      <div id="div-payment-details">
                                        <div class="card text-white bg-info">
                                          <div class="card-header bg-info text-center">Instrucciones</div>
                                          <div class="card-body">
                                            {{-- <h5 class="card-title">Info card title</h5> --}}
                                            <p id="message-1" class="card-justify">Dar click sobre la cuenta a la que realizará la tranferencia</p>
                                            <p id="message-2" style="display: none" class="card-justify">Debe transferir <b class="label-price-appointment"></b> mediante la web o su dispositivo móvil a la cuenta seleccionada. Una vez realizado este proceso para que validemos su cita médica, debe enviar una captura de pantalla del comprobante de transferencia al siguiente número de Whatsapp: <br> <b class="text-center">{{ setting('whatsapp.phone') }}</b> </p>
                                          </div>
                                          <div class="card-footer bg-info">
                                              <small>En caso de demorar demaciado en validar tu pago comunicarse a nuestro centro de atención al cliente: {{ setting('site.telefonos') }}.</small>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 text-right" style="margin-top: 30px">
                                      <button type="submit" class="btn btn-success btn-lg btn-store-appointment">Realizar cita <span class="fa fa-check-square"></span></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>         
                <div class="row" style="margin-top: 20px">
                  <div class="col-md-12 text-right" id="div-btn-payment">
                    {{-- <button class="btn btn-secondary btn-cancel" type="button" data-dismiss="modal">Cancelar</button> --}}
                    <button type="button" class="btn btn-success btn-payment">Forma de pago <span class="fas fa-money-bill"></span></button>
                  </div>
                </div>
                <div class="col-md-12 text-center mt-5">
                  <button type="button" class="btn btn-primary" onclick="breadCrunb('#div-list-specialists')"> <span class="fas fa-arrow-alt-circle-left"></span> Volver atras</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="col-md-12 text-center" id="div-loading" style="display: none;top: 25%;">
      <img src="{{ url('images/loader.gif') }}" width="150px" />
    </div>

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
                        return `../../admin/specialists/get/search/${escape(params.term)}`;
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
            .change(async function(){
              let id = $(this).val();
              let res = await $.get(`../../admin/specialists/get/id/${id}`, res => res);
              if(res.especialista.specialities.length){
                let id = res.especialista.specialities[0].id;
                let specialistId = res.especialista.id;
                specialistsList(id, specialistId);
              }
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
              $('#loading-overlay').css('display', 'flex');
              e.preventDefault();
              
              $('.btn-store-appointment').prop('disabled', true);
              $('.btn-store-appointment').html(`Registrando...`);
              $.post($(this).attr('action'), $(this).serialize(), function(res){
                $('#loading-overlay').fadeOut();
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
                $('.btn-store-appointment').removeAttr('disabled');
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
              specialistsList(id);
            });

            function specialistsList(id, specialist_id = null){
              $('#div-list-specialists').html(loading);
              $('#div-list-specialities').fadeOut("fast", function(){
                $('#div-list-specialists').fadeIn();
                $.get('{{ url("admin/specialists/specialities") }}/'+id+'/'+specialist_id, (res) => {
                  $('#div-list-specialists').html(res);
                });
                $([document.documentElement, document.body]).animate({scrollTop: $(this).offset().top}, 100);
              });
            }

            // Mostrar formulario de pasarela de pago
            $('.btn-payment').click(function(){
              if($('#form-appointments textarea[name="observations"]').val()){
                $('#div-btn-store').css('display', 'block');
                $('#div-btn-payment').css('display', 'none');
                $('#div-appointment-details').fadeOut('fast');
                $('#div-payment-details').fadeIn();
                // $('#form-appointments input[name="payment_type"]').val(1);
              }else{
                $('#form-appointments textarea[name="observations"]').css('border', '1px solid red');
                $('.text-error').css('display', 'block');
              }
            });

            $('#form-appointments textarea[name="observations"]').click(function(){
              $('#form-appointments textarea[name="observations"]').css('border', '1px solid #dedede');
              $('.text-error').css('display', 'none');
            });

            // Asignar valor del tipo de pago de ña cita médica
            $('.btn-payment-type').click(function(){
              let value = $(this).data('value');
              $('#form-appointments input[name="payment_type"]').val(value);
              if(value == 1){
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

        // Presionar en la miga de pan
        function breadCrunb(value){
          $('.div-dismiss').fadeOut('fast');
          $(value).fadeIn('fast');
        }

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

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe("{{ $stripe_key }}", { locale: 'es' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
          }
        });

        $('#card-button').click(function() {
          $('#loading-overlay').css('display', 'flex');
          $.post('{{ url("home/checkout") }}', {
            _token: '{{ csrf_token() }}',
            amount: $('#form-appointments input[name="price"]').val()
          }, function(res){
            if(!res.error){
              stripe.handleCardPayment(res.intent, cardElement, {
                payment_method_data: {
                  //billing_details: { name: cardHolderName.value }
                }
              })
              .then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error.
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;
                  $('#loading-overlay').fadeOut();
                }else{
                  $('#form-appointments').trigger("submit");
                }
              });
            }else{
              $('#loading-overlay').fadeOut();
              Swal.fire('Error', 'Ocurrió un error inesperado en nuestro servidor', 'error');
            }
          });
        });
    </script>
@endsection