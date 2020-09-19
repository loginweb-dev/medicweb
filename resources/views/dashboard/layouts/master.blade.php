<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  @yield('header')

  <!-- Custom fonts for this template-->
  <link href="{{ url("dashboard/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('dashboard.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('dashboard.layouts.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseas cerrar sesión?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Presiona el botón salir para cerrar sesión.</div>
        <div class="modal-footer">
          <form action="{{ route('logout') }}"method="post">
            @csrf
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salir</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- Tono de llamada --}}
  <audio loop id="tone-call-incoming" src="{{ url('audio/tone.mp3') }}" preload="auto"></audio>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('dashboard/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('dashboard/js/sb-admin-2.min.js') }}"></script>

  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  {{-- Ratings --}}
  <link rel="stylesheet" type="text/css" href="{{ url('js/plugins/star-rating-svg/star-rating-svg.css') }}">
  <script src="{{ url('js/plugins/star-rating-svg/jquery.star-rating-svg.js') }}"></script>

  {{-- Select2 themes --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" />

  {{-- Laravel echo --}}
  @php
    $user_id = Auth::user() ? Auth::user()->id : '';
  @endphp

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    $(document).ready(function(){

      // Toggle sidebar
      if(sessionStorage.getItem('sidebarToggle') != ''){
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $('.sidebar .collapse').collapse('hide');
        };
      }

      // Guardar sidebarToggle en sesión
      $('.btn-sidebarToggle').click(function(){
        setTimeout(() => {
          let val = $('#page-top').attr('class');
          sessionStorage.setItem('sidebarToggle', val)
        }, 500);
      });

      // Presionar desvío de llamada
      $('.btn-divert-call').click(function(){
        $('.btn-actions').css('display', 'none');
        $('#form-divert-call').css('display', 'block');
      });

      // Desviar llamada
      $('#form-divert-call').submit(function(e){
        e.preventDefault();
        $.post($(this).attr('action'), $(this).serialize(), function(res){
          if(res){
            $('#form-divert-call').trigger('reset');
            $('.dark-mask').css('display', 'none');
            $('.btn-actions').css('display', 'block');
            $('#form-divert-call').css('display', 'none');
            document.getElementById('tone-call-incoming').pause();
          }else{
            console.log('error')
          }
        });
      });

      // Pedir autorización para mostrar notificaciones
      Notification.requestPermission();
    });

    // ***WebSockets***
    // Escuchando los pedidos nuevo
    Echo.channel('IncomingCallChannel-{{ $user_id }}')
    .listen('IncomingCallEvent', (res) => {
        Swal.close();
        $('.dark-mask').css('display', 'flex');
        $('#btn-answer-call').attr('href', "{{ url('meet') }}/"+res.meet.id);
        $('#name-call').text(`${res.meet.specialist.prefix} ${res.meet.specialist.name} ${res.meet.specialist.last_name}`);
        document.getElementById('tone-call-incoming').play();
        $('#div-call img').attr('src', "{{ url('storage') }}/"+res.meet.specialist.user.avatar);
        $('#form-divert-call input[name="id"]').val(res.meet.id);
    });
  </script>

  @yield('script')

  @yield('css')

  <style>
    .dark-mask{
      position: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: rgba(0, 0, 0, 0.8);
      top: 0px;
      left: 0px;
      width: 100%;
      height: 100vh;
      z-index: 10000;
      display: none;
    }
    .img-call{
      width: 150px;
      border-radius: 75px;
      margin-bottom: 10px
    }
  </style>
  <div class="dark-mask text-center">
    <div id="div-call">
      <img src="{{ asset('storage/users/default.png') }}" class="img-call" alt="avatar">
      <h6 class="text-white">Llamada entrante</h6>
      <h3 class="text-white" id="name-call"></h3>
      <div class="mt-3 btn-actions">
        <button type="button" class="btn btn-danger btn-circle btn-lg mx-3 btn-divert-call"><span class="fa fa-times"></span></button>
        <a id="btn-answer-call" class="btn btn-success text-white btn-circle btn-lg mx-3"><span class="fa fa-phone "></span></a>
      </div>
      <br>
      <form id="form-divert-call" action="{{ url('meet/divert_call') }}" style="display: none">
        @csrf
        <input type="hidden" name="id">
        <textarea name="message" class="form-control form-control-user" style="width:300px" rows="3" placeholder="Ingrese el motivo..."></textarea> <br>
        <button type="submit" class="btn btn-danger mx-3"><span class="fa fa-times"></span> Colgar llamada</button>
      </form>
    </div>
  </div>
</body>

</html>
