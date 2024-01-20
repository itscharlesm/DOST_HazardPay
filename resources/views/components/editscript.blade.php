<script>
$(document).ready(function() {
    // Bind input event to all relevant fields
    $('#monthlySalary, #hazardRate, #grossHazardPay, #totalDaysOfActualPay, #adjustment, #rate, #dempco').on('input', function() {
        calculateGrossHazardPay();
        calculateActualHazardPay();
        calculateNetHazardPay();
        calculateWithholdingTax();
        calculateTotalDeduction();
        calculateNetAmountDue();
    });

    calculateNetAmountDue(); // Calculate initial netAmountDue
});

function calculateGrossHazardPay() {
    var monthlySalary = parseFloat($('#monthlySalary').val());
    var hazardRate = parseFloat($('#hazardRate').val());

    if (!isNaN(monthlySalary) && !isNaN(hazardRate)) {
        var grossHazardPay = (monthlySalary * hazardRate) / 100;
        $('#grossHazardPay').val(grossHazardPay.toFixed(2));
    } else {
        $('#grossHazardPay').val('');
    }
}

function calculateActualHazardPay() {
    var grossHazardPay = parseFloat($('#grossHazardPay').val());
    var totalDaysOfActualPay = parseFloat($('#totalDaysOfActualPay').val());

    if (!isNaN(grossHazardPay) && !isNaN(totalDaysOfActualPay)) {
        var actualHazardPay = (grossHazardPay / 22) * totalDaysOfActualPay;
        $('#actualPay').val(actualHazardPay.toFixed(2));
    } else {
        $('#actualPay').val('');
    }
}

function calculateNetHazardPay() {
    var actualPay = parseFloat($('#actualPay').val());
    var adjustment = parseFloat($('#adjustment').val());

    if (!isNaN(actualPay) && !isNaN(adjustment)) {
        var netHazardPay = actualPay - adjustment;
        $('#netHazardPay').val(netHazardPay.toFixed(2));
        calculateNetAmountDue(); // Update netAmountDue when netHazardPay changes
    } else {
        $('#netHazardPay').val('');
        $('#netAmountDue').val(''); // Clear netAmountDue when inputs are invalid
    }
}

function calculateWithholdingTax() {
    var netHazardPay = parseFloat($('#netHazardPay').val());
    var rate = parseFloat($('#rate').val());

    if (!isNaN(netHazardPay) && !isNaN(rate)) {
        var withholdingTax = netHazardPay * rate;
        $('#withholdingTax').val(withholdingTax.toFixed(2));
        calculateNetAmountDue(); // Update netAmountDue when withholdingTax changes
    } else {
        $('#withholdingTax').val('');
        $('#netAmountDue').val(''); // Clear netAmountDue when inputs are invalid
    }
}

function calculateTotalDeduction() {
    var withholdingTax = parseFloat($('#withholdingTax').val());
    var dempco = parseFloat($('#dempco').val());

    if (!isNaN(withholdingTax) && !isNaN(dempco)) {
        var totalDeduction = withholdingTax + dempco;
        $('#totalDeduction').val(totalDeduction.toFixed(2));
        calculateNetAmountDue(); // Update netAmountDue when totalDeduction changes
    } else {
        $('#totalDeduction').val('');
        $('#netAmountDue').val(''); // Clear netAmountDue when inputs are invalid
    }
}

function calculateNetAmountDue() {
    var actualPay = parseFloat($('#actualPay').val());
    var adjustment = parseFloat($('#adjustment').val());
    var rate = parseFloat($('#rate').val());
    var dempco = parseFloat($('#dempco').val());

    if (!isNaN(actualPay) && !isNaN(adjustment) && !isNaN(rate) && !isNaN(dempco)) {
        var netHazardPay = actualPay - adjustment;
        var withholdingTax = netHazardPay * rate;
        var totalDeduction = withholdingTax + dempco;
        var netAmountDue = netHazardPay - totalDeduction;
        $('#totalDeduction').val(totalDeduction.toFixed(2)); // Update totalDeduction field
        $('#netAmountDue').val(netAmountDue.toFixed(2));
    } else {
        $('#totalDeduction').val('');
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
    var empName = document.getElementById("name").value;
    var employeeNoInput = document.getElementById("employee_no");

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