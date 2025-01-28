<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="Electronic Membership Information Management System">
    <meta name="author" content="Umoru Godfrey, E.">
    <meta name="phone" content="2348165420728">
    <meta name="email" content="godfrey@gesusoft.com.ng">

    <link rel="icon" href="{{asset('img/dunamis.png')}}" type="image/x-icon">
    <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : ""}}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
</head>

<body class="light sidebar-mini sidebar-collapse">
    <!-- Pre loader -->
    <!--<div id="loader" class="loader">
        <div class="plane-container">
            <div class="preloader-wrapper small active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div id="app">
        @include('layouts.sections.sidebar.sidebar')
        <div class="has-sidebar-left">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
                        <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed text-white">
            <i></i>
        </a>
        <div class="has-sidebar-left has-sidebar-tabs">
            @include('layouts.sections.header')
            <div class="container-fluid relative animatedParent animateOnce my-3" >
                @if (session()->has('flash_notification.message'))
                    <div class="alert alert-{{ session('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {!! session('flash_notification.message') !!}
                    </div>
                @endif
                @yield('content')
                @include('systems.users.changeP')
            </div>
        </div>
        @include('layouts.sections.sidebar.right')
        <div class="control-sidebar-bg shadow white fixed text-white"></div>
    </div>
    <script type="text/javascript" src="{{asset('js/app2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    @yield('scripts')
</body>
<?php
  $thisYr = \Carbon\Carbon::now()->format("Y");
  $thisYrConv = \App\People::whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count();
  $jan_converts = \App\People::whereMonth('service_date', '01')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count();
  $feb_converts = \App\People::whereMonth('service_date', '02')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $mar_converts = \App\People::whereMonth('service_date', '03')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $apr_converts = \App\People::whereMonth('service_date', '04')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $may_converts = \App\People::whereMonth('service_date', '05')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $jun_converts = \App\People::whereMonth('service_date', '06')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $jul_converts = \App\People::whereMonth('service_date', '07')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $aug_converts = \App\People::whereMonth('service_date', '08')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $sept_converts = \App\People::whereMonth('service_date', '09')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $oct_converts = \App\People::whereMonth('service_date', '10')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $nov_converts = \App\People::whereMonth('service_date', '11')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  $dec_converts = \App\People::whereMonth('service_date', '12')->whereYear('service_date', \Carbon\Carbon::now()->format('Y'))->count(); 
  ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
    $('div.alert').not('.alert-important').delay(2800).fadeOut(250);
     // $("#homecell").hide();
        $("#dusomwhen").hide();
        $("#dltcwhen").hide();
        $("#fclasswhen").hide();
        $("#manniversory").hide();
        $("#preacher_other").hide();
        $("#coordinator_other").hide();
        $("#waterbaptism-when").hide();
        $("#nok_rel_other").hide();
        $("#employmentdetails").hide();
        $("#serviceTypeOther").hide();
        $("#datefrom").hide();
        $("#datetoo").hide();
        $("#landsize").hide();
        $("#Structure").hide();
        $("#RenStructure").hide();
        $("#service_other").hide();
        $("#pponame").hide();
        $("#unStructure").hide();
        $("#unRenStructure").hide();
        $("#localstate").hide();
        $("#localprovince").hide();
        $("#pponame").hide();
        $("#firstresidentpastorothername").hide();
        $("#confirmed_status").hide();



        $("#manniversory").hide();
        $("#preacher_other").hide();
        $("#coordinator_other").hide();

        $("#field_of_study_other").hide();
        $("#qual_other").hide();
        $("#course_other").hide();
        $("select[name=confirmation_status]").on("change", function() {
            var status = this.value;
            if (status == 1){
                $("#confirmed_status").show();
            }
            else{
                $("#confirmed_status").hide();
            }
        });
        
        $("select[name=presidingpastor]").on("change", function() {
            var svTypea = this.value;
            if (svTypea == 99999999){
                $("#pponame").show();
            }
            else{
                $("#pponame").hide();
            }
        });

        $("select[name=firstresidentpastor]").on("change", function() {
            var svTypea = this.value;
            if (svTypea == 99999999){
                $("#firstresidentpastorothername").show();
            }
            else{
                $("#firstresidentpastorothername").hide();
            }
        });

        $("select[name=country]").on("change", function() {
            var svTypea = this.value;
            if (svTypea == 162){
                $("#localstate").show();
                $("#localprovince").hide();
            }
            else{
                $("#localstate").hide();
                $("#localprovince").show();
            }
        });

        $("select[name=svctype]").on("change", function() {
            var svctype = this.value;
            if (svctype == 999){
                $("#serviceTypeOther").show();
                $("#datefrom").show();
                $("#datetoo").show();
                $("#servicedate").hide();
            }
            else{
               $("#serviceTypeOther").hide();
               $("#datefrom").hide();
                $("#datetoo").hide();
                $("#servicedate").show();
            }
        });
        
         $("select[name=purchaseland]").on("change", function() {
            var lpurchase = this.value;
            if (lpurchase == 1){
                $("#landsize").show();
            }
            else{
               $("#landsize").hide();
            }
        });
        
        $("select[name=presidingpastor]").on("change", function() {
            var presidingP = this.value;
            if (presidingP == 99999999){
                $("#pponame").show();
            }
            else{
               $("#pponame").hide();
            }
        });
    
        $("select[name=svctype]").on("change", function() {
            var svTypea = this.value;
            if (svTypea == 9000){
                $("#service_other").show();
            }
            else{
               $("#service_other").hide();
            }
        });
        
        $("select[name=buildstructure]").on("change", function() {
            var lpurchase = this.value;
            if (lpurchase == 1){
                $("#Structure").show();
                $("#unStructure").show();
            }
            else{
               $("#Structure").hide();
               $("#unStructure").hide();
            }
        });

        $("select[name=renovatedstructure]").on("change", function() {
            var lpurchase = this.value;
            if (lpurchase == 1){
                $("#RenStructure").show();
                $("#unRenStructure").show();
            }
            else{
               $("#RenStructure").hide();
               $("#unRenStructure").hide();
            }
        });
        

        $("select[name=dltc]").on("change", function() {
            var dltcwhen = this.value;
            if (dltcwhen == 1){
                $("#dltcwhen").show();
            }
            else{
               $("#dltcwhen").hide();
            }
        });



        $("select[name=fclass]").on("change", function() {
            var fclasswhen = this.value;
            if (fclasswhen == 1){
                $("#fclasswhen").show();
            }
            else{
               $("#fclasswhen").hide();
            }
        });

        $("select[name=dusom]").on("change", function() {
            var dusomwhen = this.value;
            if (dusomwhen == 1){
                $("#dusomwhen").show();
            }
            else{
               $("#dusomwhen").hide();
            }
        });
        
        $("select[name=nokRel]").on("change", function() {
            var nokrel = this.value;
            if (nokrel == 500){
                $("#nok_rel_other").show();
            }
            else{
               $("#nok_rel_other").hide();
            }
        });
        
        $("select[name=employmentstatus]").on("change", function() {
            var employmentstatus = this.value;
            if (employmentstatus == 1 || employmentstatus == 5){
                $("#employmentdetails").hide();
            }
            else{
               $("#employmentdetails").show();
            }
        });

        $("select[name=waterbaptism]").on("change", function() {
            var waterbaptism = this.value;
            if (waterbaptism == 1){
                $("#waterbaptism-when").show();
            }
            else{
               $("#waterbaptism-when").hide();
            }
        });

        $("select[name=mstatus]").on("change", function() {
            var manniversory = this.value;
            if (manniversory == 2){
                $("#manniversory").show();
            }
            else{
               $("#manniversory").hide();
            }
        });
        
        $("select[name=preacher]").on("change", function() {
            var preacher = this.value;
            if (preacher == 909090909){
                $("#preacher_other").show();
            }
            else{
               $("#preacher_other").hide();
            }
        });

         $("select[name=coordinator]").on("change", function() {
            var preacher = this.value;
            if (preacher == 909090909){
                $("#coordinator_other").show();
            }
            else{
               $("#coordinator_other").hide();
            }
        });
        
      });

     $('#editAttRecord').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var male = button.data('male') 
      var female = button.data('female') 
      var children = button.data('children') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #male').val(male);
      modal.find('.modal-body #female').val(female);
      modal.find('.modal-body #children').val(children);
      modal.find('.modal-body #id').val(id);
});


    $('#editAttRecordx').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var male = button.data('male') 
      var female = button.data('female') 
      var children = button.data('children') 
      var datefrom = button.data('datefrom') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #male').val(male);
      modal.find('.modal-body #female').val(female);
      modal.find('.modal-body #children').val(children);
      modal.find('.modal-body #datefrom').val(datefrom);
      modal.find('.modal-body #id').val(id);
});

    $('#deleteAttRecord').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #id').val(id);
});

    $('#editCountArea').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var title = button.data('title') 
      var description = button.data('description') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #title').val(title);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #id').val(id);
});

    $('#deleteCountArea').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #id').val(id);
});

    $('#editAsset').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var name = button.data('name') 
      var vendor = button.data('vendor') 
      var model = button.data('model') 
      var serial = button.data('serial') 
      var purchase_cost = button.data('purchase_cost') 
      var manufacturer = button.data('manufacturer') 
      var purchaseinvoice = button.data('purchaseinvoice') 

      var description = button.data('description') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #model').val(model);
      modal.find('.modal-body #vendor').val(vendor);
      modal.find('.modal-body #serial').val(serial);
      modal.find('.modal-body #manufacturer').val(manufacturer);
      modal.find('.modal-body #purchase_cost').val(purchase_cost);
      modal.find('.modal-body #purchaseinvoice').val(purchaseinvoice);
      modal.find('.modal-body #description').val(description);
      modal.find('.modal-body #id').val(id);
  });


      var thisYr = <?= json_encode($thisYr); ?>;
      var jan_converts = <?= json_encode($jan_converts); ?>;
      var feb_converts = <?= json_encode($feb_converts); ?>;
      var mar_converts = <?= json_encode($mar_converts); ?>;
      var apr_converts = <?= json_encode($apr_converts); ?>;
      var may_converts = <?= json_encode($may_converts); ?>;
      var jun_converts = <?= json_encode($jun_converts); ?>;
      var jul_converts = <?= json_encode($jul_converts); ?>;
      var aug_converts = <?= json_encode($aug_converts); ?>;
      var sept_converts = <?= json_encode($sept_converts); ?>;
      var oct_converts = <?= json_encode($oct_converts); ?>;
      var nov_converts = <?= json_encode($nov_converts); ?>;
      var dec_converts = <?= json_encode($dec_converts); ?>;
      FusionCharts.ready(function() {
      var revenueChart = new FusionCharts({
        type: 'column3d',
        renderAt: 'chart-container',
        width: '690',
        height: '350',
        dataFormat: 'json',
        dataSource: {
          "chart": {
            "caption": "Monthly Converts Inflow For " + thisYr,
            "subCaption": "The Lord's Garden",
            "xAxisName": "Month",
            "yAxisName": "No of People (in 1,000)",
            "numberPrefix": "",
            "theme": "fusion"
          },
          "data": [{
              "label": "Jan " + thisYr ,
              "value": jan_converts
            },
            {
              "label": "Feb " + thisYr,
              "value": feb_converts
            },
            {
              "label": "Mar " + thisYr,
              "value": mar_converts
            },
            {
              "label": "Apr " + thisYr,
              "value": apr_converts
            },
            {
              "label": "May " + thisYr,
              "value": may_converts
            },
            {
              "label": "Jun " + thisYr,
              "value": jun_converts
            },
            {
              "label": "Jul " + thisYr,
              "value": jul_converts
            },
            {
              "label": "Aug " + thisYr,
              "value": aug_converts
            },
            {
              "label": "Sep " + thisYr,
              "value": sept_converts
            },
            {
              "label": "Oct " + thisYr,
              "value": oct_converts
            },
            {
              "label": "Nov " + thisYr,
              "value": nov_converts
            },
            {
              "label": "Dec " + thisYr,
              "value": dec_converts
            }
          ],
          "trendlines": [{
            "line": [{
              "startvalue": "7000",
              "valueOnRight": "1",
            //   "displayvalue": "Monthly Inflow"
            }]
          }]
        }
      }).render();
    });
    
    //Uncategorized Capital Expenditure\\
    var i = 0;

    $("#add").click(function(){
        ++i;

        $("#expUncat").append('<tr><input type="hidden" name="addmore['+i+'][month]" id="month" value="{{date('m')}}" /><input type="hidden" name="addmore['+i+'][year]" id="year" value="{{date('Y')}}" /> <input type="hidden" name="addmore['+i+'][expenditure_type_id]" value="999999999" class="form-control form-control-sm" /> <input type="hidden" name="addmore['+i+'][location_id]" value="{{\Auth::user()->location_id}}" class="form-control form-control-sm" /> <input type="hidden" name="addmore['+i+'][submitted_by]" value="{{\Auth::user()->id}}" class="form-control form-control-sm" /><input type="hidden" name="addmore['+i+'][status]" value="1" class="form-control form-control-sm" /> <td><input type="text" name="addmore['+i+'][expenditure_type_other_name]" required placeholder="Expenditure heading" class="form-control form-control-sm" /></td><td><input type="number" name="addmore['+i+'][amount]" id="amount" required placeholder="0" value="0" class="form-control form-control-sm amount" style="text-align: center; "  onchange="summore();" onkeyup="summore();"/></td><td align="right"><button type="button" class="btn btn-danger btn-xs remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });

    // $("#report_date").change(function() {
    //   // document.getElementById('year')

    //   alert("I am changed and I need to to be assigned to another field");
    // });

    //Uncategorized Recurrent Expenditure\\
    var i = 0;

    $("#add2").click(function(){
        ++i;

        $("#expUncat2").append('<tr><input type="hidden" name="addmore['+i+'][month]" id="month" value="{{date('m')}}" /><input type="hidden" name="addmore['+i+'][year]" id="year" value="{{date('Y')}}" /><input type="hidden" name="addmore['+i+'][expenditure_type_id]" value="999999000" class="form-control form-control-sm" /> <input type="hidden" name="addmore['+i+'][location_id]" value="{{\Auth::user()->location_id}}" class="form-control form-control-sm" /> <input type="hidden" name="addmore['+i+'][submitted_by]" value="{{\Auth::user()->id}}" class="form-control form-control-sm" /><input type="hidden" name="addmore['+i+'][status]" value="1" class="form-control form-control-sm" /> <td><input type="text" name="addmore['+i+'][expenditure_type_other_name]" placeholder="Expenditure heading" class="form-control form-control-sm" /></td><td><input type="number" name="addmore['+i+'][amount]" id="amount" placeholder="0" value="0" class="form-control form-control-sm amount" style="text-align: center; "  onchange="summore();" onkeyup="summore();"/></td><td align="right"><button type="button" class="btn btn-danger btn-xs remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr2', function(){
         $(this).parents('tr').remove();
    });

</script>

<script src="{{asset('js/main.js')}}"></script>
</html>