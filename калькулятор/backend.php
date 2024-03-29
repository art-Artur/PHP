<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $expression = $data['expression'];

    if (!preg_match('/^[\d\+\-\*\/\(\)\.]*$/', $expression)) {
        echo json_encode(['error' => 'Некорректные данные']);
        exit();
    }

    $result = calculateExpression($expression);

    echo json_encode(['result' => $result]);
}

function calculateExpression($expression) {
    $expression = str_replace(' ', '', $expression);

    if (!preg_match('/^[\d\+\-\*\/\(\)\.]*$/', $expression)) {
        return 'Ошибка';
    }

    $result = eval('return ' . $expression . ';');

    return $result;
}
?>
