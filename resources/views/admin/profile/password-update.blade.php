@extends('admin.layouts.master')
@section('admin_content')
<div class="content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Admin Profile</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">

        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                        
                    <div class="tab-pane" id="settings">
                        <form action="{{route('admin.password_update',$user->id)}}" method="POST" >
                            @csrf
                            @method('put')
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="oldpassword" class="form-label">Old Password</label>
                                        <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" id="oldpassword" >
                                        @error('oldpassword')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="newpassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" id="newpassword" >
                                        @error('newpassword')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="confim_password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control @error('confim_password') is-invalid @enderror" name="confim_password" id="confim_password" >
                                        @error('confim_password')
                                            <span class="text-danger fw-bold">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div> <!-- end row -->
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
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
</div>
@endsection
