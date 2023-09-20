@extends('admin.layouts.master')
@section('admin_content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{$user->image ? "/".$user->image : asset('backend/assets/images/no_image.jpg')}}" class="rounded-circle avatar-lg img-thumbnail"
                    alt="profile-image">

                    <h4 class="mb-0">{{$user->name}}</h4>
                    <p class="text-muted">{{$user->username}}</p>

                    <div class="text-start mt-3">

                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$user->name}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{$user->email}}</span></p>

                    </div>

                </div>
            </div> <!-- end card -->



        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-body">

                    <div class="tab-pane" id="settings">
                        <form action="{{route('admin.profile_update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h5 class="mb-4 text-uppercase"><i class="fa fa-user-circle me-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="fullname" value="{{$user->name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Picture</label>
                                        <input type="file" id="img" class="form-control" name="image">
                                    </div>
                                </div><!-- end col -->
                                <img id="showImg" src="{{$user->image ? "/".$user->image : asset('backend/assets/images/no_image.jpg')}}" class="rounded-circle img-thumbnail avatar-lg" alt="profile-image">
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


@endsection
