    <!--Footer-->
    <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

        <div class="top-footer-color">
            <div class="container">
                <!--Grid row-->
                <div class="row py-4 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-md-0">
                    <h6 class="mb-0 white-text">¡Conéctate con nosotros en las redes sociales</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!--Facebook-->
                    {{-- <a class="p-2 m-2 fa-lg fb-ic ml-0"><i class="fab fa-facebook-f white-text mr-lg-4"> </i></a> --}}
                    <!--Twitter-->
                    {{-- <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text mr-lg-4"> </i></a> --}}
                    <!--Google +-->
                    {{-- <a class="p-2 m-2 fa-lg gplus-ic"><i class="fab fa-google-plus-g white-text mr-lg-4"> </i></a> --}}
                    <!--Linkedin-->
                    {{-- <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text mr-lg-4"> </i></a> --}}
                    <!--Instagram-->
                    {{-- <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text mr-lg-4"> </i></a> --}}
                    {{ menu('social', 'menus.social') }}
                </div>
                <!--Grid column-->

                </div>
                <!--Grid row-->
            </div>
        </div>

        <!--Footer Links-->
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                <h6 class="text-uppercase font-weight-bold"><strong>{{ setting('site.title') }}</strong></h6>
                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>{{ setting('site.description') }}</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold"><strong>Servicios</strong></h6>
                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><a href="#!">Medicina General</a></p>
                <p><a href="#!">Odontologia</a></p>
                <p><a href="#!">Cardiologia</a></p>
                <p><a href="#!"></a></p>
                </div>
                <!--/.Second column-->

                <!--Third column-->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold"><strong>links</strong></h6>
                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                {{-- {{ menu('LandingPage', 'menus.LandingPage') }} --}}
                {{-- <p><a href="{{ url('docs') }}">Documentación</a></p> --}}
                <p><a href="{{ url('page/policies') }}">Políticas de privacidad</a></p>
                <p><a href="{{ url('page/terms') }}">Terminos y condiciones</a></p>
                </div>
                <!--/.Third column-->

                <!--Fourth column-->
                <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="text-uppercase font-weight-bold"><strong>Contacto</strong></h6>
                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p><i class="fas fa-home mr-3"></i> {{ setting('site.ciudad') }}</p>
                <p><i class="fas fa-envelope mr-3"></i>{{ setting('site.direccion') }}</p>
                <p><i class="fas fa-phone mr-3"></i> {{ setting('site.telefonos') }}</p>
               
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright-->
        <div class="footer-copyright py-3 text-center wow fadeIn" data-wow-delay="0.3s">
            <div class="container-fluid">
                © 2020 Copyright: <a href="" target="_blank"> Live Medic Edgley </a>
            </div>
        </div>
        <!--/.Copyright -->

    </footer>
    <!--/.Footer-->