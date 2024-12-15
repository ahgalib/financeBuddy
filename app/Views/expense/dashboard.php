<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,rgb(30, 127, 224), #00c853);
            /* Light blue background */
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(147, 147, 3, 0.1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Expense Dashboard</h1>
            <p class="text-muted">Overview of all your expenses</p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Total Expenses</h5>
                    <h2 class="text-primary">$0.00</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Recurring Expenses</h5>
                    <h2 class="text-warning">$0.00</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>One-Time Expenses</h5>
                    <h2 class="text-success">$0.00</h2>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="/financebuddy/add-expense" class="btn btn-primary">Add New Expense</a>
        </div>
    </div>
</body>

</html>