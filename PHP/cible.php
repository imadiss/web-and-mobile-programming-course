<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=$_POST["username"];
        $FN=$_POST["FN"];
        $LN=$_POST["LN"];
        $phone=$_POST["phone"];
        $pass=$_POST["passwd"];
        $conf=$_POST["conf"];
        
        $errors=[];
        if( !(preg_match('/.*[A-Z]+.*[a-z]+.*[0-9]+.*[\*\#\_]+/',$pass)) ) $errors["pass"]="Password must contains an upper case, lower<br> case, number and special characters (*_#).";
        if(strlen($pass)<6) $errors["pass"]="Password must contains at least 6 characters.";

        if($conf!==$pass && !(isset($errors["pass"]))) $errors["conf"]="Password cannot be confirmed";

        if(!(preg_match('/^7[0-9]{8}$|^6[0-9]{8}$/',$phone))) $errors["phone"]="Invalid phone number";
    }
?>



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
        <form  method="post">
            <input type=text placeholder="Username"  name="username" value=<?php 
                                                                     if(isset($errors["username"])) echo $errors["username"];
                                                                     else echo"$username";

                                                                    ?> >
            <input type=text placeholder="First Name" name="FN" value=<?php echo "$FN" ?> >
            <input type=text placeholder="Last Name" name="LN" value=<?php echo "$LN" ?> >
            <?php
            if(isset($errors["phone"])) echo"<p>".$errors['phone']."</p>";
            ?>
            <input type=text placeholder="Phone Number (+212)" name="phone" value=<?php echo "$phone" ?> >
            <?php
            if(isset($errors["pass"])) echo"<p>".$errors['pass']."</p>";
            ?>
            <input type=text placeholder="Password" name="passwd" value=<?php echo "$pass" ?> >
            <?php
            if(isset($errors["conf"])) echo"<p>".$errors['conf']."</p>";
            ?>
            <input type=text placeholder="Confirm Password" name="conf" value=<?php echo "$conf" ?> >

            <?php
            if(isset($_FILES["img"])){
                    $image=$_FILES["img"];
                    $myDir = "images/";
                    if (!is_dir($myDir)) {
                        mkdir($myDir);
                    }
                    $targetFile = $myDir.basename($image["name"]);
                    if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                            echo "<img src='$targetFile'>";
                        }
                    }
            ?>
            <button>submit</button>
        </form>
    </div>
</body>
</html>