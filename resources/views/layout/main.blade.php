<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }} | PBR Poltekkes Kemenkes Tanjungpinang</title>
        <link rel="icon" href="{{ asset('images/logo-poltekkes.png') }}" />
        <link href="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css') }}">
        <script src="{{ url('https://use.fontawesome.com/releases/v6.3.0/js/all.js') }}" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        {{-- Navbar --}}
        @include('partials.navbar');
        <div id="layoutSidenav">
            {{-- Sidenav --}}
            @include('partials.sidenav');
            <div id="layoutSidenav_content">
                @yield('container')
                
                {{-- Footer --}}
                @include('partials.footer');
            </div>
        </div>

        {{-- Toaster JS Notification --}}
        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
    
                        toastr.options.timeOut = 10000;
                        toastr.info("{{ Session::get('message') }}");
                        var audio = new Audio('audio.mp3');
                        audio.play();
                        break;
                    case 'success':
    
                        toastr.options.timeOut = 10000;
                        toastr.success("{{ Session::get('message') }}");
                        var audio = new Audio('audio.mp3');
                        audio.play();
    
                        break;
                    case 'warning':
    
                        toastr.options.timeOut = 10000;
                        toastr.warning("{{ Session::get('message') }}");
                        var audio = new Audio('audio.mp3');
                        audio.play();
    
                        break;
                    case 'error':
    
                        toastr.options.timeOut = 10000;
                        toastr.error("{{ Session::get('message') }}");
                        var audio = new Audio('audio.mp3');
                        audio.play();
    
                        break;
                }
            @endif
        </script>

        {{--  Script --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="{{ url('https://kit.fontawesome.com/e632a4a2d6.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>
    </body>
</html>
