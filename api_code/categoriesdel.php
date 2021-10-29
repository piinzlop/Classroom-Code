<?php 

    include_once('func1.php');

    if (isset($_GET['del'])) {
        $userid = $_GET['del'];
        $deletedata = new DB_cate();
        $sql = $deletedata->delete($userid);

        if ($sql) {
            echo "<script>alert('Record Deleted Successfully!');</script>";
            echo "<script>window.location.href='categories.php'</script>";
        }
    }

?>