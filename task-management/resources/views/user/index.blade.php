<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

@yield('styles')

</head>
<body>
{{-- <div id ="wrapper"> --}}
    <div class="d-flex flex-column flex-shrink-0 p-3 me-0 bg-light border border-grey containerwidth">
        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class= "navbar-brand">Task Management</a>
                </div>
                <div class="navbar-header">
                    <ul class="nav navbar-nav navbar-right">
                                <div class="input-group custom-search-form" style="width: 500px;">
                                    <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <span class="fa fa-search" id="searchhover"></span>
                                            </button>
                                            <a href="#" class="px-2"><span class="fas fa-bell"></span></a>
                                            <a href="#" class="px-2"><span class="fas fa-user px-1"></span>User</a>
                                        </span>
                            </div>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="d-flex flex-nowrap">
    <div class="d-flex flex-column p-3 bg-light border border-grey border-top-0 sidelinecontainerwidth">
            <ul class="nav nav-pills flex-column mb-auto mt-2">
                <li class="nav-item">
                    <a href="#" class="nav-link"><span class="fas fa-dashboard px-2"></span>Dashboard</a>
                </li>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default mt-2">
                        <div class="panel-heading">
                            <a class="nav-link" href="#collapse1" data-bs-toggle="collapse"><span class="fas fa-diagram-project px-2"></span>Projects</a>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse px-4" data-bs-parent="#accordion" >
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">All projects</a></li>
                            </ul>
                        </div>
                        <div class="panel-heading mt-2 ">
                                <a class="nav-link collapsed" href="#collapse2" data-bs-toggle="collapse"> <span class="fas fa-users px-2"></span>Team Members</a>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse px-4" data-bs-parent="#accordion">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">All members</a></li>
                            </ul>
                        </div>
                        <div class="panel-heading mt-2">
                                <a class="nav-link collapsed" href="#collapse3" data-bs-toggle="collapse"><span class="fas fa-tasks px-2"></span>Assigned Tasks</a>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse px-4" data-bs-parent="#accordion">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#">Pending tasks</a></li>
                                <li class="list-group-item"><a href="#">Tasks on progress</a></li>
                                <li class="list-group-item"><a href="#">Completed Task</a></li>

                                {{-- <li class="list-group-item"><a href="#">Edit task</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </ul>
        </ul>

    </div>
    <div class="d-flex flex-grow-1 flex-column p-3">

        @yield('content')

    </div>
    </div>


    <script src="{{asset('jquery/jquery.js')}}"></script>
    <script src="{{asset('jquery/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>


    @yield('scripts')

</body>
</html>

