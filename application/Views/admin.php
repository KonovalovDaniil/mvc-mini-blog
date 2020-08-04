<?php require 'header-admin.php'?>

<h3>Все новости</h3>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Название статьи</th>
        <th scope="col">Текст</th>
        <th scope="col">Имя автора</th>
        <th scope="col">Дата публикации</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($news as $item) {
        $count += 1;
        ?>
        <tr>
            <th scope="row"><?php echo $count ?></th>
            <td><?php echo $item['title']?></td>
            <td><?php echo $item['text']?></td>
            <td><?php echo $item['author_name']?></td>
            <td><?php echo $item['publish_date']?></td>
            <td><a href="/admin/del/<?php echo $item['id'] ?>">Удалить</a></td>
        </tr>
    <?php } ?>

    </tbody>
</table>
