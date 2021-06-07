
<?php /* function createSemTable()
{
    global $connection; */
    
     ?>
    <form action="" method="post">
        <?php
        $query = "SELECT * FROM courses WHERE prog_id = '1' AND period = 'a' ";
        $getIt = '';
        $result = mysqli_query($connection, $query);
        $totalCredit = 0;
        $totalWeightedScore = 0;

        ?>

        <table class="table-responsive table-bordered">
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
                echo "<td class='c_hours' >" . $c_hours . "</td>";
                $course_code1 = strtr($course_code, " ", "_");
                //echo strtr($course_code, " ", "_");
            ?>
                <td>
                    <input type="number" max="100" min="0" class="score" name="<?php echo $course_code1; ?>" placeholder="score" value="<?php if (isset($_POST[$course_code1])) {
                                                                                                                                            echo $_POST[$course_code1];
                                                                                                                                        } ?>">
                    <?php $grade = "";
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
                        echo "<span> {$grade} </span>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($_POST[$course_code1])) {
                        $weightedScore = intval($c_hours) * intval($_POST[$course_code1]);
                        echo $weightedScore;
                        $totalWeightedScore += $weightedScore;
                    }
                    $totalCredit += $c_hours;
                    ?>
                </td>
            <?php
                echo "</tr>";
            }
            ?>
            <tr>
                <th colspan="2"> Totals </th>
                <td>
                    <?php echo $totalCredit; ?>
                </td>
                <th colspan="2">
                    <?php echo $totalWeightedScore; ?>
                </th>
            </tr>

            <tr>
                <th colspan="3"> Semester Weighted Average </th>
                <th colspan="2">
                    <?php
                    if (isset($totalWeightedScore)) {
                        $semesterWeightedAverage = $totalWeightedScore / $totalCredit;
                        echo round($semesterWeightedAverage, 3);
                    }
                    ?>
                </th>
            </tr>

        </table>
        <input type="submit" name="submit" value="Calc WA">
        <input type="reset" name="reset" value="Reset Score" class="reset">

    </form>

<?php //}  ?>