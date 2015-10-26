<?require_once('header.php');?>

    <h1>ПАНЕЛЬ АДМИНИСТРАТОРА</h1>

    <h2>Заказы</h2>

    <a href="/admin/?action=add">Добавить заказ</a>
    <div>

        <table class="admin-table">
            <tr>
                <th>Номер заказа</th>
                <th>Дата</th>
                <th>Имя</th>
                <th>Стол</th>
                <th>Комментарий</th>
                <th></th>
                <th></th>
            </tr>
            <? foreach($orders as $order): ?>
                <tr>
                    <td><?=$order['id'];?></td>
                    <td><?=$order['date'];?></td>
                    <td><?=$order['name'];?></td>
                    <td><?=$order['num_table'];?></td>
                    <td><?=$order['comment'];?></td>
                    <td><a href="/admin/?action=edit&id=<?=$order['id']?>">Редактировать</a></td>
                    <td><a href="/admin/?action=delete&id=<?=$order['id']?>">Удалить</a></td>
                </tr>
            <? endforeach; ?>
        </table>

    </div>

    <a href="#" id="get_new_order">Получить первый заказ</a><br>
    <a href="#" id="get_last_order">Получить последний заказ</a>
    <div id="ajax" style="display:none;">

        <table class="admin-table">
            <tr>
                <th>Номер заказа</th>
                <th>Дата</th>
                <th>Имя</th>
                <th>Стол</th>
                <th>Комментарий</th>
                <th></th>
                <th></th>
            </tr>

            <tr id="ajax_html" style="display:none;"></tr>

            <tr id="ajax_json" style="display:none;">
                <td id="td_id"></td>
                <td id="td_date"></td>
                <td id="td_name"></td>
                <td id="td_num_table"></td>
                <td id="td_comment"></td>
                <td><a id="td_edit" href=''>Редактировать</a></td>
                <td><a id="td_delete" href=''>Удалить</a></td>
            </tr>

        </table>


    </div>

<?require_once('footer.php');?>