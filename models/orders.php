<?php

function GetOrdersAll($link)
{
    //Запрос
    $query = "SELECT * FROM orders ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    If ( !$result )
    {
        die (mysqli_error($link));
    }

    $tickets = [];
    while ($row = mysqli_fetch_assoc($result))
    {
        $tickets[] = $row;
    }

    return $tickets;
}


function NewOrder($link, $date, $name, $table, $comment)
{
    //Подготовка
    $date = trim($date);
    $name = trim($name);
    $table = trim($table);
    $comment = trim($comment);

    //Проверка
    if ($name == '')
        return false;

    //Запрос
    $strSql = "INSERT INTO orders (date, name, num_table, comment) VALUES ('%s', '%s', '%s', '%s')";

    $query = sprintf($strSql,
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $name),
        mysqli_real_escape_string($link, $table),
        mysqli_real_escape_string($link, $comment)
    );

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return true;
}


function GetOrder ($link, $id)
{
    //Запрос
    $query = sprintf ("SELECT * FROM orders WHERE id = %d", intval($id));
    $result = mysqli_query ($link, $query);

    If (!$result)
        die (mysqli_error ($link));
    return mysqli_fetch_assoc ($result);
}


function EditOrder ($link, $id, $date, $name, $table, $comment){

    //Подготовка
    $date = trim($date);
    $name = trim($name);
    $table = trim($table);
    $comment = trim($comment);
    $id = intval($id);

    //Проверка
    if ($name == '')
        return false;

    //Запрос
    $strSql = "UPDATE orders SET date='%s', name='%s', num_table='%s', comment='%s' WHERE id='%d'";

    $query = sprintf($strSql,
        mysqli_real_escape_string($link, $date),
        mysqli_real_escape_string($link, $name),
        mysqli_real_escape_string($link, $table),
        mysqli_real_escape_string($link, $comment),
        $id
    );

    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link); //вернет количество измененных записей
}


function DeleteOrder ($link, $id)
{
    $id= intval($id);
    //Проверка
    if ($id <= 0)
        return false;

    //Запрос

    $query = sprintf("DELETE FROM orders WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if (!$result)
        die(mysqli_error($link));

    return mysqli_affected_rows($link); //вернет количество измененных записей

}

function GetLastOrder($link)
{
    //Запрос
    $query = 'SELECT * FROM orders ORDER BY id DESC LIMIT 1';
    $result = mysqli_query ($link, $query);

    If (!$result)
        die (mysqli_error ($link));
    return mysqli_fetch_assoc($result);
}

function GetNewOrder($link)
{
    //Запрос
    $query = 'SELECT * FROM orders ORDER BY id ASC LIMIT 1';
    $result = mysqli_query ($link, $query);

    If (!$result)
        die (mysqli_error ($link));
    return mysqli_fetch_assoc($result);
}