<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceBuddy - All Expenses</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">FinanceBuddy</h1>
            <p class="text-sm">Manage Your Expenses Efficiently</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto vh-full px-4 py-6">
        <h2 class="text-xl font-semibold mb-4">All Expenses</h2>

        <!-- Filter Section -->
        <div class="mb-6">
            <form method="GET" action="/expenses">
                <div class="flex flex-wrap gap-4 items-center">
                    <div>
                        <label for="date" class="block text-sm font-medium">Date</label>
                        <input type="date" id="date" name="date" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium">Type</label>
                        <select id="type" name="type" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All</option>
                            <option value="one-time">One-Time</option>
                            <option value="recurring">Recurring</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium">Category</label>
                        <input type="text" id="category" name="category" placeholder="e.g., Rent, Food" class="border-gray-300 rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Expenses Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-md">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2 text-left">Date</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Amount</th>
                        <th class="px-4 py-2 text-left">Type</th>
                        <th class="px-4 py-2 text-left">Category</th>
                        <th class="px-4 py-2 text-left">Edit</th>
                        <th class="px-4 py-2 text-left">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample Row (Replace with dynamic PHP loop) -->
                    <?php
                    foreach ($expense_data as $expense) {
                    ?>
                        <tr class="border-b">
                            <td class="px-4 py-2">23 Dec, 2024</td>
                            <td class="px-4 py-2"><?php echo $expense['notes'] ?></td>
                            <td class="px-4 py-2"><?php echo $expense['amount'] ?></td>
                            <td class="px-4 py-2"><?php echo $expense['is_recurring'] == 1 ? 'Recurring' : 'One Time' ?></td>
                            <td class="px-4 py-2">Rent</td>

                            <td class="border px-4 py-2">
                                <a href="/financebuddy/edit-expense/<?php echo $expense['id'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded-md">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="/expenses/delete/1" onsubmit="return confirm('Are you sure you want to delete this expense?');">
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-4 mt-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 FinanceBuddy. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>