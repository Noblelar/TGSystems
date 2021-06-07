

<?php /* function createSemTable()
{
    global $connection; */
//include "includes/database.php";

?>
<?php
$getProgress = "SELECT * FROM progress";
$progress = mysqli_query($connection, $getProgress);
?>

<?php foreach ($progress as $stage) {
    $aaa = $stage['rep'];
    $bbb = $stage['description'];
    $year = $stage['year'];
    $sem = $stage['sem'];

?>
    <!-- <form action="" method="post"> -->
    <div id="<?php echo $aaa; ?>" class="tablearea">
        <?php
        $query = "SELECT * FROM courses WHERE prog_id = '$program' AND period = '$aaa' ";
        $queryIt = "SELECT * FROM courses WHERE prog_id = '$program' AND period = '$aaa' ";
        $getIt = mysqli_query($connection, $queryIt);
        $result = mysqli_query($connection, $query);
        $totalCredit = 0;
        $totalWeightedScore = 0;

        $checksArray = mysqli_fetch_array($getIt);


        if (!empty($checksArray)) {
        ?>
            <h3 class="table_head"><?php echo "Year {$year} Semester {$sem}";  ?></h3>
            <table class="table-responsive table-bordered semtable" id="semtable">
                <tr>
                    <th> Course code</th>
                    <th> Course Name </th>
                    <th>Credit Hours</th>
                    <th> Score / Grade </th>
                    <th>Weighted Score</th>
                </tr>

                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                    $course_code = $rows['course_code'];
                    $course_name = $rows['course_name'];
                    $c_hours = $rows['c_hours'];
                    echo "<tr>";
                    echo "<td>" . $course_code . "</td>";
                    echo "<td>" .  $course_name . "</td>";
                    echo "<td class='chours' >" . $c_hours . "</td>";
                    echo "<input type='hidden' name='c_hours' class='c_hours' id='a{$c_hours}'  value='{$c_hours}'>";
                    $course_code1 = strtr($course_code, " ", "_");
                    //echo strtr($course_code, " ", "_");
                ?>
                    <td>
                        <input type="number" max="100" min="0" class="score" name="<?php echo $course_code1; ?>" placeholder="score" value="<?php if (isset($_POST[$course_code1])) {
                                                                                                                                                echo $_POST[$course_code1];
                                                                                                                                            }
                                                                                                                                            ?>">

                        <?php
                        $grade = "";
                        if (isset($_POST[$course_code1]) && $_POST[$course_code1] != "") {
                            switch ($_POST[$course_code1]) {
                                case ($_POST[$course_code1] >= 80 && $_POST[$course_code1] <= 100):
                                    $grade = "A";
                                    break;
                                case ($_POST[$course_code1] >= 70):
                                    $grade = "B";
                                    break;
                                case ($_POST[$course_code1] >= 60):
                                    $grade = "C";
                                    break;
                                case ($_POST[$course_code1] >= 50):
                                    $grade = "D";
                                    break;
                                case ($_POST[$course_code1] < 50):
                                    $grade = "F";
                                    break;
                                default:
                                    $grade = "";
                            }
                        ?>
                            <span class='grade'> </span>;
                        <?php
                        }
                        ?>
                    </td>
                    <td class="weight">
                        <?php
                        // if (isset($_POST[$course_code1])) {
                        //     $weightedScore = intval($c_hours) * intval($_POST[$course_code1]);
                        //     echo $weightedScore;
                        //     $totalWeightedScore += $weightedScore;
                        // }
                        ?>
                    </td>
                <?php
                    echo "</tr>";
                    $totalCredit += $c_hours;
                }
                ?>
                <tr>
                    <th colspan="2"> Totals </th>
                    <td class="totals" style="text-align:center;">
                        <?php echo $totalCredit;
                        ?>
                    </td>
                    <th class="TWS totals" colspan="2">
                        <?php
                        // Space for the total weighted score 
                        ?>
                    </th>
                </tr>

                <tr>
                    <th colspan="3"> Semester Weighted Average </th>
                    <th class="weightedaverage totals" colspan="2">
                        <?php
                        // space for the semester weighted average
                        ?>
                    </th>
                </tr>
                <tr>
                    <th colspan="3"> Cumulated Weighted Average </th>
                    <th class="ccwwaa totals" colspan="3">
                        <?php
                        // space for the semester weighted average
                        ?>
                    </th>
                </tr>


            </table>
            <!-- <input type="submit" name="submit" value="Calc WA" id="submit" onclick="cwa()"> -->
            <button class="calc" id="sub<?php echo $aaa; ?>">Calc CWA</button>
            <!-- <button>Show</button> -->
            <div class="naive">
            </div>
            <!-- <input type="reset" name="reset" value="Reset Score" class="reset"> -->
        <?php } else {
            include_once "includes/unavailable.php";
        }
        ?>
    </div>
    <!-- </form> -->

<?php }
?>
<?php //}  
?>

<script>
    var submit = document.querySelectorAll(".calc");

    var tableArea = document.querySelectorAll(".tablearea");
    var progress = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    console.log(tableArea);
    var table = tableArea[5].getAttribute("id");
    console.log(table);


    // An array to contain the total credit hours for the various semesters
    var cumulativeC_hours = 0;
    var totalSemC_hours = [0, 0, 0, 0, 0, 0, 0, 0];
    // An array to contain the total weighted score for all semesters.
    var cumulativeWeightedScore = 0;
    var totalSemWeightedScore = [0, 0, 0, 0, 0, 0, 0, 0];
</script>

<script>
    //  submit.addEventListener("click", cwa);
</script>
<script>
    for (but = 0; but < submit.length; but++) {
        submit[but].addEventListener('click', function(e) {
            e = e || window.event;
            var target = e.target || e.srcElement,
                text = target.textContent || target.innerText;
            //console.log('crazy');
            var button = target.getAttribute("id");
            var butt = document.getElementById(button);
            var division = butt.parentElement.id;
            console.log(division);

            // Putting in the function

            function cwa() {

                var c_hours = document.querySelectorAll("#" + division + " .c_hours");
                var score = document.querySelectorAll("#" + division + "  .score");
                var weight = document.querySelectorAll("#" + division + "  .weight");
                var weightedAverage = document.querySelector("#" + division + "  .weightedaverage");
                var totalWeightedScore = 0;

                var TWS = document.querySelector("#" + division + " .TWS");
                var ccwwaa = document.querySelector("#" + division + " .ccwwaa");
                var grades = document.querySelectorAll("#" + division + " .grade");


                var totalC_hours = 0;

                // Getting WA
                for (i = 0; i < c_hours.length; i++) {
                    //console.log(c_hours[i].value);
                    totalC_hours += Number(c_hours[i].value);
                    if (score[i].value !== undefined) {
                        weightedScore = Number(c_hours[i].value) * Number(score[i].value);
                        //console.log(weightedScore);
                        weight[i].textContent = weightedScore.toFixed(2);

                        totalWeightedScore += weightedScore;
                        var scorer = Number(score[i].value);
                        var grade = "";

                        if (score[i].value >= 80 && score[i].value <= 100) {
                            grade = "A";
                        } else if (score[i].value >= 70) {
                            grade = "B";
                        } else if (score[i].value >= 60) {
                            grade = "C";
                        } else if (score[i].value >= 50) {
                            grade = "D";
                        } else if (score[i].value < 50) {
                            grade = "F";
                        } else {
                            grade = "";
                        }
                        console.log(grade);

                        //grades[i].textContent = grade;
                    }
                }
                console.log('totalC_hours' + totalC_hours);


                for (yy = 0; yy < tableArea.length; yy++) {
                    var index = progress.indexOf(division);
                    if (index == yy) {
                        console.log(index);
                        console.log(yy);
                        var right = index;
                        //console.log(totalWeightedScore);
                        totalSemC_hours[index] = Number(totalC_hours);
                        console.log(totalSemC_hours);
                        //console.log(typeof(totalSemC_hours[0]));

                        totalSemWeightedScore[index] = totalWeightedScore;
                        console.log(totalSemWeightedScore);
                        var semWeightedAverage = totalWeightedScore / totalC_hours;
                        //console.log(semWeightedAverage);


                    }

                }
                TWS.textContent = totalWeightedScore;
                weightedAverage.textContent = semWeightedAverage.toFixed(3);


                // Getting CWA

                for (w = 0; w <= right; w++) {
                    cumulativeC_hours += totalSemC_hours[w];
                    //console.log(typeof(totalSemC_hours));
                    //console.log(typeof(subTotalC_hours));
                    console.log(cumulativeC_hours);


                    cumulativeWeightedScore += totalSemWeightedScore[w];
                    console.log(cumulativeWeightedScore);


                    // This is just a trial PHP tag used inside an javascript tag
                    var php = "<?php echo "good"; ?>";
                    //console.log(php);
                }

                var cumulatedWeightedAverage = cumulativeWeightedScore / cumulativeC_hours;
                console.log("CWA " + cumulatedWeightedAverage);
                ccwwaa.textContent = cumulatedWeightedAverage.toFixed(3);





                cumulativeC_hours = 0;
                cumulativeWeightedScore = 0;


            }
            cwa();


        }, false);
    }
</script>