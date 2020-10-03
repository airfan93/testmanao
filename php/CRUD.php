<?php
    class CRUD{
        private $xml;
        private $solt="03.10"; 
        public function __construct($path){
            $this->xml = simplexml_load_file($path);
            
        }
        public function encryptionPassword($pass){
            return md5($this->solt.$pass);
        }

        public function getCookieToken(){

                if(!isset($_SESSION['userName']) && isset($_COOKIE['token']))
                {
                    foreach($this->xml->user as $user){
                                    if($user->token == $_COOKIE['token'])
                                    {
                                            $_SESSION['userName'] =  (string) $user->name;
                                            $_SESSION['userName'] = $_COOKIE['token'];
                                            $_SESSION['token'] = $_COOKIE['token'];
                                    }
                   }
                }
        }
        public function createNewUser($email,$pwd,$login,$name){
            foreach($this->xml->user as $user){
                if($user->login == $login)
                    return -999;
                if($user->email == $email)
                    return -998;
            }

            $token = (string) md5(time().$login.$email);
            $user = $this->xml->addChild('user');
            $user->addChild('email', $email);
            $user->addChild('pass', $this->encryptionPassword($pwd));
            $user->addChild('login', $login);
            $user->addChild('name', $name);
            $user->addChild('token', $token);
            $this->xml->asXML('../xml/db.xml');
            setcookie("token", $token, time()+3600,'/');
            $_SESSION['token'] = $_COOKIE['token'];
            return  $token;
        }

        public function readUser($login,$pass){
          $pwd = $this->encryptionPassword($pass);
            foreach($this->xml->user as $user){
                if($user->pass == $pwd && $user->login == $login){
                 setcookie("token", $user->token, time()+3600,'/');
                    return (string)($user->name);

                }
            }
            return -1;
        }
    }
?>