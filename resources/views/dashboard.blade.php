    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('components.head')
        @include('components.dashboard')
        <title>DOST XI</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main" >
                    </div>
                    <canvas id="myChart" style="width:100%;max-width:1280px"></canvas>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- Add an empty array to store the count of each month -->
    <!-- Initialize an array to store the count of each month -->
<script>
    var yValues = [2, 0, 6, 1, 2, 10, 0, 2, 1, 6, 1, 4];
</script>

@foreach ($payrolls as $payroll)
    @if (is_array($payroll->select_period))
        @foreach ($payroll->select_period as $month)
            <script>
                @php
                    // Define an array to map month names to their index in xValues
                    $monthIndexMap = [
                        "January" => 0,
                        "February" => 1,
                        "March" => 2,
                        "April" => 3,
                        "May" => 4,
                        "June" => 5,
                        "July" => 6,
                        "August" => 7,
                        "September" => 8,
                        "October" => 9,
                        "November" => 10,
                        "December" => 11,
                    ];

                    // Check if the month is valid
                    if (array_key_exists($month, $monthIndexMap)) {
                        $monthIndex = $monthIndexMap[$month];
                        // Increment the count for the corresponding month
                        echo "yValues[$monthIndex]++;";
                    }
                @endphp
            </script>
        @endforeach
    @endif
@endforeach

<!-- Create a chart to display the month count -->
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [{
                label: 'Month Count',
                data: yValues,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

    </body>
    </html>