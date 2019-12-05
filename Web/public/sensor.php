<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id11650786_integrador";
// REPLACE with Database user
$username = "id11650786_uniamerica";
// REPLACE with Database user password
$password = "integrador01";

$key= $dispositivo = $aluno = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $key = test_input($_POST["k"]);
    if($key == "tPmAT5Ab3j7F9") {
        $dispositivo = test_input($_POST["d"]);
        $aluno = test_input($_POST["a"]);
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Falha ao ligar com o servidor: " . $conn->connect_error);
        } 
        
        $sql = "UPDATE dispositivo SET disponivel=2 WHERE ".$dispositivo.";";
        
        if ($conn->query($sql) === TRUE) {
            $sql = "INSERT INTO requisicao (aluno_id, dispositivo_id) VALUES (".$aluno.",".$dispositivo.");";
        
            if ($conn->query($sql) === TRUE) {
                echo "Requisitado!!!";
            } 
            else {
                echo "404-2: " . $sql . "<br>" . $conn->error;
            }
        } 
        else {
            echo "404-1: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Chave errada.";
    }

}
else {
    echo "Sem dados.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
