@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> My Asset Index </strong> 
                <div class="pull-right" align="right"><a data-toggle="modal" data-target="#newasset" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs btn-fab"> New</a></div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: left; text-transform: uppercase;">Asset Name</th>
                        <th width="15%" style="text-align: center; text-transform: uppercase;">Category</th>
                        <th width="12%" style="text-align: center; text-transform: uppercase;">Model</th>
                        <th width="15%" style="text-align: center; text-transform: uppercase;">Serial No</th>
                        <th width="10%" style="text-align: center; text-transform: uppercase;">Invoice No</th>
                        <th width="15%" style="text-align: center; text-transform: uppercase;">Cost (Worth &#8358;)</th>
                        <th width="10%" style="text-align: center; text-transform: uppercase;">Status</th>
                        <th> OPTIONS</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($assets as $count => $asset)
                                <td>{{ ++$count }}</td>  
                                <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $asset->name }}</b></a></td>
                                <td align="">{{ $asset->type->name }}</td>
                                <td align="">{{ $asset->model }}</td>
                                <td align="">{{ $asset->serial_no }}</td>
                                <td align="">{{ $asset->invoice_no }}</td>
                                <td align="right">{{ number_format($asset->purchase_cost, 0) }}</td>
                                <td align="">
                                    @if($asset->current_status == 1)
                                    In use
                                    @else
                                    Inactive
                                    @endif
                                </td>
                                <td align="center">
                                    <a data-name="{{$asset->name}}" data-model="{{$asset->model}}" data-vendor="{{$asset->vendor}}" data-serial="{{$asset->serial_no}}"  data-id="{{$asset->id}}" data-manufacturer="{{$asset->manufacturer}}" data-purchase_cost="{{$asset->purchase_cost}}" data-purchaseinvoice="{{$asset->invoice_no}}" data-description="{{$asset->description}}" data-toggle="modal" data-target="#editAsset" > <i class="icon icon-pencil text-yellow"></i></a> &nbsp;
                                    <a href="{{ URL::route('assets.delete', $asset->id)}}" class="confirmation"><i class="icon-trash text-red"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
@include('accounts.assetmanagement.modals.newasset')
@include('accounts.assetmanagement.modals.editasset')

@endsection
@section('scripts')
    <script>
        $('.confirmation').on('click', function () {
        return confirm('Are you sure you want to delete?');
    });
    </script>
@endsection