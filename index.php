
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset = "UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header><h1>Калькулятор</h1></header>
<form action="" method="post">
    <input type="text" name="number1" class="numbers" placeholder="Первое число">
    <select class="btn btn-secondary dropdown-toggle" name="operation" >
        <option value='action'>Выберете действие</option>
        <option value='plus'>+ </option>
        <option value='minus'>- </option>
        <option value="multiply">* </option>
        <option value="divide">/ </option>
    </select>
    <input type="text" name="number2" class="numbers" placeholder="Второе число">

    <button class="btn btn-outline-primary" type="submit" name="submit">Получить ответ</button>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $result = "";
    $operation = $_POST['operation'];
    if(!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
        $error_result = 'Не все поля заполнены';
    }
    else {
        if(!is_numeric($number1) || !is_numeric($number2)) {
            $error_result = "Операнды должны быть числами";
        }
        else
            switch($operation){
                case 'action':
                    $error_result = "Выберите действие";
                    break;
                case 'plus':
                    $result = $number1 + $number2;
                    break;
                case 'minus':
                    $result = $number1 - $number2;
                    break;
                case 'multiply':
                    $result = $number1 * $number2;
                    break;
                case 'divide':
                    if( $number2 == '0')
                        $error_result = "На ноль делить нельзя!";
                    else
                        $result = $number1 / $number2;
                    break;
            }
    }
if(isset($error_result)) {
    echo "Ошибка: $error_result";
}
else {
    echo "Ответ: $result";
}}
?>