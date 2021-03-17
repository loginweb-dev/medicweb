<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('storage/'.setting('site.logo')) }}" alt="{{ setting('site.title') }}" width="30px">
      </div>
      <div class="sidebar-brand-text mx-3">{{ setting('site.title') }} <sup>{{ env('APP_VERSION', 'v1.0') }}</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Información
    </div>

    {{-- <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Perfil</span></a>
    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Historial</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
          <a class="collapse-item link-appointments" onclick="loadPage('appointments')" href="#">Consultas médicas</a>
          <a class="collapse-item link-prescriptions" onclick="loadPage('prescriptions')" href="#">Prescripciones</a>
          <a class="collapse-item link-order_analysis" onclick="loadPage('order_analysis')" href="#">Ordenes de laboratorio</a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0 btn-sidebarToggle" id="sidebarToggle"></button>
    </div>

  </ul>