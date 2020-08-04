<?php
$host = '127.0.0.1';
$db = 'test-task';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $user, $pass, $opt);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Чудо-новости!</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
<div class="header">
    <div class="logo">
        <a href="index.php">Чудо-новости.рф</a>
    </div>
    <div class="slogan">
        только достоверные новости!
    </div>
</div>

<?php
if(empty($_GET))
{
    $stmt = $pdo->query('SELECT * FROM news');
    $data = $stmt->fetchAll();

    ?>

    <div class="news_list">
        <h1>Последние новости</h1>
        <?php var_dump($data) ?>
        <?php foreach ($data as $news) { ?>
            <div class="news_item">
                <div class="title">
                    <a href="?news id=<?php echo $news['id'] ?>"><?php echo $news['title']?></a>
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

<?php }
?>


<?php
if(isset($_GET['news_id']))
{
    $id = $_GET['news_id'];

    $sql = 'SELECT * FROM news WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $oneNews = $stmt->fetchAll();

    foreach ($oneNews as $news) {

        $sql = 'SELECT name FROM authors WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$news['author_id']]);
        $data = $stmt->fetch();
        $authorName = $data['name'];

        ?>
        <div class="article">
            <div class="title">
                <h2><?php echo $news['title']?></h2>
            </div>
            <div class="date">
                <?php echo $news['publish_date']?>, автор - <a href="?author id=<?php echo $news['author_id'] ?>"><?php echo $authorName ?></a>
            </div>
            <div class="announce">
                <p>
                    <?php echo $news['text']; ?>
                </p>
            </div>
        </div>
    <?php }
} ?>

<?php
if(isset($_GET['author_id']))
{
    $author_id = $_GET['author_id'];

    $sql = 'SELECT * FROM news WHERE author_id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author_id]);
    $allNews = $stmt->fetchAll();

    ?>

    <div class="news_list">
        <h1>
            Новости от автора:
            <?php
            $sql = 'SELECT name FROM authors WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_GET['author_id']]);
            $data = $stmt->fetch();
            $authorName = $data['name'];
            echo $authorName;
            ?>
        </h1>
        <?php foreach ($allNews as $news) { ?>
            <div class="news_item">
                <div class="title">
                    <a href="?news id=<?php echo $news['id'] ?>"><?php echo $news['title']?></a>
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

<?php }
?>

<div class="footer">
    Все права защищены! 2к20
</div>
</body>
</html>
