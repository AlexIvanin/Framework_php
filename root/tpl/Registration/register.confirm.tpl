
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
                    <h3>Подтверждение регистрации</h3>
                </div>
                <div class="page-content">
                    <div id="content">
    <p>Благодарим Вас за регистрацию.</p> На Ваш электронный ящик выслано письмо с ссылкой для подтверждения аккаунта.

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