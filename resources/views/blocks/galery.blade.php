  <div id="home" class="container-fluid">

      <!--Grid row-->
      <div class="row my-5">

          <!--Grid column-->
          <div class="col-md-12">

          <!--Tiles blog-->
          <div>
              <!--First row-->
              <div class="row">
              <!--First column-->
              <div class="col-xl-3 col-md-6 px-0">
                  <!--Single blog post-->
                  <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                      <!--Image-->
                      <div class="view overlay">

                        <img src="{{ $data->image1->value !='image1.png' ? Voyager::Image($data->image1->value) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/galery1.jpg' }}" class="img-fluid" alt="">

                      <div class="mask flex-center rgba-blue-strong">
                          <h4 class="white-text font-weight-bold">{{$data->title1->value}}</h4>
                      </div>
                      </div>
                      <!--/Image-->
                  </a>
                  <!--Blog post link-->

                  </div>
                  <!--/Single blog post-->
              </div>
              <!--/First column-->

              <!--Second column-->
              <div class="col-xl-3 col-md-6 px-0">
                  <!--Single blog post-->
                  <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                      <!--Image-->
                      <div class="view overlay">

                        <img src="{{ $data->image2->value !='image1.png' ? Voyager::Image($data->image2->value) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/galery2.jpg' }}" class="img-fluid" alt="">

                      <div class="mask flex-center rgba-blue-strong">
                          <h4 class="white-text font-weight-bold">{{$data->title2->value}}</h4>
                      </div>
                      </div>
                      <!--/Image-->
                  </a>
                  <!--Blog post link-->

                  </div>
                  <!--/Single blog post-->
              </div>
              <!--/Second column-->

              <!--Third column-->
              <div class="col-xl-3 col-md-6 px-0">
                  <!--Single blog post-->
                  <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                      <!--Image-->
                      <div class="view overlay">

                        <img src="{{ $data->image3->value !='image1.png' ? Voyager::Image($data->image3->value) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/galery3.jpg' }}" class="img-fluid" alt="">

                      <div class="mask flex-center rgba-blue-strong">
                          <h4 class="white-text font-weight-bold">{{$data->title3->value}}</h4>
                      </div>
                      </div>
                      <!--/Image-->
                  </a>
                  <!--Blog post link-->

                  </div>
                  <!--/Single blog post-->
              </div>
              <!--/Third column-->

              <!--Fourth column-->
              <div class="col-xl-3 col-md-6 px-0">
                  <!--Single blog post-->
                  <div class="waves-effect waves-light">
                  <!--Blog post link-->
                  <a href="#!">
                      <!--Image-->
                      <div class="view overlay">

                      <img src="{{ $data->image4->value !='image1.png' ? Voyager::Image($data->image4->value) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/galery4.jpg' }}" class="img-fluid" alt="">

                      <div class="mask flex-center rgba-blue-strong">
                          <h4 class="white-text font-weight-bold">{{$data->title4->value}}</h4>
                      </div>
                      </div>
                      <!--/Image-->
                  </a>
                  <!--Blog post link-->
                  </div>
                  <!--/Single blog post-->
              </div>
              <!--/Fourth column-->
              </div>
              <!--/First row-->

          </div>

          </div>
          <!--/Grid column-->

      </div>
      <!--/Grid row-->

  </div>