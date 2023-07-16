<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Cetak Kwitansi</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5d6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5d6975;
            border-bottom: 1px solid #5d6975;
            color: #5d6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5d6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #f5f5f5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5d6975;
            border-bottom: 1px solid #c1ced9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5d6975;
        }

        #notices .notice {
            color: #5d6975;
            font-size: 1.2em;
        }

        footer {
            color: #5d6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #c1ced9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ asset('image/havenbook.png') }}" />
        </div>
        <h1>INVOICE</h1>
        <div id="company" class="clearfix">
            <div>the Haven Book</div>
            {{-- <div>
                455 Foggy Heights,<br />
                AZ 85004, US
            </div>
            <div>(602) 519-0450</div>
            <div><a href="mailto:company@example.com">company@example.com</a></div> --}}
        </div>
        <div id="project">
            <div><span>INVOICE NUMBER</span> <br>{{ $invoice->invoice_number }}</div>
            <div><span>PROJECT</span> Book Rents</div>
            <div><span>ADMIN</span>{{ $invoice->transaction->admin->name }}</div>
            <div>
                <span>EMAIL</span>
                <a href="mailto:{{ $invoice->transaction->admin->email }}">{{ $invoice->transaction->admin->email }}</a>
            </div>
            <div><span>DATE</span> {{ now() }}</div>
        </div>
    </header>
    <main style="min-height: 100%">
        <table>
            <thead>
                <tr>
                    <th class="service">#</th>
                    <th class="desc">Title</th>
                    <th>PRICE</th>
                    <th>Due Date</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">Book</td>
                    <td class="desc">
                        {{ $invoice->transaction->book->title }}
                    </td>
                    <td class="unit">Rp {{ number_format($invoice->transaction->book->price) }}</td>
                    <td class="qty">{{ $invoice->transaction->months }}</td>
                    <td class="total">Rp {{ number_format($invoice->transaction->book->price * $invoice->transaction->months, 2, ',', '.') }}</td>
                </tr>

            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">
                A finance charge of 1.5% will be made on unpaid balances after 30
                days.
            </div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and
        seal.
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print()
        });
    </script>
</body>

</html>
