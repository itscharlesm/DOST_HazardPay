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
                            <h1>CREATING GENERAL PAYROLL FOR HAZARD PAY</h1>
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
                <form method="post" action="{{route('payroll.store')}}" class="form-container" id="payrollForm">
                        @csrf
                        @method('post')
                        <!-- Part 1 -->
                        <div class="section section-1">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <label for="select_period" class="h3">Select period you want to save:</label>
                                            <select name="select_period" class="form-control form-control-lg text-center" id="select_period">
                                                <option value="January" class="h4">Month of January</option>
                                                <option value="February" class="h4">Month of February</option>
                                                <option value="March" class="h4">Month of March</option>
                                                <option value="April" class="h4">Month of April</option>
                                                <option value="May" class="h4">Month of May</option>
                                                <option value="June" class="h4">Month of June</option>
                                                <option value="July" class="h4">Month of July</option>
                                                <option value="August" class="h4">Month of August</option>
                                                <option value="September" class="h4">Month of September</option>
                                                <option value="October" class="h4">Month of October</option>
                                                <option value="November" class="h4">Month of November</option>
                                                <option value="December" class="h4">Month of December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Name">Employee Name<span style="color: red; font-weight: bold;">*</span></label>
                                            <select id="Name" name="name" class="form-control js-example-theme-single" autocomplete="off" onchange="SelectedEmployee()">
                                                <option value="">( Select Employee Name )</option>
                                                @foreach ($employees->sortBy('name') as $employee)
                                                <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_No">Employee No.<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="text" name="employee_no" class="form-control" id="employee_No" placeholder="Employee No." autocomplete="off" readonly>
                                        <!--<select id="employee_No" name="employee_no" class="form-control js-example-theme-single" autocomplete="off">
                                                <option value="">( Select Employee No )</option>
                                                @foreach ($employees->sortBy('employee_no') as $employee)
                                                <option value="{{ $employee->employee_no }}">{{ $employee->employee_no }}</option>
                                                @endforeach
                                            </select>-->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Designation">Designation</label>
                                        <input type="text" name="designation" class="form-control" id="Designation" placeholder="Designation" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="serialNo">Serial No.</label>
                                        <input type="text" name="serial_no" class="form-control" id="serialNo" placeholder="Serial No" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Part 2 -->
                        <div class="section section-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthlySalary">Monthly Salary<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="number" name="monthly_salary" class="form-control" id="monthlySalary" placeholder="Enter monthly salary" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="hazardRate">Hazard Rate (%)<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="number" name="hazard_rate" class="form-control" id="hazardRate" placeholder="Enter hazard rate" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="grossHazardPay">Gross Hazard Pay</label>
                                        <input type="number" name="gross_hazard_pay" class="form-control" id="grossHazardPay" placeholder="Gross Hazard Pay" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="totalDaysOfActualPay">Total Days of Actual Exposure<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="number" name="total_days" class="form-control" id="totalDaysOfActualPay" placeholder="Enter total days of actual pay" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="actualPay">Actual Hazard Pay</label>
                                        <input type="number" name="actual_hazard_pay" class="form-control" id="actualPay" placeholder="Actual Hazard Pay" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="adjustment">Adjustment<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="text" name="adjustment" class="form-control" id="adjustment" placeholder="Enter adjustment" autocomplete="off">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="netHazardPay">Net Hazard Pay</label>
                                        <input type="number" name="net_hazard_pay" class="form-control" id="netHazardPay" placeholder="Enter Adjustment to display Net Hazard Pay" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">Rate<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="text" name="rate" class="form-control" id="rate" placeholder="Rate" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="withholdingTax">Withholding Tax</label>
                                        <input type="number" name="withholding_tax" class="form-control" id="withholdingTax" placeholder="Withholding Tax" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="dempco">DEMPCO<span style="color: red; font-weight: bold;">*</span></label>
                                        <input type="number" name="dempco" class="form-control"
                                            id="dempco" placeholder="Enter DEMPCO" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="totalDeduction">Total Deduction</label>
                                        <input type="number" name="total_deductions" class="form-control" id="totalDeduction" placeholder="Enter DEMPCO to display Total Deduction" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="netAmountDue">Net Amount Due</label>
                                        <input type="number" name="net_amount_due" class="form-control" id="netAmountDue" placeholder="Net Amount Due" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-dark" id="prevBtn" style="display: none;">Previous</button>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <button type="submit" class="btn btn-success" id="saveBtn" style="display: none;">Save</button>
                                    <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

@include('components.form')
@include('components.createscript')
</body>
</html>
