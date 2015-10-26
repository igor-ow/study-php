<?require_once('header.php');?>

    <h1>ПАНЕЛЬ АДМИНИСТРАТОРА</h1>

    <h2>Заказ</h2>

    <div>

        <form method="post" action="/admin/?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
            <label>Дата
                <input type="date" name="date" value="<?=$order['date']?>" class="form-item" autofocus required>
            </label>
            <label>Имя
                <input type="text" name="name" value="<?=$order['name']?>" class="form-item" required>
            </label>
            <label>Стол
                <input type="text" name="table" value="<?=$order['num_table']?>" class="form-item" required>
            </label>
            <label>Комментарий
                <textarea name="comment" class="form-item" required><?=$order['comment']?></textarea>
            </label>
            <input type="submit" value="Сохранить" class="btn">
        </form>

    </div>

<?require_once('footer.php');?>