  <div class="container">

      <!--Section: About-->
      <section id="about" class="info-section mb-5 mt-5 pt-4">

          <!--First row-->
          <div class="row pt-5">

          <!--First column-->
          <div class="col-md-7 mb-2 smooth-scroll wow fadeIn" data-wow-delay="0.2s">

              <!--Heading-->
              <h2 class="mb-3 font-weight-bold">{{$data->title1->value}}</h2>
              <!--Description-->
              <h4 class="mb-5 dark-grey-text">{{$data->parrafo1->value}}</h4>
              <!--Content-->
              <p class="grey-text" align="justify">
              {!! $data->description_data1->value !!}
              </p>
              <br>
              <!--Button-->
              <a target="_blank" href="{{ $data->btn_action1->value }}" class="btn btn-rounded btn-blue mb-4">  {{$data->btn1->value}}</a>

          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-lg-4 flex-center ml-lg-auto col-md-5 mb-5 wow fadeIn" data-wow-delay="0.3s">

              <!--Image-->
          <img src="{{ $data->image1->value != 'image1.png' ? Voyager::Image($data->image1->value) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/services.jpg' }}" class="img-fluid z-depth-1">

          </div>
          <!--/Second column-->

          </div>
          <!--/First row-->

      </section>
      <!--Section: About-->

  </div>