<?php
include '../vendor/phpmailer/phpmailer/class.phpmailer.php';
include '../vendor/phpmailer/phpmailer/class.smtp.php';

class Mailer{

  private $mailer;

  private function loadMailer(){
    $this->mailer = new PHPMailer;
    $this->mailer->isSMTP();
  }

  public function __construct($template_name, $params, $to, $subject){
    $this->loadMailer();
    $this->setup();
    $this->setBody(Render::view("mailers/{$template_name}", [
      'params' => $params,
    ]));
    $this->addAddress($to);   
    $this->setSubject($subject);   
  }

  private function getHost(){
    global $SMTP_HOST;
    return $SMTP_HOST;
  }

  private function getUsername(){
    global $SMTP_USERNAME;
    return $SMTP_USERNAME;
  }

  private function getPassword(){
    global $SMTP_PASSWORD;
    return $SMTP_PASSWORD;
  }

  private function getPort(){
    global $SMTP_PORT;
    return $SMTP_PORT;
  }

  private function getSecurity(){
    global $SMTP_SECURITY;
    return $SMTP_SECURITY;
  }

  private function getFromName(){
    global $SMTP_FROM_NAME;
    return $SMTP_FROM_NAME;
  }  

  private function getFromEmail(){
    global $SMTP_FROM_EMAIL;
    return $SMTP_FROM_EMAIL;
  }  
  
  private function setup(){
    $this->mailer->Host = $this->getHost();
    $this->mailer->SMTPAuth = true;
    $this->mailer->Username = $this->getUsername();               
    $this->mailer->Password = $this->getPassword();                         
    $this->mailer->SMTPSecure = $this->getSecurity();                          
    $this->mailer->Port = $this->getPort();    
    $this->mailer->setFrom($this->getFromEmail(), $this->getFromName());
    $this->mailer->addReplyTo($this->getFromEmail(), $this->getFromName());
    $this->mailer->isHTML(true);
  } 

  public function enableDebug(){
    $this->mailer->SMTPDebug = 3;
  }

  public function addAddress($email){
    $this->mailer->addAddress($email);
  }

  public function setSubject($subject){
    $this->mailer->Subject = $subject;
  }
  public function setBody($body){
    $this->mailer->Body = $body;
  }

  public function deliver(){
    if(!$this->mailer->send()) {
      return 'Message could not be sent. Mailer Error: ' . $this->mailer->ErrorInfo;
    } else {
      return 'Message has been sent';
    }
  }
}
?>