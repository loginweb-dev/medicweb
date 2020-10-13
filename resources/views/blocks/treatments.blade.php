  <div class="container">
    <!--Section: Features v.1-->
    <section id="features" class="mt-4 mb-5 pb-5">

        <!--Section heading-->
        <h1 class="text-center mb-5 mt-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">{{$data->title->value}}</h1>
        <!--Section sescription-->
        <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
        {!! $data->description_data->value !!}</p>

        <!--First row-->
        <div class="row features-big my-4 text-center">
        <!--First column-->
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
                <i class="fas fa-heart blue-text mt-3 fa-3x my-4"></i>
                <h5 class="font-weight-bold mb-4">{{$data->title1->value}}</h5>
                <div class="col-md-12">
                    <p class=" grey-text font-small">{!! $data->description_data1->value !!}</p>
                </div>
            </div>
        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
                <i class="fas fa-eye blue-text mt-3 fa-3x my-4"></i>
                <h5 class="font-weight-bold mb-4">{{$data->title2->value}}</h5>
                <div class="col-md-12">
                    <p class=" grey-text font-small">{!! $data->description_data2->value !!}</p>
                </div>
            </div>
        </div>
        <!--/Second column-->

        <!--Third column-->
        <div class="col-md-4 mb-1 wow fadeIn" data-wow-delay="0.4s">
            <div class="card hoverable">
                <i class="fas fa-briefcase-medical blue-text mt-3 fa-3x my-4"></i>
                <h5 class="font-weight-bold mb-4">{{$data->title3->value}}</h5>
                <div class="col-md-12">
                    <p class=" grey-text font-small mx-3">{!! $data->description_data3->value !!}</p>
                </div>
            </div>
        </div>
        <!--/Third column-->
        </div>
        <!--/First row-->

    </section>
    <!--/Section: Features v.1-->
  </div>