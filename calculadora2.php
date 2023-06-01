<?php

class calculator
{
    private $n1, $n2;
    public function __construct($num1, $num2)
    {
        $this->n1 = $num1;
        $this->n2 = $num2;
    }
    public function suma()
    {
        return $this->n1 + $this->n2;
    }

    public function resta()
    {
        return $this->n1 - $this->n2;
    }

    public function multiplicacion()
    {
        return $this->n1 * $this->n2;
    }

    public function division()
    {
        if ($this->n2 == 0) {
            return "Error";
        } else {
            return $this->n1 / $this->n2;
        }
    }
}

session_start();
if (isset($_POST['numero'])) {
    if ($_POST['numero'] == "c") {
        $_SESSION['num1'] = null;
    } elseif ($_POST['numero'] == "<--") {
        $_SESSION['num1'] = substr($_SESSION['num1'], 0, -1);
    } elseif ($_POST['numero'] == "+" || $_POST['numero'] == "-" || $_POST['numero'] == "*" || $_POST['numero'] == "/") {
        $_SESSION['n1'] = $_SESSION['num1'];
        $_SESSION['op'] = $_POST['numero'];
        $_SESSION['num1'] = null;
    } elseif ($_POST['numero'] == "=") {
        $_SESSION['n2'] = $_SESSION['num1'];
        $calc = new calculator($_SESSION['n1'], $_SESSION['n2']);
        switch ($_SESSION['op']) {
            case "+":
                $_SESSION['num1'] = $calc->suma();
                break;
            case "-":
                $_SESSION['num1'] = $calc->resta();
                break;
            case "*":
                $_SESSION['num1'] = $calc->multiplicacion();
                break;
            case "/":
                $_SESSION['num1'] = $calc->division();
                break;
        }
    } else {
        if (isset($_SESSION['num1'])) {
            $_SESSION['num1'] .= $_POST['numero'];
        } else {
            $_SESSION['num1'] = $_POST['numero'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="resultado"
            value="<?php echo (isset($_SESSION['num1'])) ? $_SESSION['num1'] : 0 ?>"><br>
        <button type="submit" name="numero" value="1">1</button>
        <button type="submit" name="numero" value="2">2</button>
        <button type="submit" name="numero" value="3">3</button><br>
        <button type="submit" name="numero" value="4">4</button>
        <button type="submit" name="numero" value="5">5</button>
        <button type="submit" name="numero" value="6">6</button><br>
        <button type="submit" name="numero" value="7">7</button>
        <button type="submit" name="numero" value="8">8</button>
        <button type="submit" name="numero" value="9">9</button>
        <br>
        <button type="submit" name="numero" value="0">0</button>
        <button type="submit" name="numero" value="c">c</button>

        <button type="submit" name="numero" value="<--"> <-- </button>
                <button type="submit" name="numero" value="+">+</button>
                <button type="submit" name="numero" value="-">-</button>
                <button type="submit" name="numero" value="*">*</button>
                <button type="submit" name="numero" value="/">/</button>
                <button type="submit" name="numero" value="="> = </button>
    </form>
</body>

</html>
<?php
if ($_SESSION['num1'] === "Error") {
    $_SESSION['num1'] = null;
}
?>