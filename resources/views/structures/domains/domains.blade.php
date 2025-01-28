@extends('layouts.master')

@section('content')
<div class="row my-3">
    <div class="col-md-9">
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-favorite 2x green-text"></i> <strong class="text-uppercase"> Domains </strong>
            </div>
            <div class="card-body slimScroll">

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-favorite green-text"></i> <strong class="text-uppercase"> Domains </strong>
            </div>
            <div class="card-body slimScroll">
                <!-- <iframe src="{{asset('/documents/domains/1/workspaces/1.pdf')}}" width="100%" height="100%"></iframe> -->
            </div>
        </div>
    </div>

</div>
@endsection
