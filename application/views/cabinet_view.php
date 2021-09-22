<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/cabinetCss.css">
    <link rel="stylesheet" href="css/searchCss.css">
</head>

<?php
        if(isset($_COOKIE['id'])){
            echo'<body>

            <p class = "hellomessage">Здравствуйте, '.$data['name'].'</p>
                <form method="post">
                    <input type="hidden" name = "LogOut" value = "3">
                    <input type="submit" value = "Выйти" class = "logOutbtn">
                </form>
        <br>
        <details class = "filterscontainer">
            
            <summary>Мои вакансии</summary>';
            
        if($data['vacation']!=NULL){
            while($row = $data['vacation']->fetch_assoc())
            { echo
                '<br>
                <form method = "post">
                <input type = "hidden" value = '.$row['id'].' name = "vacCardId">
                <input type = "submit" value = "Удалить" class = "dltbtn">
                <div class = "row">
                    <div class="col">
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
                </div>
                </form> 
        ';
            }
        }
        echo '</details>

        <details class = "filterscontainer">
            <summary>Мои резюме</summary>';

            if($data['resume']!=NULL){
                while($row = $data['resume']->fetch_assoc())
                { echo'
                    
            <br>
            <form method = "post">
            <input type = "hidden" value = '.$row['id'].' name = "resCardId">
            <input type = "submit" value = "Удалить" class = "dltbtn">
            <div class = "row">
                <div class="col">
                    <div class = "resumecard">
                        <p class = "resumename">'.$row['name'].'</p>
                        <div class = "row">
                            <div class = "col">
                                <p>Возраст: '.$row['age'].'</p>
                                <p>Пол: '.$row['sex'].'</p>
                                <p>Город: '.$row['city'].'</p>
                            </div>
                            <div class = "col">
                                <p>Образование: '.$row['education'].'</p>
                                <p>Желаемая профессия: '.$row['profession'].'</p>
                                <p>Область работы: '.$row['section'].'</p>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col">
                                <p>Желаемая занятость: '.$row['job_condition'].'</p>
                                <p>Дополнительные требования:</p>
                                <textarea class = "textar" readonly = true>'.$row['requirements'].'</textarea>
                                <p>Опыт работы:</p>
                                <textarea class = "textar" readonly = true>'.$row['experience'].'</textarea>
                                <p>Портфолио: '.$row['web'].'</p>
                                <p>Связаться:</p>
                                <p>Телефон: '.$row['phone'].'</p>
                                <p>Email: '.$row['email'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form> ';
                }
            }
       echo ' </details>
       </body>';

        }else{
            echo '

<body>
<section>
<form method="post" class="login_form" id="form_reg" name="form_reg" action="/cabinet">
        <div class="infocontainer">
        <select class = "loginType" name="typeLog">
            <option value="1">Вход</option>
            <option value="2">Регистрация</option>
        </select><br>
            <p>Логин</p>
        <input type = "text" name = "login" placeholder = "   Login"></input><br>
            <p>Пароль</p>
        <input type = "password" name = "password" placeholder = "   Password"></input><br>
        <input class = "subbutton" type="submit"  value="Отправить"/>
        </div>
</form>
</section>
</body>';
        }
?>