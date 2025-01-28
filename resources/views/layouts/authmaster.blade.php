
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Electronic Membership Information Management System">
        <meta name="author" content="Umoru Godfrey, E.">
        <meta name="phone" content="2348165420728">
        <meta name="email" content="godfrey@gesusoft.com.ng">
        <link rel="icon" href="{{asset('img/dunamis.png')}}" type="image/x-icon">
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : ""}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="light sidebar-mini sidebar-collapse">
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
    <div class="page parallel">
        <div class="d-flex row">
            @yield('content')
            <div class="col-md-8  height-full accent-3 align-self-center text-center d-none d-md-block" data-bg-repeat="false" data-bg-possition="center" style="background:#f4f4f4 url('img/a2zlogo.jpg') 0 0 no-repeat;background-size:cover;"></div>
        </div>
    </div>
    <div class="control-sidebar-bg shadow white fixed"></div>
    </div>
    <!--/#app -->
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </body>
</html>

