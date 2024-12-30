<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">FinanceBuddy</h1>
            <p class="text-sm">Edit Your Expense</p>
        </div>
    </header>


    <main class="container mx-auto vh-full px-4 py-6">
        <h2 class="text-xl font-semibold mb-4">Edit Expense</h2>
        <form method="POST" action="/financebuddy/update-expense/<?php echo $expense['id']; ?>">
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium">Category</label>
                <input type="text" id="category_id" name="category_id" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500" value="<?php echo $expense['category_id']; ?>">
            </div>
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium">Amount</label>
                <input type="number" id="amount" name="amount" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500" value="<?php echo $expense['amount']; ?>">
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium">Date</label>
                <input type="date" id="date" name="date" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500" value="<?php echo $expense['date']; ?>">
            </div>
            <div class="mb-4">
                <label for="notes" class="block text-sm font-medium">Notes</label>
                <textarea id="notes" name="notes" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500"><?php echo $expense['notes']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="is_recurring" class="inline-flex items-center">
                    <input type="checkbox" id="is_recurring" name="is_recurring" class="border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500" <?php echo $expense['is_recurring'] ? 'checked' : ''; ?>>
                    <span class="ml-2">Recurring</span>
                </label>
            </div>
            <div class="mb-4">
                <label for="frequency" class="block text-sm font-medium">Frequency</label>
                <input type="text" id="frequency" name="frequency" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500" value="<?php echo $expense['frequency']; ?>">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update Expense</button>
        </form>
    </main>

    <footer class="bg-gray-800 text-gray-400 py-4 mt-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 FinanceBuddy. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>