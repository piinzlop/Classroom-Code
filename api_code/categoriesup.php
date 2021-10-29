<?php

include_once('func1.php');

$updatedata = new DB_cate();

if (isset($_POST['update'])) {

    $userid = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $created = $_POST['created'];
    $modified = $_POST['modified'];

    $sql = $updatedata->update($name, $description, $created, $modified, $userid);
    if ($sql) {
        echo "<script>alert('Updated Successfully!');</script>";
        echo "<script>window.location.href='categories.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='categoriesup.php'</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <br><a href="categories.php" class="btn btn-primary">Go back</a>
        <hr>
        <h1 class="mt-5">Update Page</h1><br>
        <?php

        $userid = $_GET['id'];
        $updateuser = new DB_cate();
        $sql = $updateuser->fetchonerecord($userid);
        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="varchar" class="form-control" name="name" 
                    value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" class="form-control" name="description" 
                    value="<?php echo $row['description']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="created">created</label>
                    <input type="datetime" class="form-control" name="created" readonly="readonly" 
                    value="<?php echo $row['created']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="modified">modified</label>
                    <input type="timestamp" class="form-control" name="modified" 
                    value="<?php echo $row['modified']; ?>" required>
                </div>
            <?php } ?>
            <button type="submit" name="update" class="btn btn-success">Update</button>
            </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

</body>

</html>