<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('backend/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('dashboard')}}" >
                        <i class="fa fa-dashboard"></i>
                        {{-- <span class="badge bg-success rounded-pill float-end">4</span> --}}
                        <span> Dashboards </span>
                    </a>

                </li>

                <li class="menu-title mt-2">Apps</li>
                @if(Auth::user()->can('attendance.menu'))
                <li>
                    <a href="#sidebarAttendance" data-bs-toggle="collapse">
                        <i class="fa fa-users"></i>
                        <span> Attendance Manage </span>
                        <span class="fa fa-angle-down"></span>
                    </a>
                    @can('attendance.list')
                    <div class="collapse" id="sidebarAttendance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('attendance.list')}}">Employee Attendance</a>
                            </li>

                        </ul>
                    </div>
                    @endcan
                </li>
                @endif
                @if(Auth::user()->can('user.menu'))
                <li>
                    <a href="#sidebarUser" data-bs-toggle="collapse">
                        <i class="fa fa-users"></i>
                        <span> User List </span>
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <div class="collapse" id="sidebarUser">
                        <ul class="nav-second-level">
                            @can('user.list')
                            <li>
                                <a href="{{route('admin.user')}}">Employee List</a>
                            </li>
                            @endcan
                            @can('user.add')
                            <li>
                                <a href="{{route('admin.user_create')}}">Add Employee</a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::user()->can('role.menu'))
                <li>
                    <a href="#sidebarRoles" data-bs-toggle="collapse">
                        <i class="fa fa-lock-open"></i>
                        <span> Roles </span>
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <div class="collapse" id="sidebarRoles">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('role.permission')}}">Permission</a>
                            </li>
                            <li>
                                <a href="{{route('role.permission_create')}}">Add Permission</a>
                            </li>
                            <li>
                                <a href="{{route('role.role')}}">Role</a>
                            </li>
                            <li>
                                <a href="{{route('role.role_create')}}">Add Role</a>
                            </li>
                            <li>
                                <a href="{{route('role.role_permission')}}">Permission in Role</a>
                            </li>
                            <li>
                                <a href="{{route('role.role_permission_create')}}">Add Permission in Role</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                <li data-bs-toggle='modal' data-bs-target='#softwareDeveloper'>
                    <a href="#"><i class="fa fa-code"></i> <span>For More</span> </a>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>


<div class="modal fade" id="softwareDeveloper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Md. ASHIKUR RAHMAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('/backend/1671554859740.jpg')}}" style="height: 250px !important;" alt="">
                </div>
                <div class="mt-2">
                    <h3 class="text-center">Software Engineer</h3>
                    <p class="text-center"><a href="mailto:ashikurrahmanbpi72@gmail.com"><i class="fas fa-mail mr-2"></i><strong>ashikurrahmanbpi72@gmail.com</strong></a></p>
                    <p class="text-center"><i class="fas fa-phone-volume mr-2"></i><strong> 01792104772</strong></p>
                    <p class="text-center"><i class="fas fa-phone-volume mr-2"></i><strong> 01907371151</strong></p>
                    <p><a href="https://www.linkedin.com/in/iamashik194/"> <i class="fab fa-linkedin"> iamashik194</i> </a> || <a href="https://www.facebook.com/iamashik194"><i class="fab fa-facebook" > iamashik194</i></a> || <a href="https://www.instagram.com/iamashik194/"> <i class="fab fa-instagram"> iamashik194</i></a> ||  <a href="https://twitter.com/iamashik194"> <i class="fab fa-twitter"> iamashik194</i></a></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
