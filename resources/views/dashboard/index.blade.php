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
                        <div class="row">
                          <div class="col-md-12">
                            <ul class="nav nav-tabs" id="myTabType" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link tab-link active" id="now-tab" data-toggle="tab" href="#now" role="tab" aria-controls="now" aria-selected="true">Ahora mismo</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link tab-link" id="future-tab" data-toggle="tab" href="#future" role="tab" aria-controls="future" aria-selected="false">Programar</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="myTabContentType">
                              <div class="tab-pane fade show active" id="now" role="tabpanel" aria-labelledby="now-tab">
                                <div class="row mt-3">
                                    <div class="form-group col-md-6">
                                        <label>Fecha</label>
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
                              <div class="tab-pane fade" id="future" role="tabpanel" aria-labelledby="future-tab">
                                <div class="form-group mt-3">
                                  <label>Fecha</label>
                                  <input type="date" id="input-date-2" disabled name="date" class="form-control input-date">
                                  @error('date')
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            @csrf
                            <input type="hidden" name="ajax" value="1">
                            <input type="hidden" name="specialist_id">
                            <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                            <div class="form-group col-md-12 mt-3">
                                {{-- <label>Descripción</label> --}}
                                <textarea name="observations" class="form-control" placeholder="Describa el motivo de su consulta" rows="5" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
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
              let id = $(this).val();
              if(id){
                $('#form-appointments input[name="specialist_id"]').val(id);
                $('#modal-appointments').modal('show');
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
              $('#modal-appointments').modal('hide');
              $.post($(this).attr('action'), $(this).serialize(), function(res){
                if(res.success){
                  Swal.fire(
                    res.success,
                    'El especialista se pondrá en contacto contigo, aguarda un momento.',
                    'success'
                  )
                }else{
                  Swal.fire(
                    res.error,
                    'Ocurrió un error al registrar la cita médica.',
                    'error'
                  )
                }
              })
            });

            // Halitar/Deshabilitar campo fecha según tipo de cita (ahor/programada)
            $('.tab-link').click(function(){
              let type = $(this).attr('href');
              $('.input-date').removeAttr('disabled');
              $('.input-date').removeAttr('required');
              if(type == '#future'){
                $('#input-date-1').attr('disabled', 'disabled');
                $('#input-date-2').attr('required', 'required');
              }else{
                $('#input-date-2').attr('disabled', 'disabled');
                $('#input-date-1').attr('required', 'required');
              }
            });

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
        });
    </script>
@endsection