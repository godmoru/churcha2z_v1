
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
    <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : "Access Denied"}}</title>
    <!-- CSS -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body class="light sidebar-mini sidebar-collapse">
<!-- Pre loader -->
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

            <div class="spinner-layer spinner-green">
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
<main class="parallel">
    <div class="row grid">
        <!-- <div class="col-md-4 white">
            <div class="p-5">
                <div class="p-5">
                    <div class="text-center p-t-100"><br><br><br><br>
                        <img src="{{asset('img/dunamis.png')}}" style="width: 170px; height: 120px">
                    </div>
                    <p class="s-18 text-uppercase">Why you are seeing this</p>
                    <ul style="list-style-type:square">
                        <li>This URL is blocked from the list of URLs you can access on this platform, kindly consult with the System Administrator</li>
                        <li>The link is broken or not properly entered</li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="col-md-12 height-full text-uppercase " style="background-color: #42a5f5; color: white; align-content: center;"> <br><br><br>
            <div class="text-center p-t-100">
                        <img src="{{asset('img/dunamis.png')}}" style="width: 170px; height: 150px">
                    </div><p align="center" class="s-128 bolder p-t-100" style="color: #e2636d;" >Access Denied!</p>
            <br><br>
            <p class="s-18" align="center">The privileges to accessing this resource has been revoked and no further action is required. Thank you</p>
            <p>
                
            </p>

            <div class="p-t-b-20" align="center">
                <button class="btn  btn-outline-default btn-lg" onclick="goBack();">
                    <i class="icon icon-arrow_back"></i> Go Back
                </button>
            </div>
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

