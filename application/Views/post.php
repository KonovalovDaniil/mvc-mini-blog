<?php require 'header.php'?>

<div class="article">
    <div class="title">
        <h2><?php echo $news['title']?></h2>
    </div>
    <div class="date">
        <?php echo $news['publish_date']?>, автор - <a href="/author/<?php echo $news['author_id'] ?>"><?php echo $news['author_name'] ?></a>
    </div>
    <div class="announce">
        <p>
            <?php echo $news['text']; ?>
        </p>
    </div>
</div>

<?php require 'footer.php'?>