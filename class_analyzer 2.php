<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Analyzer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        input {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<h2>Student Marks Analyzer Using PHP Loops</h2>

<?php
if (!isset($_POST['submit_students']) && !isset($_POST['submit_marks'])) {
?>
    <form method="POST">
        <label>Enter Number of Students:</label><br>
        <input type="number" name="num_students" min="1" autocomplete="off" required>
        <br><br>
        <input type="submit" name="submit_students" value="Next">
    </form>

<?php
}

if (isset($_POST['submit_students'])) {
    $num = $_POST['num_students'];
?>
    <form method="POST">
        <input type="hidden" name="num_students" value="<?php echo $num; ?>" autocomplete="off">

        <?php
        for ($i = 1; $i <= $num; $i++) {
            echo "Student $i Marks: <br>";
            echo "<input type='number' name='marks[]' min='0' max='100' required><br>";
        }
        ?>

        <br>
        <input type="submit" name="submit_marks" value="Analyze Marks">
    </form>

<?php
}

if (isset($_POST['submit_marks'])) {

    $marks = $_POST['marks']; 
    $num_students = $_POST['num_students'];

    $total = 0;
    $highest = $marks[0];
    $lowest = $marks[0];

    $above50 = 0;
    $below40 = 0;

    echo "<h3>Student Marks</h3>";

    foreach ($marks as $index => $mark) {
        echo "Student " . ($index + 1) . ": $mark <br>";

        $total += $mark;

        if ($mark > $highest) {
            $highest = $mark;
        }

        if ($mark < $lowest) {
            $lowest = $mark;
        }

        if ($mark > 50) {
            $above50++;
        }

        if ($mark < 40) {
            $below40++;
        }
    }

    $average = $total / $num_students;

    echo "<br><h3>Results Summary</h3>";

    $counter = 1;
    while ($counter <= 1) {
        echo "Total Marks: $total <br>";
        echo "Class Average: " . number_format($average, 2) . "<br>";
        echo "Highest Mark: $highest <br>";
        echo "Lowest Mark: $lowest <br>";
        echo "Students Above 50: $above50 <br>";
        echo "Students Below 40: $below40 <br>";
        $counter++;
    }

    echo "<br><strong>Class Performance: </strong>";
    if ($average >= 75) {
        echo "Excellent Class";
    } elseif ($average < 50) {
        echo "Needs Improvement";
    } else {
        echo "Average Performance";
    }
}
?>

</body>
</html>
