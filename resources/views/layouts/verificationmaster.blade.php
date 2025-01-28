
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

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="light sidebar-mini sidebar-collapse">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <!-- <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
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

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div> -->
        </div>
    </div>
</div>
<div id="app">
<main class="parallel">
    <div class="row">
        <div class="col-md-5 white">
            <div class="row center">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="col-md-7 height-full text-uppercase " style="background-color: #42a5f5; color: white; align-content: center;"> <br><br><br><br><br>
            <p align="center" class="s-64 bolder p-t-100">
            <img src="{{asset('img/dunamis.png')}}" style="width: 170px; height: 130px"> <br><br>
            @if($pageName == 'User Verification')
                Account Verification
            @elseif($pageName == 'Update Password')
             Authentication
            @endif
            </p>
            <br><br>
            <p class="s-18" align="center">Please verify the code sent to your email address to activate this account. This process is to prevent fraudulent activities of maliscious good freinds from access this account without your authorization. Thanks</p>
        <!-- data-bg-repeat="false" data-bg-possition="center" style="background: url('../../../img/dummy/cs3.gif') #1b5e20" >  -->
        </div>
    </div>
</main>
</div>
<script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript">
        function goBack() {
                window.history.back();
            }
    </script>
</body>

</html>

