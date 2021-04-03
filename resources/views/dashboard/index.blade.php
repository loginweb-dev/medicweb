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
        <div class="row" id="div-search">
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

                        <div id="div-messages">
                          {{-- Mensaje de no disponible --}}
                          <div class="col-md-12 mt-3">
                              <div class="card border-left-danger shadow h-100 py-2 alert-message" style="display: none" id="message-error-available">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-uppercase mb-1">No disponible</div>
                                      <div class="h6 mb-0 font-weight-bold text-danger">
                                        <p>El especialista no está disponible en este momento, debe programar una consulta seleccionando algún horario de la lista superior.</p>
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
                                <div class="text-right">
                                  <h4 class="text-info label-price-appointment"></h4>
                                  <input type="hidden" id="normal_price">
                                  <input type="hidden" class="input-price" name="price">
                                  <input type="hidden" class="input-price" name="price_add">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check-reconsulta">
                                    <label class="form-check-label" for="check-reconsulta">
                                      Reconsulta
                                    </label>
                                  </div>
                                  <small>En caso de ser una reconsulta puede tener un descuento</small>
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
                        
                        <div class="form-group col-md-12 mt-3" id="div-observations" style="display: none">
                            <textarea name="observations" class="form-control" placeholder="Describa el motivo de su consulta médica" rows="3"></textarea>
                        </div>

                        <div class="col-md-12 mt-3 mb-2" id="div-services" style="display: none">
                          <div class="card">
                            <div class="card-body">
                              <label>Servicios de enfermería</label>
                              <div class="row">
                                @foreach (App\Service::all() as $item)
                                  <div class="col-md-3">
                                    <div class="form-check">
                                      <input class="form-check-input check-service_id" type="checkbox" name="service_id[]" value="{{ $item->id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" id="flexCheckIndeterminate-{{ $item->id }}">
                                      <label class="form-check-label" for="flexCheckIndeterminate-{{ $item->id }}">
                                        {{ $item->name }} - {{ $item->price }} Bs.
                                      </label>
                                    </div>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                            <div class="col-md-12">
                              <small>Seleccione qué servicios require contrartar, en base a dichos servicios se calculará el monto que debe pagar.</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    {{-- Modal de pago --}}
                    <div class="modal fade" id="modal-payment" tabindex="-1" role="dialog" aria-labelledby="modal-paymentLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="modal-paymentLabel">Formas de pago</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <div class="col-md-12">
                                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                                          <li class="nav-item" onclick="change_payment_type(1)">
                                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tanferencia bancaria</a>
                                          </li>
                                          <li class="nav-item" onclick="change_payment_type(1)">
                                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pago con tarjeta de crédito</a>
                                          </li>
                                      </ul>
                                      <div class="tab-content" id="myTabContent" style="margin-top: 20px">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                              <table class="table table-hover">
                                                  <tbody>
                                                      @php
                                                          $cuentas = \App\PaymentAccount::all();
                                                      @endphp
                                                      @foreach ($cuentas as $item)
                                                      <tr>
                                                          <td width="120px"><img src="{{ $item->image ? asset('storage/'.str_replace('.', '-cropped.', $item->image)) : asset('images/payment.jpg') }}" width="100px" alt=""></td>
                                                          <td>
                                                              <h6>{{ $item->number }}<br><small>{{ $item->title }}</small></h6>
                                                              <small>{{ $item->name }} {{ $item->ci }}</small><br>
                                                              <small>{{ $item->type }} - {{ $item->currency }}</small>
                                                          </td>
                                                      </tr>
                                                      @endforeach
                                                      {{-- <tr>
                                                          <td width="120px"><img src="{{ url('images/tigomoney.png') }}" alt="Tigo Money" width="100px"></td>
                                                          <td>
                                                              <h6>{{ setting('pasarela-de-pago.numeros_tigo_money') }} <br><small>Número(s) de celular de Tigo Money</small> </h6>
                                                              <span></span>
                                                          </td>
                                                      </tr> --}}
                                                  </tbody>
                                              </table>
                  
                                              <div class="col-md-12 mt-3">
                                                  <div class="card border-left-info shadow h-100 py-2">
                                                      <div class="card-body">
                                                          <div class="row no-gutters align-items-center">
                                                              <div class="col mr-2">
                                                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Información</div>
                                                                  <div class="h6 mb-0 font-weight-bold text-info">
                                                                      <p>Una vez realizada la transferencia enviar el comprobante a los siguientes números de Whatsapp: <b>{{ setting('whatsapp.phone') }}</b>.</p>
                                                                  </div>
                                                              </div>
                                                              <div class="col-auto">
                                                                  <i class="fab fa-whatsapp fa-2x text-info"></i>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                              <div class="row mt-5 mb-3">
                                                  <div class="col-md-12 text-center">
                                                      <img src="{{ asset('images/config.png') }}" width="120px">
                                                  </div>
                                              </div>
                                              <h3 class="text-center">En desarrollo</h3>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button type="submit" class="btn btn-primary">Solicitar consulta</button>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="mt-3" id="div-map">
                      <label class="text-muted">Mi ubicación</label>
                      <div id="map" style="height: 250px"></div>
                      <input type="hidden" name="location">
                    </div>

                  </div>
                </div>

                <div class="row" style="margin-top: 20px">
                  <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success btn-payment">Formas de pago <span class="fas fa-money-bill"></span></button>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfhTHyaCn2bXEKvT13E0YEutlQY1bmfoM&callback=initMap&libraries=&v=weekly" defer></script>
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
              e.preventDefault();
              $('#modal-payment').modal('hide');
              $('#loading-overlay').css('display', 'flex');
              setTimeout(() => {
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
                      'Ocurrió un error al registrar la consulta médica.',
                      'error'
                    )
                  }
                })
              }, 500);
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
              let id = $('#select-speciality').val();
              if(id == 3){
                let cont = 0;
                $('.check-service_id:checked').each(function(){
                  cont++
                });
                if(cont){
                  $('#modal-payment').modal('show');
                }else{
                  Swal.fire(
                    'Error',
                    'Debes elegir al menos un servicio de enfermería que deseas contratar',
                    'error'
                  )
                }
              }else{
                if($('#form-appointments textarea[name="observations"]').val()){
                  $('#modal-payment').modal('show');
                }else{
                  Swal.fire(
                    'Error',
                    'Debes ingresar el motivo de su consulta médica.',
                    'error'
                  )
                }
              }
            });

            $('.check-service_id').click(function(){
              let total = 0;
              let observations = '';
              $('.check-service_id:checked').each(function(){
                total += parseFloat($(this).data('price'));
                observations += $(this).data('name')+', '
              });
              $('.label-price-appointment').html(`${total.toFixed(2)} Bs.`);
              $('#form-appointments input[name="price"]').val(total);
              $('#form-appointments input[name="price_add"]').val(0);
              $('#form-appointments textarea[name="observations"]').val(observations.substring(0, observations.length -2));
            });

            $('#check-reconsulta').click(function(){
              let speciality = $('#select-speciality').val();
              if(speciality == 3){
                Swal.fire('Error', 'Las reconsultas solo son permitidas para medicina general o especialidades.', 'error');
                $(this).prop('checked', false);
              }else{
                if($(this).is(":checked")){
                  let specialist_id = $('#form-appointments input[name="specialist_id"]').val();
                  let customer_id = '{{ $customer_id }}';
                  let speciality_id = $('#select-speciality').val();
                  let url = '{{ url("admin/appointments/customer") }}';
                  $.get(`${url}/${customer_id}/${specialist_id}/${speciality_id}`, function(res){
                    if(res.speciality){
                      if(res.speciality.price_alt){
                        $('#form-appointments input[name="price"]').val(res.speciality.price_alt);
                      }else{
                        Swal.fire('Lo sentimos', 'El precio de reconsulta es el mismo que el de consulta normal.', 'info');  
                      }
                      calcularTotal();
                    }else{
                      Swal.fire('Error', res.error, 'error');
                      $('#check-reconsulta').prop('checked', false);
                    }
                  });
                }else{
                  $('#form-appointments input[name="price"]').val($('#normal_price').val());
                  calcularTotal();
                }
              }
            });
        });

        // Presionar en la miga de pan
        function breadCrunb(value){
          $('.div-dismiss').fadeOut('fast');
          $(value).fadeIn('fast');
          $('#div-search').fadeIn('fast');
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

        function change_payment_type(id){
          $('#form-appointments input[name="payment_type"]').val(id);
        }
    </script>

    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      let map, infoWindow;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -14.835473, lng: -64.904180 },
          zoom: 14,
        });
        infoWindow = new google.maps.InfoWindow();
          
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            $('#form-appointments input[name="location"]').val(position.coords.latitude+','+position.coords.longitude);

            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Posición actual'
            });
            map.setCenter(pos);
          }, function() {
              //handle location error (i.e. if user disallowed location access manually)
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
      }
    </script>

    {{-- <script src="https://js.stripe.com/v3/"></script>
    <script>
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

        const stripe = Stripe("{{ env('STRIPE_PUBLIC_KEY') }}", { locale: 'es' }); // Create a Stripe client.
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
    </script> --}}
@endsection