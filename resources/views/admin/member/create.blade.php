@extends('admin.layouts.master')
@section('admin_content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Attendance</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form action="{{route('admin.attendance.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class= "mb-3">
                                            <label for="staff_id" class="form-label">Staff Name</label>
                                            <input type="text" class="" name="">
                                            <select name="staff_id" class="js-example-basic-single form-control @error('staff_id') is-invalid @enderror" id="staff_id">
                                                <option selected disabled >Select Border Name </option>
                                                @foreach($staffs as $staff)
                                                    <option value="{{$staff->id}}">{{$staff->staff_name}} </option>
                                                @endforeach
                                            </select>
                                            @error('staff_id')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->
@endsection
