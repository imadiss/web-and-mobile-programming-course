<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="target.php"><button>View Records</button></a>
  <form  action="target.php" method="POST">
    <input name="ID" placeholder="ID" type="text" required>
    <input name="FirstName" placeholder="First Name" type="text" required>
    <input name="LastName" placeholder="Last Name" type="text" required>
    <input name="Age" placeholder="Age" type="text" required>
    <button>submit</button>
  </form>
</body>
</html>