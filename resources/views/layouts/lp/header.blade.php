    <!--Navigation & Intro-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>{{ setting('site.title') }}</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!--Links-->
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        {{ menu('LandingPage', 'menus.LandingPage') }}
                    </ul>
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    Ingresar
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        Registrarme
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home">
                                        Perfil
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!--/Navbar-->

        <!--Intro Section-->
        <section id="home" class="view"
      
            style="background-image: url('{{  $collection['image1']['value'] != 'myimage.png' ?  voyager::Image($collection['image1']['value']) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/38.png' }}'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="android">
                <img class="tamaño"  src="{{ $collection['icono']['value'] != 'myimage1.png' ? voyager::Image($collection['icono']['value']) :'https://mystorage.loginweb.dev/storage/Projects/medicweb/icono.png' }}" alt="Responsive image">
            </div>
           
            <div class="mask">
                <div class="container h-100 d-flex justify-content-center align-items-center">
                    <div class="row pt-5 mt-3">
                        <div class="col-12 col-md-6 text-center text-md-left">
                            <div class="white-text">
                                <h1 class="h1-responsive font-weight-bold mt-md-5 mt-0 wow fadeInLeft"
                                    data-wow-delay="0.3s">{{ $collection['title']['value'] }}</h1>
                                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                                <p class="wow fadeInLeft mb-3" data-wow-delay="0.3s">
                                    {!! $collection['description_data']['value'] !!}
                                </p>
                                <br>
                                <a href="{{ $collection['button_link1']['value'] }}" target="_blank" class="btn btn-unique btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft"
                                    data-wow-delay="0.3s">{{ $collection['button_text1']['value'] }}</a>
                                <a href="{{ $collection['button_link2']['value'] }}" target="_blank" class="btn btn-outline-white btn-rounded font-weight-bold wow fadeInLeft"
                                    data-wow-delay="0.3s">{{ $collection['button_text2']['value'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        <button type="button" class="btn btn-rounded btn-info waves-effect"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!--/Content-->
            </div>
        </div>
        <!--/Modal Info-->

    </header>
    <!--/Navigation & Intro-->
