<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="tab">
        <h3>Registration</h3>
        <form action="cible.php"  method="post">
            <input type=text placeholder="Username"  name="username" required>
            <input type=text placeholder="First Name" name="FN" required>
            <input type=text placeholder="Last Name" name="LN" required>
            <input type=text placeholder="Phone Number (+212)" name="phone" required>
            <input type=password placeholder="Password" name="passwd" required>
            <input type=password placeholder="Confirm Password" name="conf" required>
            <button>submit</button>
        </form>
    </div>
</body>
</html>