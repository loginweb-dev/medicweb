  <!--Streak-->
  <div class="streak streak-photo streak-long-2" style="background-image: url('{{ Voyager::Image($data->image1->value) }}');">
      <div class="flex-center mask rgba-blue-strong">
          <div class="container text-center white-text">
          <h3 class="text-center text-white text-uppercase font-weight-bold mt-5 mb-5 pt-3 wow fadeIn" data-wow-delay="0.2s">
          {{$data->title1->value}}
          </h3>

          <!--First row-->
          <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">

              <!--First column-->
              <div class="col-md-3 mt-2">
              <h1 class="white-text font-weight-bold">{{$data->label1->value}}</h1>
              <p>{{$data->parrafo1->value}}</p>
              </div>
              <!--/First column-->

              <!--Second column-->
              <div class="col-md-3 mt-2">
              <h1 class="white-text font-weight-bold">{{$data->label2->value}}</h1>
              <p>{{$data->parrafo2->value}}</p>
              </div>
              <!--/Second column-->

              <!--Third column-->
              <div class="col-md-3 mt-2">
              <h1 class="white-text font-weight-bold">{{$data->label3->value}}</h1>
              <p>{{$data->parrafo3->value}}</p>
              </div>
              <!--/Third column-->

              <!--Fourth column-->
              <div class="col-md-3 mt-2 mb-5 pb-3">
              <h1 class="white-text font-weight-bold">{{$data->label4->value}}</h1>
              <p>{{$data->parrafo4->value}}</p>
              </div>
              <!--/Fourth column-->

          </div>
          <!--/First row-->

          </div>
      </div>
  </div>
  <!--/Streak-->