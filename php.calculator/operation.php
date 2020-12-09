<?php

$first = isset($_POST['first']) ? $_POST['first'] : '';
$second = isset($_POST['second']) ? $_POST['second'] : '';
$operation = isset($_POST['operation']) ? $_POST['operation'] : '';




switch ($_POST['operation']) {
    case '+':
        $result = $first + $second;
        break;
    case '-':
        $result = $first - $second;
        break;
    case '*':
        $result = $first * $second;
        break;
    case '/':
        $result = $first / $second;
        break;
    default:
        $result = 0;
}

echo $result;