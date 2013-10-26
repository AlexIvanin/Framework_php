<?php


class TemplatesService {

    public function __construct()
    {
        View::getInstance()->init();
    }

    public function render($tplName)
    {
      // require_once PATH.'/root/tpl/'.$tplName.'.tpl';
$title = "raclme";
// шаблонизатор
$file = file_get_contents(PATH.'/root/tpl/'.$tplName.'.tpl'); // путь к шаблону
$file=str_replace('{title}',$title,$file); // обьявляем из каких переменых брать информацию

print $file; //выводим
    }
}
