<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/vacationCss.css">
        <title>Добавление вакансии</title>       
    </head>
    <?php
        if(isset($_COOKIE['id'])){
            echo'
            <body>
    <form method="post" id="form_reg" name="form_reg">
    <div class = "addvac">
        <div class = "container" id = "container-body">
            <h1>Добавление вакансии</h1>
            <div class = "row">
            <div class = "col">
                <div class = "card">
                    <div class = "subcard">
                    <h4>Информация о вакансии</h4>
                    <p>Вакансия</p>
                    <select class = "list" name = "prof">';
                        while($row = $data['prof']->fetch_assoc()){ 
                            echo '<option name="" value="'.$row['id'].'">'.$row['title'].'</option>';
                        }
                        echo '</select>';
                   echo'
                    </select>
                    <p>Сфера работы</p>
                    <select class = "list" name = "sect">';
                        while($row = $data['sect']->fetch_assoc()){ 
                            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                        }
                        echo '</select>';
                    echo'
                    </select>
                    <p>Город</p>
                    <select class = "list" name = "city">';
                       
                            while($row = $data['city']->fetch_assoc()){ 
                                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                            }
                            echo '</select>';
                        echo'
                    </select>
                    <p>Занятость</p>
                    <select class = "list" name = "jbc">';
                        while($row = $data['jbc']->fetch_assoc()){ 
                            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                        }
                        echo '</select>';
                    echo'
                    </select>
                    <p>Заработная плата</p>
                    <input type = "text" class = "textbox" name = "pay" required></input>
                    </div>
                    <br>
                    <div class = "subcard">
                    <h4>Связь</h4>
                    <p>Имя контакта</p>
                    <input type = "text" class = "textbox" name = "name" required></input>
                    <p>Телефон для связи</p>
                    <input type = "text" class = "textbox" name = "phone" required pattern=[0-9]{11}></input>
                    <p>Электронная почта</p>
                    <input type = "email" class = "textbox" name = "email" required email></input>
                    <p>Сайт компании</p>
                    <input type = "text" class = "textbox" name = "web" required></input>
                    </div>
                </div>
            </div>
            <div class = "col">
                <div class = "card">
                    <div class = "subcard">
                    <h4>Требования к сотруднику</h4>
                    <p>Образование</p>
                    <select class = "list" name = "educ">';
                               
                            while($row = $data['educ']->fetch_assoc())
                            {
                                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                            }
                            echo '</select>';
                        echo'
                    </select>
                    <p>Опыт работы</p>
                    <input type = "text" class = "textbox" name = "exp" required></input>
                    <p>Возраст</p>
                    <input type = "text" class = "textbox" name = "age" required></input>
                    <p>Дополнительно</p>
                    <textarea required class = "textbox1" name = "req"></textarea>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <input type="submit" class = "subbutton"  value="Добавить вакансию"/>
    </div>
    </form>
    </body>';
        }else{
            echo '<div class="warningmessage">
            <p>Кажется вы не вошли в систему...</p><br>
            <a href="/cabinet">Войти</a>
            </div>
            ';

        }
?>




