@extends('admin.layouts.master')
@section('admin_content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12 order-xl-12 order-1">
            <h1>Classic IT - Task</h1>
            <div class="card">
                <div class="card-body">

                    <div class="tab-pane" id="settings">
                        <form action="{{route('attendance.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class= "mb-3">
                                        <label for="" class="form-label">Check In</label>
                                        <input type="hidden" class="form-control" name="date" value="{{ date('Y-m-d') }}">
                                        <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
                                        <button type="submit" class="btn btn-blue">Check In</button>
                                    </div>
                                </div>

                                {{--                                    <div class="text-end">--}}
                                {{--                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>--}}
                                {{--                                    </div>--}}
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->
                </div>
            </div> <!-- end card-->
        </div>
    </div>
    <!-- end row -->


</div> <!-- container -->


@endsection
