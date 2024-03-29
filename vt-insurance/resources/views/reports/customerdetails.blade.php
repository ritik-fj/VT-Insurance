<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Customers PDF</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Heading styles */
        h1 {
            text-align: center;
            margin-top: 0px;
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .footer {
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            font-size: 10px;

        }

        th {
            font-weight: bold;
            text-align: left;
        }

        /* Table header styles */
        thead {
            background-color: #f2f2f2;
        }

        /* Table body styles */
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Link styles */
        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <h1>VT Insurance</h1>
    <h2>Customer Report</h2>
    <hr>
    <h3>Customer Information</h3>
    <p>
        First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $customers->fname }} <br>
        Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $customers->lname }} <br>
        Date of Birth:&nbsp;&nbsp;&nbsp;&nbsp;{{ $customers->dob }} <br>
        Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $customers->address }}
        <br>
        Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $customers->email }}
        <br>
        Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $customers->phone }}
    </p>

    <hr>

    <h3>Customer's Policies</h3>
    @if ($policies->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Policy ID</th>
                    <th>Policy Type</th>
                    <th>Coverage Amount</th>
                    <th>Premium Amount</th>
                    <th>Excess Amount</th>
                    <th>Policy Duration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($policies as $policy)
                    <tr>
                        <td>{{ $policy->id }}</td>
                        <td>{{ $policy->policy_type }}</td>
                        <td>${{ $policy->coverage_amount }}</td>
                        <td>${{ $policy->premium_amount }}</td>
                        <td>${{ $policy->excess_amount }}</td>
                        <td>{{ $policy->policy_duration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Total Coverage Amount: ${{ $totalCoverageAmount }}</strong></p>
        <p><strong>Total Excess Amount: ${{ $totalExcessAmount }}</strong></p>
        <p><strong>Total Premium Amount(Without Discount): ${{ $totalPremiumAmount }}</strong></p>
        <p><strong>Total Premium Amount(With Discount): ${{ $discountedpremium }}</strong></p>
    @else
        <p>No policies found for this customer.</p>
    @endif

    <hr>
    <h3>Customer Payments</h3>
    @if ($payments->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Policy ID</th>
                    <th>Amount Paid</th>
                    <th>Payment Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->policy_id }}</td>
                        <td>${{ $payment->amount_paid }}</td>
                        <td>{{ $payment->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <strong>Remaining Balance: ${{ $balance }}</strong>
    @else
        <p>There are no payments made by this customer.</p>
    @endif
    <hr>

    <h3>Customer's Claims</h3>
    @if ($claims->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Claim ID</th>
                    <th>Claim Type</th>
                    <th>Claim Amount</th>
                    <th>Claim Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($claims as $claim)
                    <tr>
                        <td>{{ $claim->id }}</td>
                        <td>{{ $claim->claim_type }}</td>
                        <td>${{ $claim->claim_amount }}</td>
                        <td>{{ $claim->created_at }}</td>
                        <td>{{ $claim->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>There are no claims made by this customer.</p>
    @endif

    <br>

    <hr>
    <div class="footer">
        <h1 class="display-6 text-center"><small>Contact Us</small> </h1>
        <p class="lead text-center" style="font-size: 15px;"><small>Address: Kaunikuila House,
                <br> Laucala Bay Road,, Honson St, Suva
                <br> <br> Phone: (+679) 999-9999<br>Email: info@vtinsurance.com.fj</small>
        </p>
    </div>
</body>

</html>
