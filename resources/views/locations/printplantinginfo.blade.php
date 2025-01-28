
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName :  'eekly Report for - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 53px; width: 60px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{'Location Planting/Poineering/1st Resident Pastors Summmary report as at ' .
        date("jS F, Y")}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
              <thead>
                <tr>
                    <th style="text-transform: uppercase;">S/No</th>
                    <th style="text-transform: uppercase;">location Name</th>
                    <th style="text-transform: uppercase;">Parent Location</th>
                    <th style="text-transform: uppercase;">Parent Location Presiding Pastor</th>
                    <th style="text-transform: uppercase;">1st Resident Pastor</th>
                    <th style="text-transform: uppercase;">Date Planted</th>
                    <th style="text-transform: uppercase;">Other Locations Planted</th>
                </tr>
            </thead>
                <tbody>
                    <tr class="odd gradeX">
                    @foreach($locations as $count => $locs)
                        <td>{{ ++$count }}</td>  
                        <td><a href="{{route('locations.one', \Crypt::encrypt($locs->id)) }}"> <b>{{ $locs->loc_name }}</b></a></td>
                        <td align="">{{ isset($locs->parentLoc) ? $locs->parentLoc->loc_name : "Not set yet" }}</td>
                        <td align="">{{ isset($locs->plantingPst) ? $locs->plantingPst->surname .' '.$locs->plantingPst->othernames : "Not set yet" }}</td>
                        <td align="">
                            <!-- @if($locs->poineeringPst &&  $locs->poineeringPst->first_resident_pastor_id ==99999999)
                                    <b>{{$locs->first_resident_pastor_other_name}}</b>
                                @else
                                    <a href="">{{isset($locs->poineeringPst) ? $locs->poineeringPst->surname.' '.$locs->poineeringPst->othernames : "Unspecified"}}</a>
                                @endif -->
                            <!-- {{isset($locs->firstResPst) ? $locs->firstResPst->surname : "No"}} -->

                            @if(!isset($locs->poineeringPst))
                                @if($locs->first_resident_pastor_id == 99999999)
                                    {{$locs->first_resident_pastor_other_name}}
                                @endif
                            @endif
                            @if($locs->poineeringPst)
                            {{isset($locs->poineeringPst) ? $locs->poineeringPst->surname.' '.$locs->poineeringPst->othernames : "Unspecified"}}
                            @endif
                        </td>
                        <td align="center">{{ $locs->date_planted }}</td>
                        <td align="center">{{ isset($locs->locPlanted) ? number_format($locs->locPlanted->count(),0) : "0" }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </body>
</html>
