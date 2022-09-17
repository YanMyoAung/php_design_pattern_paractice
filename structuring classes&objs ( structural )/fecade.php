<?php

interface AuthInterface{
    public function login($username,$password);
}

interface MailInterface{
    public function to($to);
    public function subject($subject);
    public function send();
}

interface UserInterface{
    public function create(array $data);
}

interface ValidateInterface{
    public function Validate(array $data);
}

class Auth implements AuthInterface{
    public function login($username,$password){
        return true;
    }
}

class Mail implements MailInterface{
    public function to($to)
    {
        echo "Mail send to $to. \n";
        return $this;
    }

    public function subject($subject)
    {
        echo "Subject - $subject \n";
        return $this;
    }

    public function send(){
        echo "Mail sent! \n";
    }
}

class Validate implements ValidateInterface{
    public function Validate(array $data)
    {
        return true;
    }
}

class User1 implements UserInterface{
    public function create(array $data)
    {
        return true;
    }
}

class SignUpFacade{
    public function __construct(private AuthInterface $auth,
        private MailInterface $mail,
        private ValidateInterface $validate,
        private UserInterface $user)
    {
        
    }

    public function signUp($username,$password,$mail){
        if($this->validate->Validate(['user'=>$username,'password'=> $password,'mail' => $mail])){
           if($this->user->create(['user'=>$username,'password'=> $password,'mail' => $mail])){
              if($this->auth->login($username,$password)){
                $this->mail->to($username)->subject("Welcome")->send();
              }
           }
        }
    }
}

$auth = new Auth();
$validate = new Validate();
$mail = new Mail();
$user = new User1();


$facade = new SignUpFacade($auth,$mail,$validate,$user);
$facade->signUp("Yan","heheh","pand@gmail.com");

?>