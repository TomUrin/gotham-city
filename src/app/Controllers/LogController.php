<?php
namespace Bankas\Controllers;
use Bankas\App;
use Bankas\Safe;
use Bankas\Messages as M;

class LogController{
    public $data;

    public function showUs(){
        $this->data = json_decode(file_get_contents(__DIR__.'/../server/worker.json'), 1);
        return $this->data;
    }

    public function showLogin()
    {
        return App::view('login', ['messages' => M::get(), 'title' => 'Bankas', 'csrf' => App::csrf()]);
    }
    public function login()
    {
        if(($_POST['csrf'] ?? '') != App::csrf()) {
            M::add('Wrong code', 'alert');
            return App::redirect('login');
        }
        $user = $_POST['username'] ?? ''; 
        $pass = md5($_POST['password']) ?? '';
        $password = $this->showUs()['password'];
        if (md5($password) == $pass && $user == $this->showUs()['username']) {
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $user;
            App::redirect('');
        }else{
            M::add('Incorrect data!', 'alert');
            App::redirect('login');
        }
    }
    public function logout()
    {
        unset($_SESSION['login'], $_SESSION['username']);
        App::redirect('login');
    }
    public static function isLogged() : bool
    {
        return isset($_SESSION['login']) && $_SESSION['login'] == 1;
    }
   
}