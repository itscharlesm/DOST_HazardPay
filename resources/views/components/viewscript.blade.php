<script>
  // Get all elements with the ID "calc_monthly_salary"
  var salaryElements = document.querySelectorAll('[id^="calc_monthly_salary"]');
  
  // Calculate the total salary
  var totalSalary = 0;
  for (var i = 0; i < salaryElements.length; i++) {
    totalSalary += parseFloat(salaryElements[i].textContent.replace(',', ''));
  }
  
  // Display the total salary in the "for" attribute
  var monthlySalaryElement = document.querySelector('[for="monthly_salary"]');
  monthlySalaryElement.textContent = totalSalary.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_gross_hazard_pay"
  var hazardPayElements = document.querySelectorAll('[id^="calc_gross_hazard_pay"]');
  
  // Calculate the total hazard pay
  var totalHazardPay = 0;
  for (var i = 0; i < hazardPayElements.length; i++) {
    totalHazardPay += parseFloat(hazardPayElements[i].textContent.replace(',', ''));
  }
  
  // Display the total hazard pay in the "for" attribute
  var grossHazardPayElement = document.querySelector('[for="gross_hazard_pay"]');
  grossHazardPayElement.textContent = totalHazardPay.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_actual_hazard_pay"
  var hazardPayElements = document.querySelectorAll('[id^="calc_actual_hazard_pay"]');
  
  // Calculate the total hazard pay
  var totalHazardPay = 0;
  for (var i = 0; i < hazardPayElements.length; i++) {
    totalHazardPay += parseFloat(hazardPayElements[i].textContent.replace(',', ''));
  }
  
  // Display the total hazard pay in the "for" attribute
  var actualHazardPayElement = document.querySelector('[for="actual_hazard_pay"]');
  actualHazardPayElement.textContent = totalHazardPay.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_net_hazard_pay"
  var netHazardPayElements = document.querySelectorAll('[id^="calc_net_hazard_pay"]');
  
  // Calculate the total net hazard pay
  var totalNetHazardPay = 0;
  for (var i = 0; i < netHazardPayElements.length; i++) {
    totalNetHazardPay += parseFloat(netHazardPayElements[i].textContent.replace(',', ''));
  }
  
  // Display the total net hazard pay in the "for" attribute
  var netHazardPayElement = document.querySelector('[for="net_hazard_pay"]');
  netHazardPayElement.textContent = totalNetHazardPay.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_withholding_tax"
  var withholdingTaxElements = document.querySelectorAll('[id^="calc_withholding_tax"]');
  
  // Calculate the total withholding tax
  var totalWithholdingTax = 0;
  for (var i = 0; i < withholdingTaxElements.length; i++) {
    totalWithholdingTax += parseFloat(withholdingTaxElements[i].textContent.replace(',', ''));
  }
  
  // Display the total withholding tax in the "for" attribute
  var withholdingTaxElement = document.querySelector('[for="withholding_tax"]');
  withholdingTaxElement.textContent = totalWithholdingTax.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_adjustment"
  var adjustmentElements = document.querySelectorAll('[id^="calc_adjustment"]');
  
  // Calculate the total adjustment
  var totalAdjustment = 0;
  for (var i = 0; i < adjustmentElements.length; i++) {
    totalAdjustment += parseFloat(adjustmentElements[i].textContent.replace(',', ''));
  }
  
  // Display the total adjustment in the "for" attribute
  var adjustmentElement = document.querySelector('[for="adjustment"]');
  adjustmentElement.textContent = totalAdjustment.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_dempco"
  var dempcoElements = document.querySelectorAll('[id^="calc_dempco"]');
  
  // Calculate the total dempco
  var totalDempco = 0;
  for (var i = 0; i < dempcoElements.length; i++) {
    totalDempco += parseFloat(dempcoElements[i].textContent.replace(',', ''));
  }
  
  // Display the total dempco in the "for" attribute
  var dempcoElement = document.querySelector('[for="dempco"]');
  dempcoElement.textContent = totalDempco.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_total_deductions"
  var totalDeductionsElements = document.querySelectorAll('[id^="calc_total_deductions"]');
  
  // Calculate the total deductions
  var totalDeductions = 0;
  for (var i = 0; i < totalDeductionsElements.length; i++) {
    totalDeductions += parseFloat(totalDeductionsElements[i].textContent.replace(',', ''));
  }
  
  // Display the total deductions in the "for" attribute
  var totalDeductionsElement = document.querySelector('[for="total_deductions"]');
  totalDeductionsElement.textContent = totalDeductions.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');

  // Get all elements with the ID "calc_net_amount_due"
  var netAmountDueElements = document.querySelectorAll('[id^="calc_net_amount_due"]');
  
  // Calculate the total net amount due
  var totalNetAmountDue = 0;
  for (var i = 0; i < netAmountDueElements.length; i++) {
    totalNetAmountDue += parseFloat(netAmountDueElements[i].textContent.replace(',', ''));
  }
  
  // Display the total net amount due in the "for" attribute
  var netAmountDueElement = document.querySelector('[for="net_amount_due"]');
  netAmountDueElement.textContent = totalNetAmountDue.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
</script>


