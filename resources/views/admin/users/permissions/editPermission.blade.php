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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Update Permission</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Update Permission</h4>
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
                            <form id="myForm" method="post" action="{{ route('role.permission_update',$permission->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Update Permission</h5>

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Permission Name</label>
                                            <input type="text" name="name" class="form-control"  value="{{$permission->name}}" >

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Group Name </label>
                                            <select name="group_name" class="form-select" id="example-select">
                                                <option selected disabled >Select Group  </option>

                                                <option {{$permission->group_name == "attendance" ? "selected" : ""}} value="attendance"> attendance</option>
                                                <option {{$permission->group_name == "user" ? "selected" : ""}} value="user"> user</option>
                                                <option {{$permission->group_name == "role" ? "selected" : ""}} value="role"> role</option>

                                            </select>

                                        </div>
                                    </div>




                                </div> <!-- end row -->



                                <div class="text-end">
                                    <button type="submit" class="btn btn-blue waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update</button>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    group_name: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Permission Name',
                    },
                    group_name: {
                        required : 'Please Select Group Name',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
@endsection
