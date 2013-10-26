
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta title="Школа программирования"/>
        <meta keyword="Школа программирования, html, css, php, js"/>
        <title>Регистрация</title>
      <link rel="stylesheet" href="/web/css/select2.css"/>
    <link rel="stylesheet" href="/web/css/register_style.css"/>
	 <link rel="stylesheet" href="/web/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/web/css/styles.css" />
    </head>
    <body>
        
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

                <a class="brand" href="/">WebAcademy</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                    </ul>

                    <div class="btn-group pull-right">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid content">
        <div class="row-fluid">
            <div class="span10 offset1 header content-block">

            </div>
        </div>
        <div class="row-fluid bl">
            <div class="span7 offset1 content-block">
                <div class="page-header">
                    <h3>Регистрация</h3>
                </div>
                <div class="page-content">
                    <div id="content">
    <p style="margin-bottom:30px">Поля помеченные звездочкой(<span class="required-field">*</span>), обязательны для заполнения.</p>
    <form id="registrationForm" action="/signup/check/first_step/" method="post" class="form-horizontal">
        <div class="control-group">
            <div class="control-label">
                Логин <span class="required-field">*</span>
            </div>
            <div class="controls">
                <input type="text" class="span5" placeholder="Логин" name="login">
               
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                Имя
            </div>
            <div class="controls">
                <input type="text" class="span5" placeholder="Имя" name="name">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                Фамилия
            </div>
            <div class="controls">
                <input type="text" class="span5" placeholder="Фамилия" name="surname">
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                E-mail <span class="required-field">*</span>
            </div>
            <div class="controls">
                <input type="email" class="span5" placeholder="Email" name="email">
           
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                Пароль <span class="required-field">*</span>
            </div>
            <div class="controls">
                <input type="password" class="span5" placeholder="Пароль" name="password">
              
            </div>
        </div>
        <div class="control-group">
            <div class="control-label">
                Повторите пароль <span class="required-field">*</span>
            </div>
            <div class="controls">
                <input type="password" class="span5" placeholder="Повторите пароль" name="password_repeat">
               
            </div>
        </div>
      
        <div class="controls">
            <input type="submit" class="btn btn-inverse span5" value="Зарегистрироваться" name="submit"/>
        </div>

    </form>

                    </div>
                </div>
            </div>
            <div class="span3  content-block">
                <div class="span12">
                </div>
               Рачик
            </div>
        </div>
        <div class="row-fluid">
            <div class="span10 offset1 footer content-block">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span10 offset1">
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{ func.path('index') }}">Главная страница</a></li>
                                    {#<li><a href="javascript:;">Разработчикам</a></li>#}
                                    <li><a href="{{ func.path('advert') }}">Реклама</a></li>
                                    <li><a href="{{ func.path('positions') }}">Вакансии</a></li>
                                    <li><a href="{{ func.path('feedback') }}">Обратная связь</a></li>
                                    <li><a href="{{ func.path('about') }}">О нас</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

