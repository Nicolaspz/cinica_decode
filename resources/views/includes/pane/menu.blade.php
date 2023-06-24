
<h6 class="navbar-heading text-muted">
    @if(auth()->user()->role == "admin")
    Administração
    @else
    Menú
    @endif
</h6>
<ul class="navbar-nav">
    @if(auth()->user()->role == "admin")
 <li class="nav-item  active ">
        <a class="nav-link  active " href="/home">
          <i class="ni ni-tv-2 text-danger"></i> Relatórios
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href=" {{ url('/especialidades') }} ">
          <i class="ni ni-briefcase-24 text-blue"></i> Especialidades
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/doctors">
          <i class="fas fa-stethoscope text-info"></i> Médicos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/pacients">
          <i class="fas fa-bed text-warning"></i>Pacientes
        </a>
      </li>
      @elseif(auth()->user()->role == "doctor")
      <li class="nav-item">
        <a class="nav-link " href="/horario">
          <i class="ni ni-calendar-grid-58 text-primary"></i>Gestão de Horário
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="">
          <i class="fas fa-clock text-info"></i>Minhas Consultas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/pacients">
          <i class="fas fa-bed text-danger"></i>Meus Pacientes
        </a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link " href="/reservas_consult/create">
          <i class="ni ni-calendar-grid-58 text-primary" ></i>Reservar Consultas
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="">
          <i class="fas fa-clock text-info"></i>Minhas Consultas
        </a>
      </li>

      @endif

       </ul>

       @if(auth()->user()->role == "admin")
       <hr class="my-3">

       <h6 class="navbar-heading text-muted">Relatórios</h6>
       <ul class="navbar-nav">
         <li class="nav-item">
               <a class="nav-link " href="#">
                 <i class="ni ni-books text-default"></i> Fichas
               </a>
             </li>
             <li class="nav-item">
               <a class="nav-link " href="#">
                 <i class="ni ni-chart-bar-32 text-warning"></i>Desempenho Médicos
               </a>
             </li>

              </ul>
              @endif
