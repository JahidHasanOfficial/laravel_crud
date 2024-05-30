<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Invoice</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-box {
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            max-width: 800px;
            margin: auto;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="row">
            <div class="col-6">
                <h2>Company Name</h2>
                <p>
                    1234 Main St.<br>
                    Springfield, IL 62704<br>
                    (555) 555-5555
                </p>
            </div>
            <div class="col-6 text-right">
                <h4>Invoice #12345</h4>
                <p>
                    Date: 2024-05-30<br>
                    Due Date: 2024-06-15
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h5>Bill To:</h5>
                <p>
                    John Doe<br>
                    5678 Elm St.<br>
                    Springfield, IL 62704
                </p>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Product 1</td>
                    <td>2</td>
                    <td>$10.00</td>
                    <td>$20.00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Product 2</td>
                    <td>1</td>
                    <td>$15.00</td>
                    <td>$15.00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Product 3</td>
                    <td>3</td>
                    <td>$7.00</td>
                    <td>$21.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Subtotal</th>
                    <th>$56.00</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Tax (10%)</th>
                    <th>$5.60</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <th>$61.60</th>
                </tr>
            </tfoot>
        </table>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <p>Thank you for your business!</p>
            </div>
        </div>
    </div>
</body>
</html>
