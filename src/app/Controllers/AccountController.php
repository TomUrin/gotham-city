<?php
namespace Bankas\Controllers;
use Bankas\App;
use Bankas\Converter;
use Bankas\Safe;
use Bankas\Messages as M;
class AccountController{

  public function __construct()
  {
      if (!LogController::isLogged()) {
          App::redirect('login');
      }
  }
    public function list(){    
      
        $users = Safe::get()->showAll();
        $link = 'http://'.App::DOMAN.'/';
        return App::view('accounts', ['title' => 'Bankas', 'users' => $users, 'eur' =>  Converter::convert(),'link' => $link, 'messages' => M::get()]);
    }
    public function add(string $id){
        $user = Safe::get()->show($id);
        return App::view('add', ['title' => 'Bankas', 'users' => $user, 'messages' => M::get()]); 
    }
    public function addMoney(string $id){
      $duomenys = Safe::get()->show($id);
          if ($duomenys['client'] == $id && $_POST['add'] > 0) {
            $duomenys['suma'] += $_POST['add'];
            Safe::get()->update($id, $duomenys);
            M::add('Success', 'success');
            return App::redirect('accounts');
          }
        
        M::add('Invalid sum!', 'alert');
        return App::redirect('add/'.$id);
    }
    public function remove($id){
        $user = Safe::get()->show($id);
        return App::view('remove', ['title' => 'Bankas', 'users' => $user, 'messages' => M::get()]); 
    }

    public function outMoney(string $id){
      $duomenys = Safe::get()->show($id);
          if ($duomenys['client'] == $id 
          && $duomenys['suma'] >= $_POST['remove'] 
          && $_POST['remove'] >= 0) 
          {
            $duomenys['suma'] -= $_POST['remove'];
            Safe::get()->update($id, $duomenys);
            M::add('Funds deducted', 'success');
            return App::redirect('accounts');
          }
            
        
        M::add('There are not enough funds in the bank account!', 'alert');
        return App::redirect('remove/'.$id);
        
    }
    public function deleteAccount(string $id){
          $duomenys = Safe::get()->show($id);
          if ($duomenys['client'] == $id && $duomenys['suma'] == 0) {
            Safe::get()->delete($id);
            M::add('The user has been removed from the system', 'success');
            return App::redirect('accounts');
          }
         M::add('An account containing money cannot be deleted!', 'alert');
            return App::redirect('accounts');
    }
}