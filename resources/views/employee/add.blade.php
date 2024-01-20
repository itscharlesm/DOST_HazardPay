<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    @include('components.dashboard')
    <title>DOST XI</title>
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

    <div id="app">
        <div id="main">
            <div class="page-heading">
                    <div class="row" id="main" >
                        <div class="col-sm-12 col-md-12 well" id="content">
                            <h1>ADD EMPLOYEE TO THE SERVER</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-12">
            <div class="card">
                <div class="card-body">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('employee.add') }}" class="form-container" id="payrollForm">
                        @csrf
                        @method('post')
                        

                        <!-- Part 2 -->
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="employee_no">Employee Number:<span style="color: red; font-weight: bold;">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="employee_no" class="form-control" id="employee_no" placeholder="Generated Number" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button" id="generateNumber">Generate</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name:<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Employee Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation:<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter designation" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 text-md-right">
                                    <button type="submit" class="btn btn-success" id="saveBtn">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('generateNumber').addEventListener('click', function() {
        // Generate a random 6-digit number
        const randomNumber = Math.floor(100000 + Math.random() * 900000);

        // Set the generated number in the input field
        document.getElementById('employee_no').value = randomNumber;
    });
</script>    
</div>
</body>
</html>
