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
                            <h1>&nbsp;ABOUT</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h1>Republic of the Philippines</h1>
                    <h2>Department of Science and Technology<h2>
                    <hr>
                    <h4 style="font-weight: bold; font-size: 18px;">PERSONAL INFORMATION<h4>
                    <p style="font-weight: bold; font-size: 14px;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Name: <span style="font-weight: normal; font-size: 16px;">Ace Dave Commendador | Charleslexcel B. Mendoza</span></p>
                    <p style="font-weight: bold; font-size: 14px;"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Email: <span style="font-weight: normal; font-size: 16px;">ace_dcommendador7@gmail.com | itscharlesm@gmail.com</span></p>
                    <p style="font-weight: bold; font-size: 14px;"><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;Contact Number: <span style="font-weight: normal; font-size: 16px;">+639451818424 | +639062913082</span></p>
                    <p style="font-weight: bold; font-size: 14px;"><i class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp;Facebook: <span style="font-weight: normal; font-size: 16px;">Ace Dave Commendador | Charleslexcel Mendoza</span></p>
                    <hr>
                    <h4 style="font-weight: bold; font-size: 18px;">DEVELOPMENT<h4>
                    <p style="font-size: 14px;">Laravel Framework 8.83.27</p>
                    <p style="font-size: 14px;">PHP 7.3.0</p>
                    <p style="font-size: 14px;">jquery-3.6.0</p>
                    <p style="font-size: 14px;">bootstrap-3.4.1</p>
                    <hr>
                    <h4 style="font-weight: bold; font-size: 18px;">FUNCTIONALITIES<h4>
                    <ul>
                        <li style="font-size: 14px;">Add Hazard Payroll</li>
                        <li style="font-size: 14px;">Edit Hazard Payroll</li>
                        <li style="font-size: 14px;">View Hazard Payroll</li>
                        <li style="font-size: 14px;">Delete Hazard Payroll</li>
                        <li style="font-size: 14px;">View specific month period</li>
                        <li style="font-size: 14px;">Download specific PDF month period; ready for print</li>
                    </ul>
                    <hr>
                    <h4 style="font-weight: bold; font-size: 18px;">DATABASE<h4>
                    <ul>
                        <li style="font-size: 14px;">dost_project</li>
                    </ul>
                    <h4 style="font-weight: bold; font-size: 18px;">TABLES<h4>
                    <ul>
                        <li style="font-size: 14px;">employees</li>
                        <li style="font-size: 14px;">payrolls</li>
                        <li style="font-size: 14px;">users</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

</body>
</html>
