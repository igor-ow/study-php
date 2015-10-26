<?php

if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH'] && isset($_SERVER['HTTP_X_REQUESTED_WITH']))
     && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
{

    if ( !isset($_POST['order']) )
    {
        die();
    }

    require_once("../../database.php");
    require_once("../../models/orders.php");

    $link = db_connect();

    if ($_POST['order'] == 'old')
    {
        $order =  GetLastOrder($link);
    }

    if ($_POST['order'] == 'new')
    {
        $order =  GetNewOrder($link);
    }

    if ( empty($order) )
    {
        die();
    }

    echo "
            <td>{$order['id']}</td>
            <td>{$order['date']}</td>
            <td>{$order['name']}</td>
            <td>{$order['num_table']}</td>
            <td>{$order['comment']}</td>
            <td><a href='/admin/?action=edit&id={$order['id']}'>Редактировать</a></td>
            <td><a href='/admin/?action=delete&id={$order['id']}'>Удалить</a></td>
        ";

    die();

}