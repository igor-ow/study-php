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

    $order['link_edit'] = '/admin/?action=edit&id='. $order['id'];
    $order['link_delete'] = '/admin/?action=delete&id='. $order['id'];

    echo json_encode($order);
    die;
}