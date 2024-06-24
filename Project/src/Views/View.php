<?php 

namespace src\Views;

class View{
    public function __construct(private $path){}

    public function renderHtml(string $templateName, $vars=[], $code=200){
        http_response_code($code);
        extract($vars);
        require($this->path.$templateName.'.php');
    }
}