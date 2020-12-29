<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" width="179px" height="35px"
                    src="{{asset('assets/images/laravel_logo_1.png')}}" alt=""></a></div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up" src="{{asset('assets/images/avatar.png')}}"
                    alt="#">
            </div>
            <h6 class="mt-3 f-14">Rahul</h6>
            <p>Administrator</p>
        </div>
        @role('super-admin')
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href=""><i data-feather="git-branch"></i><span>Instructors</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('instructor.index')}}"><i class="fa fa-circle"></i>Instructor List</a></li>
                    <li><a href="{{route('instructor.create')}}"><i class="fa fa-circle"></i>Create Instructor</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="git-branch"></i><span>Courses</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('course.index')}}"><i class="fa fa-circle"></i>Courses List</a></li>
                    <li><a href="{{route('course.create')}}"><i class="fa fa-circle"></i>Create Course</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="git-branch"></i><span>Lectures</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('lecture.index')}}"><i class="fa fa-circle"></i>Lectures List</a></li>
                    <li><a href="{{route('lecture.create')}}"><i class="fa fa-circle"></i>Create Lecture</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="javascript:void;" onclick="$('#logout-form').submit();"><i
                        data-feather="log-out"></i><span>Logout</span></a>
                <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
            </li>
        </ul>
        @else
        <ul class="sidebar-menu">

            <li><a class="sidebar-header" href=""><i data-feather="git-branch"></i><span>Instructors</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{route('instructor.index')}}"><i class="fa fa-circle"></i>Instructor List</a></li>
                </ul>
                {{-- <li><a href="{{route('instructor.create')}}"><i class="fa fa-circle"></i>Create Instructor</a>
            </li> --}}
            <li><a class="sidebar-header" href="javascript:void;" onclick="$('#logout-form').submit();"><i
                        data-feather="log-out"></i><span>Logout</span></a>
                <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
            </li>
        </ul>
        </li>
        </ul>
        @endrole
    </div>
</div>
