<script>
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $(".side-nav .collapse").on("hide.bs.collapse", function() {
                $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
            });
            $('.side-nav .collapse').on("show.bs.collapse", function() {
                $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
            });
        })
         // Function to handle the Admin User dropdown
        function toggleAdminUserDropdown() {
            $('.dropdown-menu.admin-user').toggle();
        }

        // Close the Admin User dropdown when clicking outside
        $(document).on('click', function(e) {
            if ($(e.target).closest(".dropdown").length === 0) {
                $('.dropdown-menu.admin-user').hide();
            }
        });

        $(document).ready(function() {
            $('.view-btn').click(function() {
                var serialNo = $(this).data('serial');
                var name = $(this).data('name');
                var designation = $(this).data('designation');
                var employeeNo = $(this).data('employee');
                var period = $(this).data('period');

                // Update the modal content with the fetched data
                $('#modalContent').html(`
                    <p><strong>Serial No:</strong> ${serialNo}</p>
                    <p><strong>Name:</strong> ${name}</p>
                    <p><strong>Designation:</strong> ${designation}</p>
                    <p><strong>Employee No:</strong> ${employeeNo}</p>
                    <p><strong>Period:</strong> ${period}</p>
                `);
            });
        });

        $(document).ready(function() {
    $('.view-btn').click(function() {
        var serialNo = $(this).data('serial');
        var name = $(this).data('name');
        var designation = $(this).data('designation');
        var employeeNo = $(this).data('employee');
        var monthlySalary = $(this).data('monthly-salary');
        var grossHazardPay = $(this).data('gross-hazard-pay');
        var totalDays = $(this).data('total-days');
        var actualHazardPay = $(this).data('actual-hazard-pay');
        var adjustment = $(this).data('adjustment');
        var netHazardPay = $(this).data('net-hazard-pay');
        var rate = $(this).data('rate');
        var withholdingTax = $(this).data('withholding-tax');
        var dempco = $(this).data('dempco');
        var totalDeductions = $(this).data('total-deductions');
        var netAmountDue = $(this).data('net-amount-due');
        var period = $(this).data('period');

        // Update the modal content with the fetched data
        $('#modalContent').html(`
            <p><strong>Serial No:</strong> ${serialNo}</p>
            <p><strong>Name:</strong> ${name}</p>
            <p><strong>Designation:</strong> ${designation}</p>
            <p><strong>Employee No:</strong> ${employeeNo}</p>
            <p><strong>Monthly Salary:</strong> ${monthlySalary}</p>
            <p><strong>Gross Hazard Pay:</strong> ${grossHazardPay}</p>
            <p><strong>Total Days of Actual Exposure:</strong> ${totalDays}</p>
            <p><strong>Actual Hazard Pay:</strong> ${actualHazardPay}</p>
            <p><strong>Adjustment:</strong> ${adjustment}</p>
            <p><strong>Net Hazard Pay:</strong> ${netHazardPay}</p>
            <p><strong>Rate:</strong> ${rate}</p>
            <p><strong>Withholding Tax:</strong> ${withholdingTax}</p>
            <p><strong>DEMPCO:</strong> ${dempco}</p>
            <p><strong>Total Deductions:</strong> ${totalDeductions}</p>
            <p><strong>Net Amount Due:</strong> ${netAmountDue}</p>
            <p><strong>Period:</strong> ${period}</p>
                `);
            });
        });

    </script>


<script>
    function handleDropdownSelection() {
    var selectedValue = $("#period-dropdown").val();

    // Hide all table rows
    $("#may-table tbody tr").hide();

    // Show table rows based on selected period and search input value
    if (selectedValue === "January") {
        $("#may-table tbody tr[data-period='January']").show();
    } else if (selectedValue === "February") {
        $("#may-table tbody tr[data-period='February']").show();
    } else if (selectedValue === "March") {
        $("#may-table tbody tr[data-period='March']").show();
    } else if (selectedValue === "April") {
        $("#may-table tbody tr[data-period='April']").show();
    } else if (selectedValue === "May") {
        $("#may-table tbody tr[data-period='May']").show();
    } else if (selectedValue === "June") {
        $("#may-table tbody tr[data-period='June']").show();
    } else if (selectedValue === "July") {
        $("#may-table tbody tr[data-period='July']").show();
    } else if (selectedValue === "August") {
        $("#may-table tbody tr[data-period='August']").show();
    } else if (selectedValue === "September") {
        $("#may-table tbody tr[data-period='September']").show();
    } else if (selectedValue === "October") {
        $("#may-table tbody tr[data-period='October']").show();
    } else if (selectedValue === "November") {
        $("#may-table tbody tr[data-period='November']").show();
    } else if (selectedValue === "December") {
        $("#may-table tbody tr[data-period='December']").show();
    } else if (selectedValue === "Period") {
        $("#may-table tbody tr").show();
    }

    // Re-apply the search filter based on the search input value
    searchPayroll();
}
</script>

{{--
<script>
  function handleDropdownSelection() {
    var selectedValue = $("#period-dropdown").val();

    // Show/hide tables based on selected value
    if (selectedValue === "June 2023") {
      $("#january-table").show();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "February 2023") {
      $("#january-table").hide();
      $("#february-table").show();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "March 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").show();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "April 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").show();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "May 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").show();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "June 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").show();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "July 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").show();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "August 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").show();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "September 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").show();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "October 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").show();
      $("#november-table").hide();
      $("#december-table").hide();
    } else if (selectedValue === "November 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").show();
      $("#december-table").hide();
    } else if (selectedValue === "December 2023") {
      $("#january-table").hide();
      $("#february-table").hide();
      $("#march-table").hide();
      $("#april-table").hide();
      $("#may-table").hide();
      $("#june-table").hide();
      $("#july-table").hide();
      $("#august-table").hide();
      $("#september-table").hide();
      $("#october-table").hide();
      $("#november-table").hide();
      $("#december-table").show();
    }
  }
</script> 
--}}

<script>
    function searchPayroll() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchPayroll");
        filter = input.value.toUpperCase();
        table = document.getElementById("payroll-table");
        tr = table.getElementsByTagName("tr");

        var selectedValue = $("#period-dropdown").val();

        for (i = 0; i < tr.length; i++) {
            if (tr[i].getElementsByTagName("td").length > 0) { // Skip the table header row
                td = tr[i].getElementsByTagName("td");
                var found = false;
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break;
                        }
                    }
                }
                if (found && (selectedValue === "Period" || tr[i].getAttribute("data-period") === selectedValue)) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Handle input changes in the search input field
    document.getElementById("searchPayroll").addEventListener("input", searchPayroll);
</script>

<script>
    function handleDropdownView() {
        var selectedValue = $("#period-dropdown").val();

        // Redirect to the appropriate route with the selected period as a query parameter
        if (selectedValue === "Period") {
            window.open("/view", "_blank");
        } else {
            window.open("/view?period=" + selectedValue, "_blank");
        }
    }
</script>

<script>
    function handleDropdownDownload() {
        var selectedValue = $("#period-dropdown").val();

        // Redirect to the appropriate route with the selected period as a query parameter
        if (selectedValue === "Period") {
            window.open("/print", "_blank");
        } else {
            window.open("/print?period=" + selectedValue, "_blank");
        }
    }
</script>


