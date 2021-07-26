<?php
session_start();

function connectToDatabase() {
    return mysqli_connect(
        'localhost', // host
        'root', // username
        'Root1234!', // senha
        'crudMatheus' // nome do banco de dados
    );
}

$result = connectToDatabase()->query('SELECT * FROM clientes');
