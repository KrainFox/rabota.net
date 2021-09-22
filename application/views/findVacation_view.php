<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/searchCss.css">
        <title>Поиск вакансий</title>
    </head>
    
    <?php
    if(isset($_COOKIE['id'])){
        echo'
    <body>
    <form method="post">
        <h1> Поиск вакансий </h1>
        <details class = "filterscontainer">
            <summary>Фильтры</summary>
            <div class = "row">
                <div class = "col">
                    <p>Образование</p>
                    <select class = "list" name = "educ">
                    <option value="">Нет</option>';
                    
                    while($row = $data['educ']->fetch_assoc()){ 
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                    echo '</select>
                    
                    </select>
                    <p>Город</p>
                    <select class = "list" name = "city">
                    <option value="">Нет</option>';
                    
                    while($row = $data['city']->fetch_assoc()){ 
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                    echo '</select>
                    
                    </select>
                    <p>Максимальный возраст</p>
                    <input type = "text" class = "textbox" name = "age"></input>
                </div>
                <div class = "col">
                    <p>Профессия</p>
                    <select class = "list" name = "prof">
                    <option value="">Нет</option>';
                    
                    while($row = $data['prof']->fetch_assoc()){ 
                    echo '<option name="" value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                    echo '</select>
                    
                    </select>
                    <p>Сфера работы</p>
                    <select class = "list" name = "sect">
                    <option value="">Нет</option>';
                    
                    while($row = $data['sect']->fetch_assoc()){ 
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                    echo '</select>
                    
                    </select>
                    <p>Занятость</p>
                    <select class = "list" name = "jbc">
                    <option value="">Нет</option>';
                    
                    while($row = $data['jbc']->fetch_assoc()){ 
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                    echo '</select>
                    
                    </select>
                </div>
                <div class = "col">        
                    <p>Минимальная з/п</p>
                    <input type = "text" class = "textbox" name = "pay"></input>
                    <input type= "submit" class = "subbutton" value="Найти резюме"/>
                </div>
            </div>
        </details>
    </form>
    <div>';
        
        if($data['select']!=NULL){
            while($row = $data['select']->fetch_assoc())
            {
                echo '            <div>
                <div class = "resumecard">
                    <p class = "resumename">'.$row['name'].'</p>
                    <div class = "row">
                        <div class = "col">
                            <p>Вакансия: '.$row['profession'].'</p>
                            <p>Область работы: '.$row['section'].'</p>
                            <p>Город: '.$row['city'].'</p>
                            <p>Занятость: '.$row['job_condition'].'</p>
                            <p>Заработная плата: '.$row['pay'].'</p>
                        </div>
                        <div class = "col">
                            <p>Требуемое образование: '.$row['education'].'</p>
                            <p>Требуемый опыт работы: '.$row['experience'].'</p>
                            <p>Минимальный возраст: '.$row['age'].'</p>
                        </div>
                    </div>
                    <div class = "row">
                    <div class = "col">
                        <p>Дополнительные требования:</p>
                        <textarea class = "textar" readonly = true>'.$row['requirements'].'</textarea>
                        <p>Связаться:</p>
                        <p>Веб-сайт компании: '.$row['web'].'</p>
                        <p>Телефон: '.$row['phone'].'</p>
                        <p>Email: '.$row['email'].'</p>
                    </div>
                    </div>
                </div>
            </div>
            <br>';
            }
        } 
        echo'
    </div>
    </body>';
     } else {
        echo '<div class="warningmessage">
        <p>Кажется вы не вошли в систему...</p><br>
        <a href="/cabinet">Войти</a>
        </div>
        ';
    }
    ?>