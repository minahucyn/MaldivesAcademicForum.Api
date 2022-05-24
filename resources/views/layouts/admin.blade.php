<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - Maldives Academic Forum</title>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">


  <!-- <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/fav/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/fav/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/fav/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/fav/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/fav/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/fav/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/fav/apple-icon-144x144.png')}}">
    <link rel="apple-`-icon" sizes="152x152" href="{{asset('img/fav/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/fav/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('img/fav/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/fav/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/fav/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('img/fav/manifest.json')}}"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield('meta')
  <meta name="msapplication-TileColor" content="#ffffff">
  <!-- <meta name="msapplication-TileImage" content="img/fav/ms-icon-144x144.png"> -->
  <meta name="theme-color" content="#ffffff">
</head>

<body>
  <!-- <header>
     <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" aria-label="navbar">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('images/logos/dummylogo.jpg') }}" alt="" height="50" width="120">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appnavbar" aria-controls="appnavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="appnavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/" id="home">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/education-levels" id="education-levels">Education Levels</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> 
   
  </header>-->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/admin/dashboard">
        <img src="{{ asset('images/logos/dummylogo.jpg') }}" alt="" height="50" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0" id="nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard" id="dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/education-levels" id="education-levels">Education Levels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/speakers" id="speakers">Speakers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/sponsors" id="sponsors">Sponsors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/faqs" id="faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/conferences" id="conferences">Conferences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/attendees" id="attendees">Attendees</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/registrations" id="registrations">Registrations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/topics" id="topics">Topics</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/admin/users" id="users">Users</a>
          </li>
        </ul>
        <ul class="navbar-nav me-auto d-flex">
          @if( auth()->check() )
          <li class="nav-item">
            <a class="nav-link" href="/" id="users"><strong>Go to website</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout"><strong>Logout</strong></a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    @yield('content')
  </main>





  <footer class="footer mt-auto py-3 bg-dark text-secondary">
    <div class="container">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      </ul>
      <p class="text-center text-white">All Rights Reserved © {{ now()->year }} Maldives Academic Forum</p>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  @yield('scripts')

  <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
      case 'info':
        toastr.info("{{ Session::get('message') }}", 'Info', {
          closeButton: true
        });
        break;

      case 'warning':
        toastr.warning("{{ Session::get('message') }}", 'Warning', {
          closeButton: true
        });
        break;

      case 'success':
        toastr.success("{{ Session::get('message') }}", 'Success', {
          closeButton: true
        });
        break;

      case 'error':
        toastr.error("{{ Session::get('message') }}", 'Error', {
          closeButton: true
        });
        break;
    }
    @endif
  </script>

</body>

</html>