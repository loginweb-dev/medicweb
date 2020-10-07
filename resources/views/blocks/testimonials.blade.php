  <div class="container">
  
      <!--Section: Testimonials v.2-->
      <section id="testimonials" class="mb-5 pb-4">
          <!--Section heading-->
          <h1 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">{{ $data->title12->value }}:</h1>

          <div class="wrapper-carousel-fix">

          <!--Carousel Wrapper-->
          <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade wow fadeIn"
              data-wow-delay="0.4s" data-ride="carousel" data-interval="false">

              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                @php
                    $specialists = \App\Specialist::with(['specialities'])->get();
                    $style = 'active';
                @endphp

              @foreach ($specialists as $item)
              <!--First slide-->
              <div class="carousel-item {{ $style }}">

                  <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                      <img src="{{ asset('storage/'.str_replace('.', '-cropped.', $item->user->avatar)) }}" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>{!! $data->parrafo->value !!}.
                  </p>

                  <h4>{{$item->name}}</h4>
                    @foreach ($item->specialities as $especialidad)
                        {{-- <label class="badge badge-{{ $especialidad->color }}">{{ $especialidad->name }}</label> --}}
                        <h3><span class="badge badge-{{ $especialidad->color }}">{{ $especialidad->name }}</span></h3><br>
                    @endforeach
                  <!--Review-->
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  </div>

              </div>
              <!--/First slide-->
              @php
                  $style = '';
              @endphp
              @endforeach
              <!--Second slide-->
              {{-- <div class="carousel-item">

                  <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                      <img src="{{ $data->image1->value != 'image1.png' ? Voyager::Image($data->image1->value) :'https://mdbootstrap.com/img/Photos/Avatars/img%20%2817%29.jpg'}}" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i>{!! $data->parrafo1->value !!}
                  </p>

                  <h4>{{$data->nombre1->value}}</h4>
                  <h3><span class="badge badge-success">Odontolgia</span></h3><br>
                  <!--Review-->
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star-half-alt"> </i>
                  </div>

              </div> --}}
              <!--/Second slide-->

              <!--Third slide-->
              {{-- <div class="carousel-item">

                  <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                      <img src="{{ $data->image2->value != 'image2.png' ? Voyager::Image($data->image2->value) :'https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg'}}" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  <p><i class="fas fa-quote-left"></i> {!! $data->parrafo2->value !!}
                  </p>

                  <h4>{{$data->nombre2->value}}</h4>
                  <h3><span class="badge badge-primary">Medicina General</span></h3><br>
                  <!--Review-->
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  </div>

              </div> --}}
              <!--/Third slide-->
              </div>
              <!--/Slides-->

              <!--Controls-->
              <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
              </a>
              <!--/.Controls-->
          </div>
          <!--/Carousel Wrapper-->
          </div>

      </section>
      <!--/Section: Testimonials v.2-->

  </div>
