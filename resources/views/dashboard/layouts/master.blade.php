<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

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


  {{-- Laravel echo --}}
  @php
    $user_id = Auth::user() ? Auth::user()->id : '';
  @endphp

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    // Pedir autorización para mostrar notificaciones
    Notification.requestPermission();

    $('#btn-answer-call').click(function(e){
      $('.dark-mask').css('display', 'none');
      $('#btn-answer-call').removeAttr('href');
    });

    // ***WebSockets***
    // Escuchando los pedidos nuevo
    Echo.channel('IncomingCallChannel-{{ $user_id }}')
    .listen('IncomingCallEvent', (res) => {
        $('.dark-mask').css('display', 'flex');
        $('#btn-answer-call').attr('href', "{{ url('meet') }}/"+res.meet.id);
        $('#name-call').text(`${res.meet.especialista.prefix} ${res.meet.especialista.name} ${res.meet.especialista.last_name}`);
        document.getElementById('tone-call-incoming').play();
        $('#div-call img').attr('src', "{{ url('storage') }}/"+res.meet.especialista.user.avatar);
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
      <div class="mt-3">
        <a class="btn btn-danger btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft" style="margin-right: 50px" data-wow-delay="0.3s"><span class="fa fa-times fa-2x"></span></a>
        <a id="btn-answer-call" class="btn btn-success btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft" style="margin-left: 50px" data-wow-delay="0.3s"><span class="fa fa-phone fa-2x"></span></a>
      </div>
    </div>
  </div>
</body>

</html>
