@extends('layouts.master')

@section('content')
<div class="row my-3">
    <div class="col-md-8">
        <div class=" card b-0">
            <!--  -->
            <div class="card-body slimScroll">
                <iframe src="{{asset('/documents/domains/1/workspaces/1.pdf')}}" width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class=" card no-b">
            <div class="card-body">
                <div class="row text-center" align="center">
                    <table class="table cell-vertical-align-center table-responsive mb-4">
                        <tbody>
                        <tr class="no-b" align="center">
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-xs">View Full</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-xs">View Permissions</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-xs">File History</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-warning btn-xs">Lock File</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <table class="table no-b">
                        <tbody>
                            <tr>
                                <td>Version</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Last Modified</td>
                                <td>21</td>  
                            </tr>
                            <tr>
                                <td>Created On</td>
                                <td>jk</td>
                            </tr>
                            <tr>
                                <td>Created By</td>
                                <td>wq</td>
                            </tr>
                            <tr>
                                <td>Last Contributor</td>
                                <td>n</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row col-md-12 title">
                    <p><h5>Title: The Impact of Angular Routing </h5>
                    </p>
                    <br><br>
                </div>
                <div class="row col-md-12">
                    <h4>Attachments:</h4>
                    <p>There are no attachments on this file</p>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
