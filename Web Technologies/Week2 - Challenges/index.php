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
        <h2>Challenge 1 - PHP Function</h2>
        <p>Take a string and replace any vowels with X</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="stringValue">
            <button>Hide Vowels</button>
        </form>
        <?php
        $userString = $_POST["stringValue"];
        function replaceVowelsWithX($string)
        {
            $vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
            return str_replace($vowels, "X", $string);

        }
        print "Input: " . $userString . "<br>";
        print "Output: " . replaceVowelsWithX($userString);

        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 2 - Calculator</h2>
        <p class="challenge-info">Enter Two numbers with an operator to carry out a calculation</p>
        <div class="calc">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="number" name="num1">
                <select name="operator">
                    <option value="multiply">*</option>
                    <option value="divide">/</option>
                    <option value="add">+</option>
                    <option value="subtract">-</option>
                </select>
                <input type="number" name="num2">
                <button>Calculate</button>
            </form>

        </div>

        <?php
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $op = $_POST["operator"];
        $sum = 0;
        switch ($op) {
            case "add":
                $sum = $num1 + $num2;
                break;
            case "multiply":
                $sum = $num1 * $num2;
                break;
            case "divide":
                $sum = $num1 / $num2;
                break;
            case "subtract":
                $sum = $num1 - $num2;
                break;
            default:
                $sum = 0;
        }

        print "Total - $sum"
            ?>
    </div>

    <div class="challengeBlock">
        <!-- Title -->
        <h2>Challenge 3 - For Loop</h2>
        <p>Input a number to return the ten times table</p>
        <!-- Form to input a chosen number to calculate the times table -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="number" name="number">
            <button>Calculate</button>
        </form>

        <!-- PHP To handle form input and output values -->
        <?php
        $inputedNumber = 0;
        function multiplication($int)
        {
            for ($i = 1; $i < 11; $i++) {
                echo "$int x $i = " . $i * $int . "<br>";
            }
        }
        $inputedNumber = $_POST["number"];
        multiplication($inputedNumber);
        ?>
    </div>

    <div class="challengeBlock">
        <h2>Challenge 4 - Else Statements</h2>
        <p>Input an Age to get a messaged based on value</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="number" name="age">
            <button>Check Age</button>
        </form>
        <?php
        $age = $_POST["age"];
        if ($age < 13) {
            print "You are a child";
        } else if ($age >= 13 && $age <= 17) {
            print "You are a teenager";
        } else if ($age >= 18 && $age <= 64) {
            print "You are an adult";
        } else {
            print "You are a senior citizen";
        }



        ?>
    </div>



</body>

</html>