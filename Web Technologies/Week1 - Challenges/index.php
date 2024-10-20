<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 1 Challenges</title>

</head>

<body>
    <h1>Challenges</h1>

    <div class="challengeBlock">
        <h2>Challenge 1 - Calculate Area and Width</h2>
        <?php
        // Declare varibles
        $width = 10;
        $height = 5;
        $area = $width * $height;
        print "The rectangle has a width of {$width} metres, a height of {$height} metres, and an area of {$area} square metres";
        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 2 - PHP Strings and Numbers</h2>
        <?php
        // Declare Varibles
        $num1 = 10;
        $num2 = 5;
        // Output to the webpage
        print "Addition of {$num1} and {$num2} is: " . $num1 + $num2;
        print "<br> Subtraction of {$num1} and {$num2} is: " . $num2 - $num1;
        print "<br> Multiplication of {$num1} and {$num2} is: " . $num1 * $num2;
        print "<br> Division of {$num1} and {$num2} is: " . $num1 / $num2;
        print "<br> Concatenation of {$num1} and {$num2} is: {$num1}{$num2}";
        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 3 - Age</h2>
        <?php
        // Declare varibles
        $currentAge = 27;
        $days_alive = $currentAge * 365;
        $hoursAlive = $days_alive * 24;
        $minutesAlive = $hoursAlive * 60;

        // Output to the webpage
        print "Welcome to the Age Calculator!";
        print "<br><br> Your age: {$currentAge}";
        print "<br><br>You have been alive for:";
        print "<br>{$days_alive} days";
        print "<br>{$hoursAlive} hours";
        print "<br>{$minutesAlive} minutes";
        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 4 - Days of the Week - Numeric Array</h2>
        <?php
        // Declare varible
        $daysOfTheWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        // Map through array and display each value
        foreach ($daysOfTheWeek as $day) {
            print "<li>{$day}</li>";
        }

        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 5 - Edinburgh Temp - Assciative Arrays</h2>
        <?php
        // Declare arrays
        $julyAugust = ["high" => "19 °C", "low" => "11 ℃"];
        $janFeb = ["high" => "7 ℃", "low" => "1 ℃"];
        // HTML table to display temps
        print "
        <h3>Average Temp in Edinburgh</h3>
        <table>
        <tr>
        <th >Month</th>
        <th >High</th>
        <th >Low</th>  
        </tr>
        <tr>
        <td>July-Aug</td>
        <td>{$julyAugust["high"]}</td>
        <td>{$julyAugust["low"]}</td>
        </tr>
        <tr>
        <td>Jan-Feb</td>
        <td>{$janFeb["high"]}</td>
        <td>{$janFeb["low"]}</td>
        </tr>
        </table>";
        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 6 - Student grades - Multi-Dimentional Arrays</h2>
        <?php
        // Define array for student results
        $students = [
            "Arron" => ["physics" => 74, "english" => 69, "maths" => 70],
            "Jamie" => ["physics" => 64, "english" => 79, "maths" => 69],
            "Harry" => ["physics" => 55, "english" => 52, "maths" => 57]
        ];
        // Table to display results - Didnt notice the output asked but kept this in as i already done it....
        print "<table>
        <tr>
        <th>Name</th>
        <th>Physics</th>
        <th>English</th>
        <th>Maths</th>  
        </tr>
        <tr>
        <td>Arran</td>
        <td>{$students["Arron"]["physics"]}%</td>
        <td>{$students["Arron"]["english"]}%</td>
        <td>{$students["Arron"]["maths"]}%</td>
        </tr>
       <tr>
        <td>Jamie</td>
        <td>{$students["Jamie"]["physics"]}%</td>
        <td>{$students["Jamie"]["english"]}%</td>
        <td>{$students["Jamie"]["maths"]}%</td>
        </tr>
        <tr>
        <td>Harry</td>
        <td>{$students["Harry"]["physics"]}%</td>
        <td>{$students["Harry"]["english"]}%</td>
        <td>{$students["Harry"]["maths"]}%</td>
        </tr>
        </table>";

        // Output asked for the challenge
        print "<p>Physics result for Arron : {$students["Arron"]["physics"]}%</p>";
        print "<p>English result for Jamie : {$students["Jamie"]["english"]}%</p>";
        print "<p>Maths result for Harry : {$students["Harry"]["maths"]}%</p>"
            ?>
    </div>

</body>

</html>