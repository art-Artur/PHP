<?php
namespace src\Controllers;
use src\Views\View;

class MainController{
    public $view;
    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }
    public function main(){
        // var_dump($_SERVER);
        $articles = [
            ['title'=>'new article title','text'=>'new text'],
            ['title'=>'old article title','text'=>'old text']
        ];
        $this->view->renderHtml('main/main', ['articles'=>$articles]);
    }

    public function sayHello(string $name){
        $this->view->renderHtml('main/hello', ['name'=>$name]);
    }

    public function sayBye(string $name){
        $this->view->renderHtml('main/bye', ['name'=>$name]);
    }
}