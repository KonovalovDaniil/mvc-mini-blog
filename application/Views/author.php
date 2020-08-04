<?php require 'header.php'?>

<div class="news_list">
    <h1>
        Новости от автора: <?php echo $data['authorName'] ?>
    </h1>
    <?php foreach ($data['news'] as $news) { ?>
        <div class="news_item">
            <div class="title">
                <a href="/post/<?php echo $news['id'] ?>"><?php echo $news['title']?></a>
            </div>
            <div class="date">
                <?php echo $news['publish_date']?>
            </div>
            <div class="announce">
                <?php
                $string = $news['text'];
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
