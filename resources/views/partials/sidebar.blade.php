<nav id="sidebar" class="col-sm-4">
        <div class="sidebar-header">
            <h3>Menu</h3>
        </div>

        <ul class="list-unstyled components">
      
            <!-- <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="Corresponsales">Corresponsales</a>
                    </li>
                    <li>
                        <a href="#">Diligencias</a>
                    </li>
                    <li>
                        <a href="#">Juicios</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="/home">Dashboard</a>

            </li>
            <li>
                <a href="/corresponsales">Corresponsales</a>

            </li>
            <li>
                <a href="/cotizaciones">Cotizaciones</a>
            </li>
            <li>
                <a href="/juicios">Juicios</a>
            </li>
            <li>
                <a href="/plantillas">Plantillas</a>
            </li>
            <li>
                <a href="/ocursos">Ocursos</a>
            </li>
            @if(Auth::user()->role == 1)
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Configuraciones  <img src="{{asset('public/img/icons/gear-icon.svg')}}" width="20" heigth="20" alt="Plus">
                </a>

                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/usuarios">Usuarios</a>
                    <a class="dropdown-item" href="/juicios-tipo">Tipos de Juicios</a>
                    <a class="dropdown-item" href="/estados">Estados</a>
                     
                                   
                </div>   
            </li>
 
            @endif
        </ul>
    </div>
