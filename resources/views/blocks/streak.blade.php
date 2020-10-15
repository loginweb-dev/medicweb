  <!--Streak-->
  <div class="streak streak-photo streak-long-2" style="background-image: url('{{ $data->image1->value != 'image1.png' ? Voyager::Image($data->image1->value) : 'https://mystorage.loginweb.dev/storage/Projects/medicweb/doctor.jpg' }}');">
      <div class="flex-center mask rgba-blue-strong">
          <div class="container text-center white-text">
          <h3 class="text-center text-white text-uppercase font-weight-bold mt-5 mb-5 pt-3 wow fadeIn" data-wow-delay="0.2s">
          {{$data->title1->value}}
          </h3>

          <!--First row-->
          <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">

              <!--First column-->
              <div class="col-md-4 mt-2">
              <h1 class="white-text font-weight-bold">{{ \App\Customer::count() }}</h1>
              <p>{{$data->parrafo1->value}}</p>
              </div>
              <!--/First column-->

              <!--Second column-->
              <div class="col-md-4 mt-2">
              <h1 class="white-text font-weight-bold">{{ \App\Appointment::count() }}</h1>
              <p>{{$data->parrafo2->value}}</p>
              </div>
              <!--/Second column-->

              <!--Third column-->
              <div class="col-md-4 mt-2">
              <h1 class="white-text font-weight-bold">{{ \App\Specialist::count() }}</h1>
              <p>{{$data->parrafo3->value}}</p>
              </div>
              <!--/Third column-->

          </div>
          <!--/First row-->

          </div>
      </div>
  </div>
  <!--/Streak-->