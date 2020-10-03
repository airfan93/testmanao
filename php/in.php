<?php
     include_once('valid.php');
      include_once('CRUD.php');
      if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])
        && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $user = new Validator('qwer@qw.qw',
                              $_POST['uPwd'],
                              $_POST['uPwd'],
                                    $_POST['uLogin'],
                                    'qw');
         if($user->isValid()){
                $x = new CRUD('../xml/db.xml');
                $req = $x->readUser($user->getLogin(),$user->getPass());
                if($req == -1){
                    $error[]=['value' =>'Неправильный логин или пароль','input'=>'login'];
                    $error[]=['value' =>'Неправильный логин или пароль','input'=>'pwd'];
                    echo json_encode($error,JSON_UNESCAPED_UNICODE);
                }
                else{
                     session_start();
                     $_SESSION['userName'] =  $req;
                      $error[]=['value' =>'Вы успешно вошли!','input'=>'newCreated'];
                      echo json_encode($error,JSON_UNESCAPED_UNICODE);
                    //  var_dump($req);
                }
         }
         else{
            echo json_encode($user->getError(),JSON_UNESCAPED_UNICODE);
         }
      }
?>