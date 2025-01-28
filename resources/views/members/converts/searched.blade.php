
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Electronic Membership Information Management System">
        <meta name="author" content="Umoru Godfrey, E.">
        <meta name="phone" content="2348165420728">
        <meta name="email" content="godfrey@gesusoft.com.ng">
        <link rel="icon" href="{{asset('img/dunamis.png')}}" type="image/x-icon">
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' ' .' Search Result - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h6 text-uppercase" align="center" style="font-family: arial;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ \Auth::user()->location->loc_name. ' ' .' Search Result - '. date('M dS, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
       		<table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="22%">Full Name</th>
                        <th width="20%">Location</th>
                        <!-- <th> e-Mail</th> -->
                        <th width="10%"> Phone No</th>
                        <th width="5%">Category</th>
                        <th>SVC</th>
                        <th>Found. Class</th>
                        <th>DLTC</th>
                        <th> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($converts as $count => $convt)
                            <td>{{ ++$count }}</td>  
                            <td> <b>{{ strtoupper($convt->fullnames) }}</b></td>
                            <td>{{ isset($convt->people_loc) ? $convt->people_loc->loc_name : " NA"}}</td>
                            <!-- <td>{{ $convt->email }}</td> -->
                            <td>{{ $convt->phone1 }}</td>
                            <td align="">{{isset($convt->getCategory) ? $convt->getCategory->short_name : "Not Defined" }}</td>
                            <td align="center">{{isset($convt->serviceT) ? $convt->serviceT->name : "Not Defined"}}</td>
                            <td align="center">
                                @if($convt->fclass_status  == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($convt->dltc_status  == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($convt->membership_decision  == 1)
                                Decided
                                @else
                                Not decided
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>  
     
        </div>
    </div> 
    </body>
</html>
