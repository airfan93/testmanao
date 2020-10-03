<?php
  include_once('valid.php');
  include_once('CRUD.php');
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      $user = new Validator($_POST['uEmail'],
                            $_POST['uPwd'], 
                            $_POST['uCPwd'],
                            $_POST['uLogin'],
                            $_POST['uName']);
       
      if($user->isValid()){
        $x = new CRUD('../xml/db.xml');
        $req = $x->createNewUser($user->getEmail(),
                                         $user->getPass(),
                                         $user->getLogin(),
                                         $user->getName());
        $error = array();
        if(strlen($req) > 10){
          session_start();
          $_SESSION['userName'] =  $user->getName();
          $_SESSION['token'] =  $req;
          setcookie("token", $req, time()+3600,'/');

          $error[]=['value' =>'Вы успешно зарегистрировались','input'=>'newCreated'];
          echo json_encode($error,JSON_UNESCAPED_UNICODE);
        }
        else{
            if($req == -999){
                $error[]=['value' =>'Данный логин уже используется!','input'=>'login'];
                echo json_encode($error,JSON_UNESCAPED_UNICODE);
            }
            if($req == -998){
                $error[]=['value' =>'Данный Email уже используется!','input'=>'email'];
                echo json_encode($error,JSON_UNESCAPED_UNICODE);
            }
        }
        
      }
      else
       echo json_encode($user->getError(),JSON_UNESCAPED_UNICODE);
  }
?>