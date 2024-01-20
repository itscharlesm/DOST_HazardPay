<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
    @include('components.dashboard')
    <title>DOST XI</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
        #map {
          height: 400px;
        }
    </style>

    <script>
        $(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {                        
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
    });

    // Function to handle the Admin User dropdown
    function toggleAdminUserDropdown() {
        var dropdown = $('.dropdown-menu.admin-user');
        if (dropdown.is(":visible")) {
            dropdown.hide();
        } else {
            dropdown.show();
        }
    }

    // Toggle the dropdown visibility on click
    $('.dropdown-toggle').on('click', function() {
        toggleAdminUserDropdown();
    });

    // Close the Admin User dropdown when clicking outside
    $(document).on('click', function(e) {
        if ($(e.target).closest(".dropdown").length === 0) {
            $('.dropdown-menu.admin-user').hide();
        }
    });
});
    </script>
    
</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/dashboard">
            <img src="../../images/logo/DOST_Header.png" alt="LOGO" style="height: 50px; width: 300px;">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="toggleAdminUserDropdown()">{{ session('username') }}&nbsp;<b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu admin-user">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="/dashboard"><i class="fa fa-fw fa-search"></i>DASHBOARD</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>PAYROLL<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="/payroll"><i class="fa fa-angle-double-right"></i>Payrolls</a></li>
                        <li><a href="/create-payroll"><i class="fa fa-angle-double-right"></i>Create Payroll</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i>EMPLOYEE<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="/employee"><i class="fa fa-angle-double-right"></i>Employees</a></li>
                        <li><a href="/add-employee"><i class="fa fa-angle-double-right"></i>Add Employee</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/about"><i class="fa fa-fw fa-paper-plane-o"></i>ABOUT</a>
                </li>
                <li>
                    <a href="/location"><i class="fa fa-fw fa fa-question-circle"></i>DOST XI</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>LIST OF EMPLOYEES</h3>
                           
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success" style="background-color: #328332; color: #fff;">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Bordered table start -->
                <section class="section">
                    <div class="row" id="table-bordered">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <a class="btn btn-success btn-sm" href="/add-employee" style="position:relative; left:16px;"><i class="fa fa-plus"></i> Add Employee</a>
                                    </div>
                                    <br>
                                    <br>
                                    <!-- table bordered -->
                                    <div id="may-table" class="table-responsive">
                                        <table class="table table-bordered mb-0" id="payroll-table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">ID</th>
                                                    <th style="text-align:center">NAME</th>
                                                    <th style="text-align:center">DESIGNATION</th>
                                                    <th style="text-align:center">EMPLOYEE NO.</th>
                                                    <th style="text-align:center">ACTION</th>   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td style="text-align:center">{{ $employee->id }}</td>
                                                    <td style="text-align:center">{{ $employee->name }}</td>
                                                    <td style="text-align:center">{{ $employee->designation }}</td>
                                                    <td style="text-align:center">{{ $employee->employee_no }}</td>
                                                    <td style="text-align:center">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('employee.update', ['id' => $employee->id]) }}"><i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm" href="/employee/{{ $employee->id }}" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this employee record?')) document.getElementById('delete-form-{{ $employee->id }}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $employee->id }}" action="/employee/{{ $employee->id }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                                <!-- Add more table rows with the relevant data-period values -->
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Bordered table end -->
            </div>
    </div>


</body>
</html>