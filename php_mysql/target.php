<?php
if($_SERVER["REQUEST_METHOD"]=="POST" ){
    $ID=$_POST["ID"];
    $FN=$_POST["FirstName"];
    $LN=$_POST["LastName"];
    $Age=$_POST["Age"];

    
    try{
        $conn=new PDO("mysql:host=localhost;dbname=php","root","imadimad");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt=$conn->prepare("insert into person values(:id,:fn,:ln,:age)");
        $stmt->bindParam(':id',$ID);
        $stmt->bindParam(':fn',$FN);
        $stmt->bindParam(':ln',$LN);
        $stmt->bindParam(':age',$Age);

        $stmt->execute();
        $conn=NULL;
        
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

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
    <a href="form.php"><button>Add</button></a>
    
    <table>
    <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Delete</th>
          <th>Edit</th>
    </tr>
        <?php
        try{
        $conn=new PDO("mysql:host=localhost;dbname=php","root","imadimad");
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $result=$conn->query("select * from person");
            while($data=$result->fetch()){
                echo"<tr>";
                echo "<td>".$data["ID"]."</td>";
                echo "<td>".$data["FIRST_NAME"]."</td>";
                echo "<td>".$data["LAST_NAME"]."</td>";
                echo "<td>".$data["AGE"]."</td>";
                echo "<td>
                <form method='POST' action='delete.php' onsubmit=\"return confirm('Are you sure you want to delete this record?');\">
                <input type='hidden' name='ID' value=".$data["ID"].">
                <button type='submit'>Delete</button>
                </form>
                </td>";
                echo "<td>
                <form method='GET' action='edit.php'>
                <input type='hidden' name='ID' value=".$data["ID"].">
                <input type='hidden' name='FirstName' value=".$data["FIRST_NAME"].">
                <input type='hidden' name='LastName' value=".$data["LAST_NAME"].">
                <input type='hidden' name='Age' value=".$data["AGE"].">
                <button type='submit'>Edit</button>
                </form>
                </td>";
                echo"</tr>";
            }
        }

        catch(PDOException $e){
            echo $e->getMessage();
        }
        
        
    
    
    ?>
    </table>
</body>
</html>