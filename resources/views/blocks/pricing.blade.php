  <div class="container-fluid grey lighten-3">
      <div class="container">

          <!--Section: Pricing v.1-->
          <section id="pricing" class="pb-5 pt-3">

          <!--Section heading--> 
          <h1 class="text-center mb-5 h1 pt-5 mt-5">{{ $item->title }}</h1>

          <!--Section description-->
          <p class="text-center w-responsive mx-auto my-5 grey-text">{{ $item->description }}.</p>

          <!--Grid row-->
          <div class="row">

              <!--Grid column-->
              <div class="col-lg-4 col-md-12 mb-4">

              <!--Pricing card-->
              <div class="card pricing-card">
                  <!-- Price -->
                  <div class="price header white-text blue lighten-3 rounded-top">
                  <h2 class="number">{{$data->value1->value}}</h2>
                  <div class="version">
                      <h5 class="mb-0">{{$data->title1->value}}</h5>
                  </div>
                  </div>

                  <!--Features-->
                  <div class="card-body striped darker-striped">
                  <ul>
                      <li>
                      <p class="mt-1"><i class="{{ $data->checkbox1->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica1->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox2->value ? 'fas fa-check' : 'fas fa-times' }}"></i> {{$data->caracteristica2->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox3->value ? 'fas fa-check' : 'fas fa-times' }}"></i> {{$data->caracteristica3->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox4->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica4->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox5->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica5->value}}</p>
                      </li>
                  </ul>

                  <button class="btn btn-blue btn-rounded mb-3">Comprar</button>
                  </div>
                  <!--Features-->

              </div>
              <!--Pricing card-->

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">

              <!--Pricing card-->
              <div class="card pricing-card">
                  <!-- Price -->
                  <div class="price header white-text blue lighten-3 rounded-top">
                  <h2 class="number">{{$data->value_b->value}}</h2>
                  <div class="version">
                      <h5 class="mb-0">{{$data->title_b->value}}</h5>
                  </div>
                  </div>

                  <!--Features-->
                  <div class="card-body striped darker-striped">
                  <ul>
                      <li>
                      <p class="mt-1"><i class="{{ $data->checkbox_b1->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica_b1->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_b2->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica_b2->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_b3->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica_b3->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_b4->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica_b4->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_b5->value ? 'fas fa-check' : 'fas fa-times' }}"></i>{{$data->caracteristica_b5->value}}</p>
                      </li>
                  </ul>

                  <button class="btn btn-blue btn-rounded mb-3">Comprar</button>
                  </div>
                  <!--Features-->

              </div>
              <!--Pricing card-->

              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4">
              <!--Pricing card-->
              <div class="card pricing-card">
                  <!-- Price -->
                  <div class="price header white-text blue lighten-3 rounded-top">
                  <h2 class="number">{{$data->value_c->value}}</h2>
                  <div class="version">
                      <h5 class="mb-0">{{$data->title_c->value}}</h5>
                  </div>
                  </div>

                  <!--Features-->
                  <div class="card-body striped darker-striped">
                  <ul>
                      <li>
                      <p class="mt-1"><i class="{{ $data->checkbox_c1->value ? 'fas fa-check' : 'fas fa-times' }}"></i>  {{$data->caracteristica_c1->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_c2->value ? 'fas fa-check' : 'fas fa-times' }}"></i>  {{$data->caracteristica_c2->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_c3->value ? 'fas fa-check' : 'fas fa-times' }}"></i>  {{$data->caracteristica_c3->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_c4->value ? 'fas fa-check' : 'fas fa-times' }}"></i>  {{$data->caracteristica_c4->value}}</p>
                      </li>
                      <li>
                      <p><i class="{{ $data->checkbox_c5->value ? 'fas fa-check' : 'fas fa-times' }}"></i>  {{$data->caracteristica_c5->value}}</p>
                      </li>
                  </ul>

                  <button class="btn btn-blue btn-rounded mb-3">Comprar</button>
                  </div>
                  <!--Features-->

              </div>
              <!--Pricing card-->
              </div>
              <!--Grid column-->

          </div>
          <!--Grid row-->

          </section>
          <!--Section: Pricing v.1-->

      </div>
  </div>