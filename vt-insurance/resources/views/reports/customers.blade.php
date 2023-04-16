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
            margin-top: 30px;
            margin-bottom: 30px;
            font-size: 36px;
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
    <hr>
    <h3>Customers Report</h3>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date Of Birth</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->customer_fname }}</td>
                    <td>{{ $customer->customer_lname }}</td>
                    <td>{{ $customer->customer_dob }}</td>
                    <td>{{ $customer->customer_address }}</td>
                    <td>{{ $customer->customer_email }}</td>
                    <td>{{ $customer->customer_phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <div>
        <h1 class="display-6 text-center"><small>Contact Us</small> </h1>
        <p class="lead text-center" style="font-size: 15px;"><small>Address: Kaunikuila House,
                <br> Laucala Bay Road,, Honson St, Suva
                <br> <br> Phone: (+679) 999-9999<br>Email: info@vtinsurance.com.fj</small>
        </p>
    </div>
</body>

</html>
