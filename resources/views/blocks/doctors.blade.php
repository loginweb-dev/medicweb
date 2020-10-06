  <div class="container">

      <!--Projects section v.3-->
      <section id="team" class="mt-4 mb-2">

          <!--Section heading-->
          <h1 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">{{$data->title->value}}</h1>
          <!--Section description-->
          <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">{!! $data->description_data->value !!}</p>

          <!--First row-->
          <div class="row wow fadeIn" data-wow-delay="0.4s">

          <!--First column-->
          <div class="col-md-12">

              <div class="mb-2">

              <!-- Nav tabs -->
              <ul class="nav md-pills pills-primary flex-center" role="tablist">
                  <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#panel31" role="tab"><i class="far fa-eye fa-2x"></i><br>
                  {{$data->name_short1->value}}</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel32" role="tab"><i class="fas fa-heartbeat fa-2x"></i><br>
                  {{$data->name_short2->value}}</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#panel33" role="tab"><i class="fas fa-search fa-2x"></i><br>
                  {{$data->name_short3->value}}</a>
                  </li>
              </ul>

              </div>

              <!--Tab panels-->
              <div class="tab-content">

              <!--Panel 1-->
              <div class="tab-pane fade show in active" id="panel31" role="tabpanel">
                  <br>

                  <!--First row-->
                  <div class="row d-flex justify-content-center">

                  <!--First column-->
                  <div class="col-lg-3 col-md-6 pb-5">

                      <!--Featured image-->
                      <div class="view overlay z-depth-1 z-depth-2">
                      <img src="{{ $data->image1->value != 'image1.png' ? Voyager::Image($data->image1->value) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/jhon.jpg' }}" class="img-fluid">
                      </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                      <!--Title-->
                      <h4 class="mb-3">{{$data->name_lang1->value}}</h4>

                      <!--Description-->
                      <p class="grey-text" align="justify">{!! $data->description1->value !!}</p>

                  </div>
                  <!--/Second column-->
                  </div>
                  <!--/First row-->

              </div>
              <!--/.Panel 1-->

              <!--Panel 2-->
              <div class="tab-pane fade" id="panel32" role="tabpanel">
                  <br>

                  <!--First row-->
                  <div class="row d-flex justify-content-center">

                  <!--First column-->
                  <div class="col-lg-3 col-md-6 pb-5">

                      <!--Featured image-->
                      <div class="view overlay z-depth-1 z-depth-2">
                      <img src="{{ $data->image2->value != 'image2.png' ? Voyager::Image($data->image2->value) : 'https://mystorage.loginweb.dev/storage/Projects/medicweb/anna.jpg' }}" class="img-fluid">
                      </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                      <!--Title-->
                      <h4 class="mb-3">{{$data->name_lang2->value}}</h4>

                      <!--Description-->
                      <p class="grey-text" align="justify">{!! $data->description2->value !!}.</p>

                  </div>
                  <!--/Second column-->
                  </div>
                  <!--/First row-->

              </div>
              <!--/.Panel 2-->

              <!--Panel 3-->
              <div class="tab-pane fade" id="panel33" role="tabpanel">
                  <br>

                  <!--First row-->
                  <div class="row d-flex justify-content-center">

                  <!--First column-->
                  <div class="col-lg-3 col-md-6 pb-5">

                      <!--Featured image-->
                      <div class="view overlay z-depth-1 z-depth-2">
                      <img src="{{ $data->image3->value != 'image3.png' ? Voyager::Image($data->image3->value) : 'https://mystorage.loginweb.dev/storage/Projects/medicweb/maria.jpg' }}" class="img-fluid">
                      </div>
                  </div>
                  <!--/First column-->

                  <!--Second column-->
                  <div class="col-lg-6 col-md-12 text-left">

                      <!--Title-->
                      <h4 class="mb-3">{{$data->name_lang3->value}}</h4>

                      <!--Description-->
                      <p class="grey-text" align="justify">{!! $data->description3->value !!}.</p>

                  </div>
                  <!--/Second column-->
                  </div>
                  <!--/First row-->

              </div>
              <!--/.Panel 3-->

              </div>
              <!--/Tab panels-->

          </div>
          <!--/First column-->

          </div>
          <!--/First row-->

      </section>
      <!--/Projects section v.3-->

  </div>