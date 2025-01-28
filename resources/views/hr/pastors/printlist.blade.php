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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : 'Yaerly Report for - '. date('Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 53px; width: 60px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{'pastors List report as at  '. date('jS F, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="summary" border="2" style="border-style: all;" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
                <thead>
                    <tr style="border-width: 1px;">
                        <td width="5%" rowspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;">Serial #</td>
                        <td rowspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;">Full Name</td>
                        <td rowspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;">Current Location</td>
                        <td rowspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;">Location Host State</td>
                        <td rowspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;"> Phone Number</td>
                        <td colspan="" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Email</td>
                        <td colspan="" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Responsibility</td>
                        <!-- <td colspan="" style="text-align: center; text-transform: uppercase; font-weight: bold;"> status</td> -->
                    </tr>
                    
                </thead>
                <tbody>
                   <tr class="odd gradeX">
                    @foreach($pastors as $count => $pst)
                        <td align="center">{{ ++$count }}</td>  
                        <td class="text-uppercase"> <b>{{ $pst->surname.' '.$pst->othernames }}</b></td>
                        <td class="text-uppercase">{{ isset($pst->get_loc) ? $pst->get_loc->loc_name : " Not set"}}</td>
                        <td class="text-uppercase">{{ isset($pst->get_loc) ? $pst->get_loc->loc_state->state : " Not set"}}</td>
                        <td>{{ $pst->phone1. ', '.$pst->phone2 }}</td>
                        <td class="">{{ $pst->email }}</td>
                        <td class="text-uppercase">
                            <?php $pastortype = json_decode($pst->pastor_type_id);?>
                            @foreach($pastortype as $ptype)
                               {{App\PastorType::find($ptype)->name}}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>