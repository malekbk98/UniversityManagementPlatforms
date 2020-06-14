<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>University Management Platform </title>
  <link rel="stylesheet" href="{{asset('css/custom_css.css')}}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      @if (auth::user()->position!='admin')
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" onclick="seen()">
          <i class="far fa-bell"></i>
          @if($nbr>0)
            <span class="badge badge-warning navbar-badge">{{$nbr}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach($notif as $note)
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="{{asset('dist/img/admin.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  @if($note->status=="new")
                    <span class="badge badge-danger">New</span>
                  @endif
                  <h3 class="dropdown-item-title">
                    {{$note->title}}
                  </h3>
                  <p class="text-sm">{{$note->message}}</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{$note->created_at}}</p>
                </div>
              </div>
            </a>
          @endforeach
      </li>
    @endif
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <div class="user-panel">
                  <div class="image">
                  @if($user->photo) 
                    <img src="{{asset('storage')}}/{{$user->photo}}" class="img-circle elevation-2" style="width:35px;height:35px;" alt="User Image">
                  @else
                    <img src="{{asset('dist/img/avatar.png')}}" class="img-circle elevation-2" style="width:35px;height:35px;" alt="User Image">
                  @endif
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">{{$user->first_name}} {{$user->last_name}}</span>
            <div class="dropdown-divider"></div>
            <a href="{{route('profil')}}" class="dropdown-item">
                <i class="fas fa-user-alt"></i>  Profile
            </a>
            <div class="dropdown-divider"></div> 
              <a class="dropdown-item" href="'{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
            </a>       
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('index3.html')}}" class="brand-link">
      <span class="brand-text font-weight-light">My University</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{(\Request::is('home')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth::user()->position=='admin')
          <li class="nav-header">Notifications & Search</li>
            <li class="nav-item">
              <a href="{{route('students_lists.lists')}}" class="nav-link {{(\Request::is('students_lists')) ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <p>Students</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('teachers_lists.lists')}}" class="nav-link {{(\Request::is('teachers_lists')) ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <p>Teachers</p>
              </a>
            </li>
            <li class="nav-header">Manage Department</li>
            <li class="nav-item">
              <a href="{{route('departments.index')}}" class="nav-link {{(\Request::is('departments')) ? 'active' : '' }}">
                <i class="fas fa-university"></i>
                <p>Department list</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{route('departments_create.create')}}" class="nav-link {{(\Request::is('departments_create')) ? 'active' : '' }}">
                <i class="fas fa-university"></i>
                <p>Create Department</p>
              </a>
            </li>
            <li class="nav-header">Manage Class</li>
            <li class="nav-item">
              <a href="{{route('classes.index')}}" class="nav-link {{(\Request::is('classes')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard"></i>
                <p>Class list</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{route('classes_create.create')}}" class="nav-link {{(\Request::is('classes_create')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard"></i>
                <p>Create Class</p>
              </a>
            </li>
            <li class="nav-header">Manage Subject</li>
            <li class="nav-item">
              <a href="{{route('subjects_index.home')}}" class="nav-link {{(\Request::is('subjects_index')) ? 'active' : '' }}">
                <i class="fas fa-flask"></i>
                <p>Subjects List</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{route('subjects_create.create')}}" class="nav-link {{(\Request::is('subjects_create')) ? 'active' : '' }}">
                <i class="fas fa-flask"></i>
                <p>Create Subject</p>
              </a>
            </li>
            <li class="nav-header">Manage User</li>
            <li class="nav-item">
              <a href="{{route('user_create.view')}}" class="nav-link {{(\Request::is('user_create')) ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <p>Create User</p>
              </a>
            </li>
            <li class="nav-header">Manage Teachers</li>
            <li class="nav-item">
              <a href="{{route('teachers_index.home')}}" class="nav-link {{(\Request::is('teachers_index')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Teachers List</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{route('teachers_create.create')}}" class="nav-link {{(\Request::is('teachers_create')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Create Teacher</p>
              </a>
            </li>
            <li class="nav-header">Manage Students</li>
            <li class="nav-item">
              <a href="{{route('students_manages.index')}}" class="nav-link {{(\Request::is('students_manages')) ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                <p>Students List</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{route('students_create.create')}}" class="nav-link {{(\Request::is('students_create')) ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                <p>Create Student</p>
              </a>
            </li>
            <li class="nav-header">Check Reviews</li>
            <li class="nav-item">
              <a href="{{route('teachers_review.reviews')}}" class="nav-link {{(\Request::is('teachers_review')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Teachers Reviews</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('students_review.reviews')}}" class="nav-link {{(\Request::is('students_review')) ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                <p>Students Reviews</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('subjects_review.reviews')}}" class="nav-link {{(\Request::is('subjects_review')) ? 'active' : '' }}">
                <i class="fas fa-flask"></i>
                <p>Subjects Reviews</p>
              </a>
            </li>
            @elseif(auth::user()->position=='teacher')
          <li class="nav-header">Check your attendances</li>
            <li class="nav-item">
              <a href="{{route('teacher_attendance.index')}}" class="nav-link {{(\Request::is('teachers_attendance')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Teachers attendances</p>
              </a>
          </li>
          <li class="nav-header">Check your schedule</li>

            <li class="nav-item">
              <a href="{{route('schedule.index')}}" class="nav-link {{(\Request::is('schedule')) ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i>
                <p>Check schedule</p>
              </a>
            </li>
            <li class="nav-header"> classe attendance </li>

            <li class="nav-item">
              <a href="{{route('classelist')}}" class="nav-link {{(\Request::is('class')) ? 'active' : '' }}">
                <i class="fas fa-flask"></i>
                <p>Do classe attendance</p>
              </a>
            </li>

            <li class="nav-header">Manage Post</li>
            <li class="nav-item">
              <a href="{{route('posts.index')}}" class="nav-link {{(\Request::is('posts')) ? 'active' : '' }}">
                <i class="far fa-clipboard"></i>
                <p>ALL Post</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{route('posts_create.create')}}" class="nav-link {{(\Request::is('posts_create')) ? 'active' : '' }}">
                <i class="far fa-clipboard"></i>
                <p>Create Post</p>
              </a>
            </li>
          <!-- Student Nav Bar-->
         @elseif(auth::user()->position=='student')
         
          <li class="nav-header">Reviews</li>
            <li class="nav-item">
              <a href="{{route('reviewTeacher.index')}}" class="nav-link {{(\Request::is('reviewTeacher')) ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>Teachers Review</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('reviewSubjectt.index')}}" class="nav-link" {{(\Request::is('reviewSubjectt')) ? 'active' : '' }}>
              <i class="nav-icon fas fa-book"></i>
              <p>
                Subject Review
              </p>
            </a>
          </li>
        @endif
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('js/table.js')}}"></script>
<script src="{{asset('js/customjs.js')}}"></script>


</body>
</html>
