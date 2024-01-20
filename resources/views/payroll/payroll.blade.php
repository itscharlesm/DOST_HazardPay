<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    @include('components.dashboard')
    @include('components.payrollscript')
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

    <div id="page-wrapper">
        <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>GENERAL PAYROLL FOR HAZARD PAY</h3>
                           
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
                                    <a class="btn btn-success btn-sm" href="/create-payroll" style="position:relative; left:16px;"><i class="fa fa-plus"></i> Create Record</a>
                                    <a class="btn btn-primary btn-sm" style="position:relative; left:16px;" onclick="handleDropdownView()"><i class="fa fa-eye"></i> View</a>
                                    <a class="btn btn-warning btn-sm" style="position:relative; left:16px;" onclick="handleDropdownDownload()"><i class="fa fa-download"></i> Download</a>
                                    </div>
                                    <br>
                                    <div style="display: flex; align-items: center;">
                                    <p style="position:relative; left:5px; top: 6px"> &nbsp; For period: </p>
                                        <select id="period-dropdown" style="position:relative; left:10px;" onchange="handleDropdownSelection()">
                                            <option value="Period">All</option>
                                            <option value="January">January 2023</option>
                                            <option value="February">February 2023</option>
                                            <option value="March">March 2023</option>
                                            <option value="April">April 2023</option>
                                            <option value="May">May 2023</option>
                                            <option value="June">June 2023</option>
                                            <option value="July">July 2023</option>
                                            <option value="August">August 2023</option>
                                            <option value="September">September 2023</option>
                                            <option value="October">October 2023</option>
                                            <option value="November">November 2023</option>
                                            <option value="December">December 2023</option>
                                        </select>
                                        <input type="text" id="searchPayroll" class="form-control" placeholder="&#x1F50D; Search" style="width: 250px; position:relative; left:840px;">
                                    </div>
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
                                                    <th style="text-align:center">PERIOD</th>
                                                    <th style="text-align:center">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($payrolls as $payroll)
                                                <tr data-period="{{ $payroll->select_period }}">
                                                    <td style="text-align:center">{{ $payroll->serial_no }}</td>
                                                    <td style="text-align:center">{{ $payroll->name }}</td>
                                                    <td style="text-align:center">{{ $payroll->designation }}</td>
                                                    <td style="text-align:center">{{ $payroll->employee_no }}</td>
                                                    <td style="text-align:center">{{ $payroll->select_period }}</td>
                                                    <td style="text-align:center">
                                                        <button class="btn btn-primary btn-sm view-btn" 
                                                            data-toggle="modal" 
                                                            data-target="#viewModal" 
                                                            data-serial="{{ $payroll->serial_no }}"
                                                            data-name="{{ $payroll->name }}"
                                                            data-designation="{{ $payroll->designation }}"
                                                            data-employee="{{ $payroll->employee_no }}"
                                                            data-monthly-salary="{{ $payroll->monthly_salary }}"
                                                            data-gross-hazard-pay="{{ $payroll->gross_hazard_pay }}"
                                                            data-total-days="{{ $payroll->total_days }}"
                                                            data-actual-hazard-pay="{{ $payroll->actual_hazard_pay }}"
                                                            data-adjustment="{{ $payroll->adjustment }}"
                                                            data-net-hazard-pay="{{ $payroll->net_hazard_pay }}"
                                                            data-rate="{{ $payroll->rate }}"
                                                            data-withholding-tax="{{ $payroll->withholding_tax }}"
                                                            data-dempco="{{ $payroll->dempco }}"
                                                            data-total-deductions="{{ $payroll->total_deductions }}"
                                                            data-net-amount-due="{{ $payroll->net_amount_due }}"
                                                            data-period="{{ $payroll->select_period }}">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                        <a class="btn btn-warning btn-sm" href="{{ route('payroll.edit', ['serial_no' => $payroll->serial_no]) }}"><i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-danger btn-sm" href="/payroll/{{ $payroll->serial_no }}" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this payroll record?')) document.getElementById('delete-form-{{ $payroll->serial_no }}').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $payroll->serial_no }}" action="/payroll/{{ $payroll->serial_no }}" method="POST" style="display: none;">
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
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Payroll Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- Display specific data here -->
            </div>
        </div>
    </div>
</div>





@include('components.payrollscript')

</body>
</html>