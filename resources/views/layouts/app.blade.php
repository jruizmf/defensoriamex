<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
      <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    
    <script src="{{ asset('public/js/app.js') }}" defer></script>    
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Nunito);
        @charset "UTF-8";

        .wrapper {
          display: flex;
          align-items: stretch;
        }
        
        #sidebar {
          min-width: 240px;
          max-width: 240px;
        }
        
        #sidebar.active {
          margin-left: -250px;
        }
        @media (max-width: 768px) {
          #sidebar {
              margin-left: -250px;
          }
          #sidebar.active {
              margin-left: 0;
          }
        }
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
  font-family: 'Poppins', sans-serif;
  background: #fafafa;
}

p {
  font-family: 'Poppins', sans-serif;
  font-size: 1.1em;
  font-weight: 300;
  line-height: 1.7em;
  color: #999;
}

a, a:hover, a:focus {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

#sidebar {
  /* don't forget to add all the previously mentioned styles here too */
  background: #FFF;
  color: #277252;
  transition: all 0.3s;
  padding: 2rem;
  border-right: 0.5px solid #F1F1F1;
}
/*
#205C42
#5EE3A9
*/
#sidebar .sidebar-header {
  padding: 20px;
  background: #FFF;
}

#sidebar ul.components {
  padding: 20px 0;
}

#sidebar ul p {
  color: #000;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px;
  font-size: 1.1em;
  display: block;
 
}
#sidebar ul li a:hover {
  color: #36B37D;
  background: #FFF;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
  color: #36B37D;
  background: #F1F1F1;
}
ul ul a {
  font-size: 0.9em !important;
  padding-left: 30px !important;
  background: #6d7fcc;
}
h2.section-title {
  color: #36B37D !important;
  padding: 1rem 0rem;
}
a.nav-link{
  background: transparent;
  /* border-top-left-radius: 50%; */
  border: 3px solid #36B37D;
  color: #36B37D !important;
  border-radius: 25px;
  padding: 6px 19px;
}
a#navbarDropdown {
  background: transparent;
  /* border-top-left-radius: 50%; */
  border: 3px solid #36B37D;
  color: #36B37D;;
  border-radius: 25px;
  padding: 6px 19px;
  /* border-bottom-left-radius: 50%; */
  /* border-top-right-radius: 40%; */
  /* border-bottom-right-radius: 40%; */
  /* border-radius: 30px 0 0 30px !important;
  -moz-border-radius: 30px 0 0 30px;
  -webkit-border-radius: 30px 0 0 30px; */
}
.plus-button{
  color: #fff;
  background-color: transparent;
  border-color: #36B37D;
  border-radius: 50%;
  border: 3px solid #36B37D;
}

a#navbarDropdown.dropdown-toggle {
 
 
  background: transparent;
  /* border-top-left-radius: 50%; */
  border: 0px solid #36B37D !important;
  color: #36B37D;
  border-radius: 25px;
  padding: 6vh 1vh;
  /* border-bottom-left-radius: 50%; */
  /* border-top-right-radius: 40%; */
  /* border-bottom-right-radius: 40%; */
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('public/img/logo.jpeg')}}" width="60" heigth="60" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesiòn') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item" style="display:none">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>
