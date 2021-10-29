<?php
    require_once('connection.php');

    if(isset($_REQUEST['btn_insert'])) {
        $name = $_REQUEST['txt_name'];
        $phone = $_REQUEST['txt_phone'];
        $email = $_REQUEST['txt_email'];

        if (empty($name)) {
            $errorMsg = "Please Enter Firstname";
        } else if (empty($phone)) {
            $errorMsg = "Please Enter lastname";
        } else if (empty($email)) {
            $errorMsg = "Please Enter lastname";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO mytable(name, phone, email) VALUES (:name, :phone, :email)");
                    $insert_stmt->bindParam(':name', $name);
                    $insert_stmt->bindParam(':phone', $phone);
                    $insert_stmt->bindParam(':email', $email);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;index.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>
    <div class="container">
    <div class="display-3 text-center">Add +</div>

    <?php
        if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong> 
        </div>
    <?php } ?>

    <?php
        if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong> 
        </div> 
    <?php } ?>

    <form method="post" class="form-horizontal">

            <div class="form-group">   
               <div class="row">
               <label for="name" class="col-sm-3 control-lable">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_name" class="form-control" placeholder="Enter Firstname...">
                </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label for="phone" class="col-sm-3 control-lable">Phone</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_phone" class="form-control" placeholder="Enter Lastname...">
                </div>
                </div>
            <div class="form-group">
                <div class="row">
                <label for="email" class="col-sm-3 control-lable">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="txt_email" class="form-control" placeholder="Enter Lastname...">
                </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>

    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>