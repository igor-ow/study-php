<?php

require_once("../database.php");
require_once("../models/orders.php");

$link = db_connect();
if ( isset($_GET['action']) )
{
    $action = $_GET['action'];
}
else
{
    $action = '';
}

switch ($action) {
    case 'add':
        add($link);
        break;
    case 'edit':
        edit($link);
        break;
    case 'delete':
        delete($link);
        break;
    default:
        index($link);
}

function index($link)
{
    $orders = GetOrdersAll($link);
    include("../views/admin_orders.php");
}

function add($link)
{
    if (!empty($_POST))
    {
        NewOrder($link, $_POST['date'], $_POST['name'], $_POST['table'], $_POST['comment']);
        header("Location: index.php");
    }
    $order = ['date'=> '', 'name' => '', 'num_table' => '', 'comment' => ''];
    include("../views/admin_order.php");
}

function edit($link)
{
    if (!isset($_GET['id']) || (intval($_GET['id']) <= 0) )
    {
        header("Location: index.php");
    }

    $id = (int)$_GET['id'];
    if (!empty($_POST) && $id > 0)
    {
        EditOrder($link, $id, $_POST['date'], $_POST['name'], $_POST['table'], $_POST['comment']);
        header("Location: index.php");
    }
    $order = GetOrder($link, $id);
    include("../views/admin_order.php");
}

function delete($link)
{
    $id = $_GET['id'];
    $order = DeleteOrder($link, $id);
    header("Location: index.php");
}