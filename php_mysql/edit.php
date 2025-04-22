<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $ID=$_GET["ID"];
    $FN=$_GET["FirstName"];
    $LN=$_GET["LastName"];
    $Age=$_GET["Age"];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <input name="ID" type="hidden"  value=<?php echo $ID ?>>
        <label>First Name:</label>
        <input name="FirstName" type="text" value=<?php echo $FN ?>>
        <label>Last Name:</label>
        <input name="LastName" type="text" value=<?php echo $LN ?>>
        <label>Age:</label>
        <input name="Age" type="text" value=<?php echo $Age ?>>
        <button>Edit</button>
    </form>
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        try{
            $conn=new PDO("mysql:host=localhost;dbname=php","root","imadimad");
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $stmt=$conn->prepare("update person set FIRST_NAME=:fn , LAST_NAME=:ln , AGE=:age where ID=:id");
            $stmt->bindParam(':id',$_POST["ID"]);
            $stmt->bindParam(':fn',$_POST["FirstName"]);
            $stmt->bindParam(':ln',$_POST["LastName"]);
            $stmt->bindParam(':age',$_POST["Age"]);
    
            $stmt->execute();
            $conn=NULL;
            header("Location: target.php");
            exit;
            
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>