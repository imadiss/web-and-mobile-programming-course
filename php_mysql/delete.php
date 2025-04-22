<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        try{
            $conn=new PDO("mysql:host=localhost;dbname=php","root","imadimad");
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $stmt=$conn->prepare("delete from PERSON where ID=:id");
            $stmt->bindParam(":id",$_POST["ID"]);
            $stmt->execute();
            
            header("Location: target.php");
            exit;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    ?>
</body>
</html>