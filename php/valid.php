<?php
 class Validator{
    private $error = array();
    public function getEmail(){return $this->email;}
    public function getPass(){return $this->pwd;}
    public function getLogin(){return $this->login;}
    public function getName(){return $this->name;}

    public function __construct($uEmail,$uPwd, $uCPwd,$uLogin,$uName)
    {
       $this->email = $this->TSH($uEmail);
       $this->pwd = $this->TSH($uPwd);
       $this->cPwd = $this->TSH($uCPwd);
       $this->login = $this->TSH($uLogin);
       $this->name =$this->TSH($uName);
       
    }
    public function isValid(){
      //Валидация имени
      if(strlen($this->name)<2)
        $this->error[]=['value' =>'Слишком короткое имя.','input'=>'name'];
      if (!preg_match('/^\w+$/', $this->name)) 
        $this->error[]=['value' =>'Можно использовать только латинские буквы и цифры.','input'=>'name'];
      //Валидация Логина
      if(strlen($this->login)<6)
        $this->error[]=['value' =>'Слишком короткий Логин.','input'=>'login'];
      if (!preg_match('/^\w+$/', $this->login)) 
        $this->error[]=['value' =>'Можно использовать только латинские буквы и цифры.','input'=>'login'];
      //Валидация схождения паролей
      if(strcmp($this->pwd,$this->cPwd)!= 0)
        $this->error[]=['value' =>'Пароли не совпадают.','input'=>'cPwd'];
      //Валидация Email адреса
      if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->error[]=['value' =>'E-mail адрес указан неверно.','input'=>'email'];
      }
      //Валидация пароля
      if (preg_match('/[А-яЁё]+/', $this->pwd))
        $this->error[]=['value' =>'Пароль содержит кириллицу .','input'=>'pwd'];
      if (!preg_match('/[a-z]+/', $this->pwd))
        $this->error[]=['value' =>'Пароль не содержит прописных букв .','input'=>'pwd'];
      if (!preg_match('/[A-Z]+/', $this->pwd))
        $this->error[]=['value' =>'Пароль не содержит СТРОЧНЫХ букв .','input'=>'pwd'];
      if (!preg_match('/[0-9]+/', $this->pwd))
        $this->error[]=['value' =>'Пароль не содержит цифр.','input'=>'pwd'];
      if (!preg_match('/[!@#$&*]+/', $this->pwd))
        $this->error[]=['value' =>'Пароль не содержит символ.','input'=>'pwd'];
      if(strlen( $this->pwd) < 8)
        $this->error[]=['value' =>'Пароль должен быть не менее 8 символов .','input'=>'pwd'];
      return count($this->error) == 0;
    }
    public function getError(){
      return $this->error;
    }
    public function TSH($text){
      return  trim(stripslashes(htmlspecialchars($text)));
    }
  }
?>