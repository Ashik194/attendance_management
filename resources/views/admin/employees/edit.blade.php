@extends('admin.layouts.master')
@section('admin_content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Edit User</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Edit User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">





                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">
                            <form id="myForm" method="post" action="{{ route('admin.user_update',$user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit User</h5>

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label"> Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"   >

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label"> Email</label>
                                            <input type="email" name="email" class="form-control"  value="{{ $user->email }}"   >

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Asign Roles </label>
                                            <select name="roles" class="form-select" id="example-select">
                                                <option selected disabled >Select Roles </option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }} >{{ $role->name }}</option>
                                                @endforeach
                                            </select>

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
                                    <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"> Update</button>
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
