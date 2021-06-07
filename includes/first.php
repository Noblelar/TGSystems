<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.1-dist/bootstrap-5.0.1-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.1-dist/bootstrap-5.0.1-dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>

    <form action="" method="get">
        <select data-live-search="true" name="institution" id="" style="width:fit-content;">
            <?php

            $query_institutions = " SELECT * FROM institutions";
            $inst_data = mysqli_query($connection, $query_institutions);

            while ($row = mysqli_fetch_assoc($inst_data)) {
                $id = $row['inst_id'];
                $name = $row['Inst_name'];
                $shortname = $row['short_name'];

                echo "<option value='$id'>  $name </option>";
            }

            echo $num;

            ?>
        </select>

        <?php
                echo "<p>{$id}</p>";

        $queryid = "SELECT course_id FROM courses";
        $totalid = mysqli_query($connection, $queryid);

        // $totalid1 = mysqli_fetch_assoc($totalid);
        $sum = 0;
        while ($totalid1 = mysqli_fetch_assoc($totalid)) {
            $mainid = $totalid1['course_id'];
            $sum += $mainid;
        }
        echo $sum;

        
        ?>
    </form>


</body>

</html>