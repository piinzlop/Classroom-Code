<?php
    require_once('connection.php');

    if(isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM mytable WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $name_up = $_REQUEST['txt_Name'];
        $phone_up = $_REQUEST['txt_Phone'];
        $email_up = $_REQUEST['txt_Email'];

        if (empty($name_up)) {
            $errorMsg = "Please Enter Name";
        } else if (empty($phone_up)) {
            $errorMsg = "Plase Enter Phone";
        } else if (empty($email_up)) {
            $errorMsg = "Plase Enter Email";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE mytable SET name = :Name_up, phone= :Phone_up, email= :Email_up WHERE id = :id");
                    $update_stmt->bindParam(':Name_up', $name_up);
                    $update_stmt->bindParam(':Phone_up', $phone_up);
                    $update_stmt->bindParam(':Email_up', $email_up);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record Update Successfully...";
                        header("refresh:2;index.php");
                    }
                }

            } catch(PDOException $e) {
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
    <div class="display-3 text-center">Edit Page</div>

    <?php
        if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong> 
        </div>
    <?php } ?>

    <?php
        if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $updateMsg; ?></strong> 
        </div> 
    <?php } ?>

    <form method="post" class="form-horizontal">

            <div class="form-group">   
               <div class="row">
               <label for="name" class="col-sm-3 control-lable">Name</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_Name" class="form-control" value="<?php echo $name; ?>">
                </div>
               </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label for="phone" class="col-sm-3 control-lable">Phone</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_Phone" class="form-control" value="<?php echo $phone; ?>">
                </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <label for="email" class="col-sm-3 control-lable">Email</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_Email" class="form-control" value="<?php echo $email; ?>">
                </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>

    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>