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
                    $specialists = \App\Specialist::with(['specialities'])->inRandomOrder()->get();
                    $style = 'active';
                @endphp

              @foreach ($specialists as $item)
              <!--First slide-->
              <div class="carousel-item {{ $style }}">

                  <div class="testimonial text-center">
                  <!--Avatar-->
                  <div class="avatar mx-auto mb-4">
                      <img src="{{ $item->user->avatar != 'users/default.png' ? asset('storage/'.str_replace('.', '-cropped.', $item->user->avatar)) : url('images/doctor.png') }}" class="rounded-circle img-fluid">
                  </div>
                  <!--Content-->
                  @if ($item->description)
                    <h5>
                        {{-- <i class="fas fa-quote-left"></i> --}}
                        {{ $item->description }}
                        {{-- <i class="fas fa-quote-right"></i> --}}
                    </h5>
                  @endif
                  </p>
                  <br>
                  <h4>{{ $item->prefix }} {{ $item->name }} {{ $item->last_name }}</h4>
                    @foreach ($item->specialities as $especialidad)
                        {{-- <label class="badge badge-{{ $especialidad->color }}">{{ $especialidad->name }}</label> --}}
                        <h5><span class="badge badge-{{ $especialidad->color }}">{{ $especialidad->name }}</span></h5><br>
                    @endforeach
                  <!--Review-->
                  {{-- <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i>
                  <i class="fas fa-star"> </i> --}}
                  </div>

              </div>
              <!--/First slide-->
              @php
                  $style = '';
              @endphp
              @endforeach
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
