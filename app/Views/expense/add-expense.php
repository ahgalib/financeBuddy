<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, rgb(30, 127, 224), #00c853);
          
            /* Light blue background */
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center mb-4">Add New Expense</h2>
            <form action="/financebuddy/save-expense" method="POST">
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="Food">Food</option>
                        <option value="Rent">Rent</option>
                        <option value="Utilities">Utilities</option>
                        <option value="Travel">Travel</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <input type="checkbox" id="recurring" name="recurring">
                    <label for="recurring">Make this a recurring expense</label>
                </div>
                <div id="recurring-options" style="display: none;">
                    <div class="mb-3">
                        <label for="frequency" class="form-label">Frequency</label>
                        <select class="form-control" id="frequency" name="frequency">
                            <option value="daily">Daily</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Expense</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('recurring').addEventListener('change', function() {
            const recurringOptions = document.getElementById('recurring-options');
            recurringOptions.style.display = this.checked ? 'block' : 'none';
        });
    </script>
</body>

</html>