<?php require 'header.php'?>

<div class="news_list">
    <h1>Последние новости</h1>
    <?php foreach ($news as $item) { ?>
        <div class="news_item">
            <div class="title">
                <a href="/post/<?php echo $item['id'] ?>"><?php echo $item['title']?></a>
            </div>
            <div class="date">
                <?php echo $item['publish_date']?>
            </div>
            <div class="announce">
                <?php
                $string = $item['text'];
                $string = substr($string, 0, 150);
                $string = rtrim($string, "!,.-");
                $string = substr($string, 0, strripos($string, ' '));
                echo $string . '...';
                ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php require 'footer.php'?>