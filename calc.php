<style>
    #logo {
        display: none;
    }
</style>

<?php
include "includes/header.php";

include "includes/database.php";


if (isset($_GET['institution'])) {
    $institution = $_GET['institution'];
}
if (isset($_GET['program'])) {
    $program = $_GET['program'];
}
?>
<?php
$query1 = "SELECT * FROM courses WHERE prog_id = '$program' AND period = 'a' ";
$result1 = mysqli_query($connection, $query1);
$list1 = mysqli_fetch_array($result1);

$getProgram = "SELECT * FROM programs WHERE program_id = '$program' ";
$fetchProgram = mysqli_query($connection, $getProgram);
$theProgram = mysqli_fetch_assoc($fetchProgram);

?>
<?php
include "start1.php";
?>
<div id="programName">
    <h2><?php echo strtoupper($theProgram['program_name']); ?></h2>
</div>

<?php

if (!empty($list1)) {
    include "calculators/cwa.php";
} else {
    echo "The Courses for the selected Program is currently unavailable";
}


?>

<?php
include "includes/footer.php";
?>

<script>
    setDat();
    setStartBg();
</script>