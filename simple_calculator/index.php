<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h2>PHP Simple Calculator</h2>
    <form method="post" action="">
        <label for="number1">First Number:</label>
        <input type="number" name="number1" required><br><br>

        <label for="number2">Second Number:</label>
        <input type="number" name="number2" required><br><br>

        <label for="operator">Choose Operation:</label>
        <select name="operator">
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
        </select><br><br>

        <input type="submit" name="calculate" value="Calculate">
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $ls = $_POST["number1"];
            $rs = $_POST["number2"];
            $operator = $_POST["operator"];
            
            $result = 0;
            switch($operator) {
                case "+":
                    $result = $ls + $rs;
                    break;
                case "-":
                    $result = $ls - $rs;
                    break;
                case "*":
                    $result = $ls * $rs;
                    break;
                case "/":
                    $result = $ls / $rs;
                    break;
                default:
                    break;
            }
            echo "Result = $result";
        }
    ?>
</body>
</html>