<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/newsCss.css">
        <title>Новости - Работа.нет</title>
    </head>
<body>  
<h1>Новости</h1>
<section>
    <div class="accordion">
        <?php
    if($data!=NULL){
        $max_length = 250;
        while($row = $data->fetch_assoc())
        {
            if (strlen($row['article']) > $max_length)
            {
                $offset = ($max_length - 3) - strlen($row['article']);
                $s = substr($row['article'], 0, strrpos($row['article'], ' ', $offset)) . '...';
            }
            echo '<div class="contentBx">
                        <div class="label">'.$row['topic'].'</div>
                        <div class="smallcontent">
                            <p>'.$s.'</p>
                            <br>
                            <div class="newsdate">'.$row['date'].'</div>
                        </div>
                        <div class="accordeon-content">
                            <p>'.$row['article'].'</p>
                            <br>
                            <div class="newsdate">'.$row['date'].'</div>
                        </div>
                    </div>';
        }
    }
    ?>
    </div>
</section>
</body>  

<script src = "/js/news_script.js"></script>