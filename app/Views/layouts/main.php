<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceBuddy</title>
    <link rel="stylesheet" href="/financebuddy/public/assets/css/style.css"> <!-- Link to your CSS -->
</head>

<body>
    <header>
        <h1>FinanceBuddy</h1>
        <nav>
            <a href="/financebuddy/home">Home</a>
            <a href="/financebuddy/about">About</a>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <p>&copy; <?= date('Y') ?> FinanceBuddy. All rights reserved.</p>
    </footer>
</body>

</html>