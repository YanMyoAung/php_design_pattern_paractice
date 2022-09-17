<?php 

class Message{
    public function Send(EmailSender $emailSender){
        $emailSender->send($this);
    }
}

interface EmailSender{
    public function send(Message $message);
}

class EmailSenderImpl implements EmailSender{
    public function send(Message $message){
        return 'email send';
    }
}

class HotMailSender implements EmailSender{
    public function send(Message $message){
        return 'hotemail send';
    }
}

?>