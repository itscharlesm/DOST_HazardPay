<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
    @include('components.table')
    <title>DOST - Payroll</title>
</head>
<body>
        <div class="page-heading">
            <p style="color:black; position:relative; left:300px; top: 5px;  font-weight: bold;  font-size: 13px;">GENERAL PAYROLL FOR HAZARD PAY<span style="color:black; position:relative; left:500px; font-size: 11px;">Payroll No.</span></p>
            <p style="color:black; position:relative; left:350px; font-size: 11px;">For the period: {{ $payrolls[0]->select_period ?? '' }} {{ date('Y') }}<span style="color:black; position:relative; left: 590px; font-size: 11px;">Sheet 1 of 2</span></p>
            <p style="color:black; position:relative; left:20px; top: 9px; font-size: 9px;">We  acknowledge receipt of cash shown opposite our name as full compensation for services rendered for the period covered.</p>
                     
                <!-- Bordered table start -->
                <table class="tg">
                <thead>
                <tr>
                    <th class="tg-c3ow" rowspan="2" style="font-size: 9px; color:black; text-align: center;">SERIAL<br>NO</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">NAME</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">DESIGNATION</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Employee<br>No.</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Monthly<br>Salary</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Hazard<br>Rate</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Gross<br>Hazard<br>Pay</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Total Days<br>of Actual<br>Exposure</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Actual<br>Hazard Pay</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Adjustment</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Net Hazard<br>Pay</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Rate</th>
                    <th class="tg-9wq8" colspan="3" style="text-align: center;">D E D U C T I O N S</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Net Amount <br>Due</th>
                    <th class="tg-9wq8" rowspan="2" style="font-size: 9px; color:black; text-align: center;">Signature<br>of<br>Recepient</th>
                    <th class="tg-9wq8" rowspan="2"></th>
                </tr>
                <tr>
                    <th class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">Withholding<br>Tax</th>
                    <th class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">DEMPCO</th>
                    <th class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">Total<br>Deductions</th>
                </tr>
                </thead>
                    <tbody>
                    @foreach($payrolls as $index => $payroll)
                        <tr>
                        <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $index + 1 }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->name }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->designation }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->employee_no }}</td>
                            <td class="tg-9wq8" id="calc_monthly_salary" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->monthly_salary, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->hazard_rate }}</td>
                            <td class="tg-9wq8" id="calc_gross_hazard_pay" style="font-size: 9px; color:black; text-align: center;">
                                  {{ number_format($payroll->gross_hazard_pay, 2, '.', ',') }}
                              </td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->total_days }}</td>
                            <td class="tg-9wq8" id="calc_actual_hazard_pay" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->actual_hazard_pay, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" id="calc_adjustment" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->adjustment }}</td>
                            <td class="tg-9wq8" id="calc_net_hazard_pay" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->net_hazard_pay, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $payroll->rate }}</td>
                            <td class="tg-9wq8" id="calc_withholding_tax" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->withholding_tax, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" id="calc_dempco" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->dempco, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" id="calc_total_deductions" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->total_deductions, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" id="calc_net_amount_due" style="font-size: 9px; color:black; text-align: center;">
                                {{ number_format($payroll->net_amount_due, 2, '.', ',') }}
                            </td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;">{{ $index + 1 }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                        </tr>
                        <tr>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;">TOTAL</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                            <td class="tg-9wq8" for="monthly_salary" style="font-size: 9px; color:black; font-weight: bold;">{{ $monthlySalaryTotal }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                            <td class="tg-9wq8" for="gross_hazard_pay" style="font-size: 9px; color:black; font-weight: bold;">{{ $grossHazardPayTotal }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                            <td class="tg-9wq8" for="actual_hazard_pay" style="font-size: 9px; color:black; font-weight: bold;">{{ $actualHazardPayTotal }}</td>
                            <td class="tg-9wq8" for="adjustment" style="font-size: 9px; color:black; font-weight: bold; text-align: center;">{{ $adjustmentTotal }}</td>
                            <td class="tg-9wq8" for="net_hazard_pay" style="font-size: 9px; color:black; font-weight: bold;">{{ $netHazardPayTotal }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                            <td class="tg-9wq8" for="withholding_tax" style="font-size: 9px; color:black; font-weight: bold;">{{ $withholdingTaxTotal }}</td>
                            <td class="tg-9wq8" for="dempco" style="font-size: 9px; color:black; font-weight: bold;">{{ $dempcoTotal }}</td>
                            <td class="tg-9wq8" for="total_deductions" style="font-size: 9px; color:black; font-weight: bold;">{{ $totalDeductions }}</td>
                            <td class="tg-9wq8" for="net_amount_due" style="font-size: 9px; color:black; font-weight: bold; text-align: center">{{ $netAmountDueTotal }}</td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; font-weight: bold;"></td>
                        </tr>
                        <tr>
                            <td class="tg-0pky" colspan="6" rowspan="2" style="font-size: 9px; color:black;">A. CERTIFIED: Services duly rendered as stated<br><br>
                            <span style="position:relative; left:30px;">____________________________________</span>
                                <span style="position:relative; left:97px;">__________</span> <br>
                                <span style="position:relative; left:295px;">Date</span>
                            </td>
                            <td class="tg-lboi" colspan="10" style="font-size: 9px; color:black;">C: APPROVED FOR PAYMENT:
                                <span style="font-weight:bold; position:relative; left:273px;">__________________________________________</span>
                                <span style="font-weight:bold;text-decoration:underline; position:relative; left:272px;">{{ $netAmountDueTotal }}</span><br>
                                <span style="font-weight:bold; position:relative; left:220px;">{{ convertNumber($netAmountDueTotal) }}</span>
                            </td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                        </tr>
                        <tr>
                            <td class="tg-lboi" colspan="10" style="font-size: 9px; color:black;">
                                <span style="position:relative; left:550px;">____________</span> <br>
                                <span style="position:relative; left:160px;">____________________________________________</span>
                                <span style="position:relative; left:348px;">Date</span> <br>
                                <span style="position:relative; left:237px;">Regional Director</span>
                            </td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black;"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                        </tr>
                        <tr>
                            <td class="tg-lboi" colspan="6" style="font-size: 9px; color:black;">B.CERTIFIED: Supporting documents complete and proper; and cash<br>available in the amount of ____________________________<br><br>
                                <span style="position:relative; left:30px;">____________________________________</span>
                                <span style="position:relative; left:97px;">__________</span> <br>
                                <span style="position:relative; left:295px;">Date</span>
                            </td>
                            <td class="tg-0pky" colspan="8" style="font-size: 9px; color:black;">D. CERTIFIED: Each employee whose name appears on the payroll<br>has been paid in the amount as indicated opposite his/her name<br><br>
                                <span style="position:relative; left:120px;">__________________________________</span>
                                <span style="position:relative; left:200px;">____________</span><br>
                                <span style="position:relative; left:393px;">Date</span>
                            </td>
                            <td class="tg-0pky" colspan="2" style="font-size: 9px; color:black;">E: <br>ORS/BURS No.:<br>Date: <br>JEV No.:<br>Date:<br></td>
                            <td class="tg-9wq8"></td>
                            <td class="tg-9wq8" style="font-size: 9px; color:black; text-align: center;"></td>
                        </tr>
                    </tbody>
                </table>
                <!-- Bordered table end -->                
            </div>
        </div>
    </div>

    @php
        function convertNumber($num = false)
        {
            $num = str_replace(array(',', ''), '' , trim($num));
            if (! $num) {
                return false;
            }
            $num_parts = explode('.', $num);

            $integer_part = (int) $num_parts[0];
            $decimal_part = isset($num_parts[1]) ? (int) $num_parts[1] : 0;

            $words = array(
                convertInteger($integer_part),
                convertDecimal($decimal_part),
            );

            return implode(' ', $words);
        }

        function convertInteger($num)
        {
            $words = array();
            $list1 = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven',
                'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
            );
            $list2 = array('', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety', 'Hundred');
            $list3 = array('', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion', 'Sextillion', 'Septillion',
                'Octillion', 'Nonillion', 'Decillion', 'Undecillion', 'Duodecillion', 'Tredecillion', 'Quattuordecillion',
                'Quindecillion', 'Sexdecillion', 'Septendecillion', 'Octodecillion', 'Novemdecillion', 'Vigintillion'
            );

            $num_length = strlen($num);
            $levels = (int) (($num_length + 2) / 3);
            $max_length = $levels * 3;
            $num = substr('00' . $num, -$max_length);
            $num_levels = str_split($num, 3);

            for ($i = 0; $i < count($num_levels); $i++) {
                $levels--;
                $hundreds = (int) ($num_levels[$i] / 100);
                $hundreds = ($hundreds ? $list1[$hundreds] . ' hundred' . ($hundreds == 1 ? '' : '') . ' ' : '');
                $tens = (int) ($num_levels[$i] % 100);
                $singles = '';

                if ($tens < 20) {
                    $tens = ($tens ? $list1[$tens] . ' ' : '');
                } elseif ($tens >= 20) {
                    $tens = (int)($tens / 10);
                    $tens = $list2[$tens] . ' ';
                    $singles = (int) ($num_levels[$i] % 10);
                    $singles = $list1[$singles] . ' ';
                }

                $words[] = $hundreds . $tens . $singles . (($levels && (int)($num_levels[$i])) ? $list3[$levels] . ' ' : '');
            }

            return ucwords(strtolower(implode(' ', $words))); // Convert to title case
        }

        function convertDecimal($num)
        {
            $words = array();

            if ($num > 0) {
                $words[] = 'and';
                $words[] = convertInteger($num);
                $words[] = 'Centavos';
            }

            return implode(' ', $words);
        }
    @endphp

    
</body>
</html>