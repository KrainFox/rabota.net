<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/css/mainCss.css">
       
    </head>
	<body>
        <div class="wrapper">

            <header class="header">
                <div class="container">
                    <div class="header_body">
                        <a href="/main" class="header_logo">
                            Работа.нет
                        </a>
                        <div class="burger_menu">
                            <span></span>
                        </div>
                        <nav class="header_menu">
                            <ul class="header_list">
                                <li>
                                    <a href="/cabinet" class="header_link">Личный кабинет</a>
                                </li>
                                <li>
                                <a href="/findResume" class="header_link">Поиск резюме</a>
                                </li>
                                <li>
                                    <a href="/findVacation" class="header_link">Поиск вакансий</a>
                                </li>
                                <li>
                                    <a href="/addResume" class="header_link">Добавить резюме</a>
                                </li>
                                <li>
                                    <a href="/addVacation" class="header_link">Добавить вакансию</a>
                                </li>
                                <li>
                                    <a href="/news" class="header_link">Новости</a>
                                </li>
                                <li>
                                    <a href="/rss" class="header_link">Обратная связь</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            <div class="content">
                <div class="container">
					<?php include 'application/views/'.$content_view; ?>
                </div>
            </div>

            <footer>Сделано студентами 4-ИАИТ-9 2020 &#169; <br> Вишняковым Ю.Д.<br> Мироновым Н.В.<footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/menuScript.js"></script>
    </body>
</html>