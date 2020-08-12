@extends('layouts.frontend.master')
@section('baner')
    <div style="background-size:cover; background-image: url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('/images/bg.jpg')) }}); background-position: center center;position:absolute; top:0; left:0; width:100%; height:300px;"></div>
    <div style="height:220px; display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
        <img src="@if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( Auth::user()->avatar ) }}@else{{ Auth::user()->avatar }}@endif"
             class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ Auth::user()->name }} avatar">
        <h4>{{ ucwords(Auth::user()->name) }}</h4>
    </div>
    <div class="col-md-12 mt-2">
        <div class="row text-right">
            <div class="col-md-12 mb-3">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalSubscriptionForm"> <i class="fa fa-plus"></i> Nueva cita</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Inicio</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Citas médica</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Configuración</a>
                </div>
            </div>
            <div class="col-9 mb-5">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card text-white bg-success mb-3 ">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Citas programadas</h4>
                                            </div>
                                            <div class="col-md-4">
                                                <h2 class="text-right">1</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-edit fa-3x"></i>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h4>Ordenes de análisis</h4>
                                            </div>
                                            <div class="col-md-4">
                                                <h2 class="text-right">2</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <i class="fa fa-flask fa-3x"></i>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Card -->
                                <div class="card card-image" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">
                                <!-- Content -->
                                <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                <div>
                                    <h5 class="orange-text"><i class="fas fa-calendar"></i> Nuevo evento</h5>
                                    <h3 class="card-title pt-2"><strong>Conferencia de medicina</strong></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                                    optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                                    Odit sed qui, dolorum!.</p>
                                    <a class="btn btn-orange"><i class="fas fa-clone left"></i> Saber más</a>
                                </div>
                                </div>

                                </div>
                                <!-- Card -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <!-- Editable table -->
                        <div class="card">
                            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Historial de citas</h3>
                            <div class="card-body">
                            <div id="table" class="table-editable">
                                <table class="table table-bordered table-responsive-md table-striped text-center">
                                    <thead>
                                        <tr>
                                        <th class="text-center">Person Name</th>
                                        <th class="text-center">Age</th>
                                        <th class="text-center">Company Name</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Sort</th>
                                        <th class="text-center">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
                                        <td class="pt-3-half" contenteditable="true">30</td>
                                        <td class="pt-3-half" contenteditable="true">Deepends</td>
                                        <td class="pt-3-half" contenteditable="true">Spain</td>
                                        <td class="pt-3-half" contenteditable="true">Madrid</td>
                                        <td class="pt-3-half">
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                                aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                                aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                class="btn btn-info btn-rounded btn-sm my-0">Ver detalles</button>
                                            </span>
                                        </td>
                                        </tr>
                                        <!-- This is our clonable table line -->
                                        <tr>
                                        <td class="pt-3-half" contenteditable="true">Guerra Cortez</td>
                                        <td class="pt-3-half" contenteditable="true">45</td>
                                        <td class="pt-3-half" contenteditable="true">Insectus</td>
                                        <td class="pt-3-half" contenteditable="true">USA</td>
                                        <td class="pt-3-half" contenteditable="true">San Francisco</td>
                                        <td class="pt-3-half">
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                                aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                                aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                class="btn btn-info btn-rounded btn-sm my-0">Ver detalles</button>
                                            </span>
                                        </td>
                                        </tr>
                                        <!-- This is our clonable table line -->
                                        <tr>
                                        <td class="pt-3-half" contenteditable="true">Guadalupe House</td>
                                        <td class="pt-3-half" contenteditable="true">26</td>
                                        <td class="pt-3-half" contenteditable="true">Isotronic</td>
                                        <td class="pt-3-half" contenteditable="true">Germany</td>
                                        <td class="pt-3-half" contenteditable="true">Frankfurt am Main</td>
                                        <td class="pt-3-half">
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                                aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                                aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                class="btn btn-info btn-rounded btn-sm my-0">Ver detalles</button>
                                            </span>
                                        </td>
                                        </tr>
                                        <!-- This is our clonable table line -->
                                        <tr class="hide">
                                        <td class="pt-3-half" contenteditable="true">Elisa Gallagher</td>
                                        <td class="pt-3-half" contenteditable="true">31</td>
                                        <td class="pt-3-half" contenteditable="true">Portica</td>
                                        <td class="pt-3-half" contenteditable="true">United Kingdom</td>
                                        <td class="pt-3-half" contenteditable="true">London</td>
                                        <td class="pt-3-half">
                                            <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up"
                                                aria-hidden="true"></i></a></span>
                                            <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down"
                                                aria-hidden="true"></i></a></span>
                                        </td>
                                        <td>
                                            <span class="table-remove"><button type="button"
                                                class="btn btn-info btn-rounded btn-sm my-0">Ver detalles</button>
                                            </span>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        <!-- Editable table -->
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Section: Contact v.2-->
                                <section class="mb-4">

                                    <!--Section heading-->
                                    <h2 class="h1-responsive font-weight-bold text-center my-4">Edita tu información</h2>
                                    <!--Section description-->
                                    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                                        a matter of hours to help you.</p>

                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-9 mb-md-0 mb-5">
                                            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                                <!--Grid row-->
                                                <div class="row">

                                                    <!--Grid column-->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" id="name" name="name" class="form-control">
                                                            <label for="name" class="">Your name</label>
                                                        </div>
                                                    </div>
                                                    <!--Grid column-->

                                                    <!--Grid column-->
                                                    <div class="col-md-6">
                                                        <div class="md-form mb-0">
                                                            <input type="text" id="email" name="email" class="form-control">
                                                            <label for="email" class="">Your email</label>
                                                        </div>
                                                    </div>
                                                    <!--Grid column-->

                                                </div>
                                                <!--Grid row-->

                                                <!--Grid row-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="md-form mb-0">
                                                            <input type="text" id="subject" name="subject" class="form-control">
                                                            <label for="subject" class="">Subject</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Grid row-->

                                                <!--Grid row-->
                                                <div class="row">

                                                    <!--Grid column-->
                                                    <div class="col-md-12">

                                                        <div class="md-form">
                                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                                            <label for="message">Your message</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--Grid row-->

                                            </form>

                                            <div class="text-center text-md-left">
                                                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                                            </div>
                                            <div class="status"></div>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-3 text-center">
                                            <ul class="list-unstyled mb-0">
                                                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                                    <p>San Francisco, CA 94126, USA</p>
                                                </li>

                                                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                                    <p>+ 01 234 567 89</p>
                                                </li>

                                                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                                    <p>contact@mdbootstrap.com</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <!--Grid column-->

                                    </div>

                                </section>
                                <!--Section: Contact v.2-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>

    {{-- Modals --}}
    <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-plus"></i> Nueva cita</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="form-group" style="max-height: 300px">
                    <label for="">Especialistas</label>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-md table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="text-center">Nombre completo</th>
                                    <th class="text-center">Especialidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Día</label>
                        <select name="day" class="form-control" required>
                            <option value="">Selecciona el día</option>
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miercoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sábado</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Hora</label>
                        <input type="time" name="start" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Motivo de la consulta</label>
                    <textarea name="observations" class="form-control" placeholder="Ingrese los síntomas que presenta"></textarea>
                </div>
            </div>
            <div class="modal-footer d-flex">
                <button class="btn btn-light" data-dismiss="modal">Cancelar<i class="fas fa-remove ml-1"></i></button>
                <button class="btn btn-indigo">Programar cita <i class="fas fa-paper-plane-o ml-1"></i></button>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
 <div class="container">
     hola desde account
 </div>
@endsection