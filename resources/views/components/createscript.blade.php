<script>
$(document).ready(function() {
    // Bind the input event to the fields that trigger calculations
    $('#monthlySalary, #hazardRate, #totalDaysOfActualPay, #adjustment, #rate, #dempco').on('input', calculateFields);
});

function calculateFields() {
    var monthlySalary = parseFloat($('#monthlySalary').val());
    var hazardRate = parseFloat($('#hazardRate').val());
    var totalDaysOfActualPay = parseFloat($('#totalDaysOfActualPay').val());
    var adjustment = parseFloat($('#adjustment').val());
    var rate = parseFloat($('#rate').val());
    var dempco = parseFloat($('#dempco').val());

    // Calculate Gross Hazard Pay
    if (!isNaN(monthlySalary) && !isNaN(hazardRate)) {
        var grossHazardPay = (monthlySalary * hazardRate) / 100;
        $('#grossHazardPay').val(grossHazardPay.toFixed(2));
    } else {
        $('#grossHazardPay').val('');
    }

    // Calculate Actual Hazard Pay
    if (!isNaN(grossHazardPay) && !isNaN(totalDaysOfActualPay)) {
        var actualHazardPay = (grossHazardPay / 22) * totalDaysOfActualPay;
        $('#actualPay').val(actualHazardPay.toFixed(2));
    } else {
        $('#actualPay').val('');
    }

    // Calculate Net Hazard Pay
    if (!isNaN(actualHazardPay) && !isNaN(adjustment)) {
        var netHazardPay = actualHazardPay - adjustment;
        $('#netHazardPay').val(netHazardPay.toFixed(2));
    } else {
        $('#netHazardPay').val('');
    }

    // Calculate Withholding Tax
    if (!isNaN(netHazardPay) && !isNaN(rate)) {
        var withholdingTax = netHazardPay * rate;
        $('#withholdingTax').val(withholdingTax.toFixed(2));
    } else {
        $('#withholdingTax').val('');
    }

    // Calculate Total Deduction
    if (!isNaN(withholdingTax) && !isNaN(dempco)) {
        var totalDeduction = withholdingTax + dempco;
        $('#totalDeduction').val(totalDeduction.toFixed(2));
    } else {
        $('#totalDeduction').val('');
    }

    // Calculate Net Amount Due
    if (!isNaN(actualHazardPay) && !isNaN(adjustment) && !isNaN(rate) && !isNaN(dempco)) {
        var netAmountDue = netHazardPay - totalDeduction;
        $('#netAmountDue').val(netAmountDue.toFixed(2));
    } else {
        $('#netAmountDue').val('');
    }
}
</script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".js-example-theme-single").select2({
        theme: "classic",
        minimumInputLength: 1 // Set the minimum input length required to trigger the search and display options
        });
    </script>

<script>
function SelectedEmployee() {
    var empName = document.getElementById("Name").value;
    var employeeNoInput = document.getElementById("employee_No");

    var selectedEmployee = {!! json_encode($employees) !!}.find(function(employee) {
        return employee.name === empName;
    });

    if (selectedEmployee) {
        document.getElementById("Designation").value = selectedEmployee.designation;
        employeeNoInput.value = selectedEmployee.employee_no;
    } else {
        document.getElementById("Designation").value = "";
        employeeNoInput.value = "";
    }
}
</script>


<!--<script>
    // If the EmployeeNo is dropdown

function SelectedEmployee() {
    var empName = document.getElementById("Name").value;
    var employeeNoDropdown = document.getElementById("employee_No");

    var selectedEmployee = {!! json_encode($employees) !!}.find(function(employee) {
        return employee.name === empName;
    });

    // Clear previous options
    employeeNoDropdown.innerHTML = "";

    if (selectedEmployee) {
        document.getElementById("Designation").value = selectedEmployee.designation;

        // Create and append the option for employee_no
        var option = document.createElement("option");
        option.value = selectedEmployee.employee_no;
        option.text = selectedEmployee.employee_no;
        employeeNoDropdown.add(option);
    } else {
        document.getElementById("designation").value = "";
    }
}
</script>-->