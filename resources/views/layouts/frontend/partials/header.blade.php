    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
      <div class="container">
        <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!--Links-->
          <ul class="navbar-nav mr-auto smooth-scroll">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about" data-offset="80">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team" data-offset="80">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing" data-offset="20">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features" data-offset="80">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#testimonials" data-offset="80">Testimonials</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modal-info">Info</a>
            </li>
          </ul>

          <!--Social Icons-->
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a class="nav-link"><i class="fab fa-facebook-f white-text"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link"><i class="fab fa-twitter white-text"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link"><i class="fab fa-instagram white-text"></i></a>
            </li>
            <!-- Icon dropdown -->
            <li class="nav-item mr-3 mr-lg-0 dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-user"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="{{route('account')}}">Mi Cuenta</a></li>
                <li><a class="dropdown-item" href="#">Administracion</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Serrar Session</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--/Navbar-->

    <!--Modal Info-->
    <div class="modal fade modal-ext" id="modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 py-3" id="myModalLabel">Information about clinic</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body text-center">

            <!--Title-->
            <h5 class="title mb-3 font-weight-bold">Opening hours:</h5>

            <!--Opening hours table-->
            <table class="table">
              <tbody>
                <tr>
                  <td>Monday - Friday:</td>
                  <td>8 AM - 9 PM</td>
                </tr>
                <tr>
                  <td>Saturday:</td>
                  <td>9 AM - 6 PM</td>
                </tr>
                <tr>
                  <td>Sunday:</td>
                  <td>11 AM - 6 PM</td>
                </tr>
              </tbody>
            </table>

            <!--Title-->
            <h5 class="title mb-4 font-weight-bold">Addresses:</h5>

            <!--First row-->
            <div class="row">

              <!--First column-->
              <div class="col-md-6">

                <p>125 Street<br> New York, NY 10012</p>

              </div>
              <!--/First column-->

              <!--Second column-->
              <div class="col-md-5">

                <p>Allen Street 5<br> New York, NY 10012</p>

              </div>
              <!--/Second column-->

            </div>
            <!--/First row-->

          </div>
          <!--Footer-->
          <div class="modal-footer">
            <button type="button" class="btn btn-rounded btn-info waves-effect" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!--/Content-->
      </div>
    </div>
    <!--/Modal Info-->