<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />

    <!-- Invoice styling -->
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {

            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr>
                        <td class="title">
                            <img src="./images/logo-red-1.svg" alt="Company logo" style="width: 100%; max-width: 200px" />
                        </td>

                        <td>
                            Rechnung #: {{$invoiceNumber}}<br />
                            Erstellt am: {{$fullDate}}<br />
                            Period: {{$monthBill}} {{$year}}<br />
                            Due: {{$dueDate}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td>
                            Rahal Gmbh<br />
                            St. Urbanstrasse 79<br />
                            4914 Roggwil<br />

                            PostFinance Ag<br />

                            IBAN: CH48 0900 0000 1556 1356 9<br />
                            Konto: 15-561356-9<br />
                        </td>

                        <td>
                            {{$invoice->getPartner->company}}<br />
                            {{$invoice->getPartner->name}} {{$invoice->getPartner->lastname}}<br />
                            {{$invoice->getPartner->email}}<br />
                            {{$invoice->getPartner->street}} {{$invoice->getPartner->house}}<br />
                            {{$invoice->getPartner->postcode}} {{$invoice->getPartner->city}}<br />

                        </td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr class="heading">
            <td>Leistung</td>
            <td>Anzahl</td>
            <td style="text-align: right;">Preis</td>

        </tr>
		@php $nonTaxTotal = 0; $taxTotal = 0; @endphp
        @foreach($totals as $type_job_id=>$total)
            @if($type_job_id != 'total')
            <tr class="item">
                <td>
                @if($type_job_id == 1)
                        Umzug
                @endif

                @if($type_job_id == 2)
                        Reinigung
                @endif

                @if($type_job_id == 3)
                        Umzug + Reinigung
                @endif

                @if($type_job_id == 4)
                        Maler
                @endif
                </td>
                <td>
                @if($type_job_id == 1)
					@php
						 $costTypeJob = Setting::getByKey('system.price.'.$userSubsId.'.cost_transfer');
						 $tax = round(($costTypeJob/100) * 7.7, 2);
						 $nonTaxPrice = round($costTypeJob + $tax, 2);
   				         $taxTotal = $taxTotal + ($tax * ($total / $costTypeJob));
						 $nonTaxTotal = $nonTaxTotal + (($total / $costTypeJob) * $nonTaxPrice);
					@endphp
                    {{$total / $costTypeJob}} * {{$costTypeJob}} CHF

                @endif

                @if($type_job_id == 2)

					@php
						 $costTypeJob = Setting::getByKey('system.price.'.$userSubsId.'.cost_cleaning');
						 $tax = round(($costTypeJob/100) * 7.7, 2);
						 $nonTaxPrice = round($costTypeJob + $tax, 2);
   				         $taxTotal = $taxTotal + ($tax * ($total / $costTypeJob));
						 $nonTaxTotal = $nonTaxTotal + (($total / $costTypeJob) * $nonTaxPrice);
					@endphp
                    {{$total / $costTypeJob}} * {{$costTypeJob}} CHF
                @endif

                @if($type_job_id == 3)
					@php
						 $costTypeJob = Setting::getByKey('system.price.'.$userSubsId.'.cost_transfer_cleaning');
						 $tax = round(($costTypeJob/100) * 7.7, 2);
						 $nonTaxPrice = round($costTypeJob + $tax, 2);
   				         $taxTotal = $taxTotal + ($tax * ($total / $costTypeJob));
						 $nonTaxTotal = $nonTaxTotal + (($total / $costTypeJob) * $nonTaxPrice);
					@endphp
                    {{$total / $costTypeJob}} * {{$costTypeJob}} CHF
                @endif

                @if($type_job_id == 4)
					@php
						 $costTypeJob = Setting::getByKey('system.price.'.$userSubsId.'.paint_work');
						 $tax = round(($costTypeJob/100) * 7.7, 2);
						 $nonTaxPrice = round($costTypeJob + $tax, 2);
   				         $taxTotal = $taxTotal + ($tax * ($total / $costTypeJob));
						 $nonTaxTotal = $nonTaxTotal + (($total / $costTypeJob) * $nonTaxPrice);
					@endphp
                    {{$total / $costTypeJob}} * {{$costTypeJob}} CHF
                @endif</td>
                <td style="text-align: right;">{{$total / $costTypeJob * $costTypeJob}} CHF</td>
            </tr>
            @endif
        @endforeach
        <tr class="total">
            <td></td>
            <td colspan="2" style="text-align: right;">Zwischensumme {{ $totals['total'] }} CHF</td>
        </tr>
        <tr class="total">
            <td></td>
            <td colspan="2" style="text-align: right;">Umsatzsteuer 7.7%  {{ $taxTotal }} CHF</td>
        </tr>

        <tr class="total">
            <td></td>
            <td colspan="2" style="text-align: right;">Gesamtbetrag {{ $totals['total'] + $taxTotal }} CHF</td>
        </tr>
    </table>
</div>
</body>
</html>
