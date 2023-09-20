@extends('admin.layouts.master')
@section('admin_content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Member Attendance List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-pane" id="settings">
                            <form action="{{route('attendance.attendance')}}" method="GET" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <label for="" class="form-label mx-2">Select First Date</label>
                                            <input type="date" class="form-control" name="first_date" value="{{$first_date??""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class= "input-group">
                                            <label for="" class="form-label mx-2">Select Last Date</label>
                                            <input type="date" class="form-control" name="last_date"  value="{{$last_date??""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-content-save"></i> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table dt-responsive  w-100">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Memo</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($attendances as $key => $attendance)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$attendance->user->name}}</td>
                                    <td>{{$attendance->date}}</td>
                                    <td>{{$attendance->status}}</td>
                                    <td>
                                        <form action="{{route('attendance.memo_update',$attendance->id)}}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <div class="input-group">
                                                <textarea name="memo" class="form-control" rows="2" cols="20">{{ $attendance->memo }}</textarea>
                                                <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{route('attendance.delete',$attendance->id)}}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>


@endsection
