<?php 

 namespace App\Helpers;

 use Exception; 
 use PHPMailer\PHPMailer\PHPMailer;
 use stdClass;

 class Email
 {
     private $email;
     private $data; 
     private $error; 

     public function __construct()
     {
         $this->email = new PHPMailer('true');
         $this->data = new stdClass();

         $this->email->isSMTP();
         $this->email->isHTML();
         $this->email->setLanguage('br');

         $this->email->SMTPAuth = true;
         $this->email->SMTPSecure = "tls";
         $this->email->CharSet = "utf-8";

         $this->email->Host     = EMAIL['host'];
         $this->email->Username = EMAIL['user'];
         $this->email->Password = EMAIL['passwd'];
         $this->email->Port     = 587;
     }

     /**
      * @param string $subject
      * @param string $body
      * @param string $recipiente_name
      * @param string $recipiente_email
      * @return \App\Features\Email
      */

     public function add(string $subject, string $body, string $recipiente_name, string $recipiente_email): Email
     {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipient_name = $recipiente_name;
        $this->data->recipient_email = $recipiente_email;
        return $this;
     }

     /**
      * @param string $filePath
      * @param string $fileName
      * @return \App\Features\Email
      */

     public function attach(string $filePath, string $fileName): Email
     {
         $this->data->attach[$filePath] = $fileName;
         return $this;
     }

     /**
      * @param string $from_name
      * @param string $from_email
      * @return bool
      */
  
     public function send(string $from_name = EMAIL["from_name"], string $from_email = EMAIL["from_email"]): bool
    {
        try{
            $this->email->Subject = $this->data->subject;
            $this->email->msgHTML($this->data->body);
            $this->email->addAddress($this->data->recipient_email, $this->data->recipient_name);
            $this->email->setFrom($from_email, $from_name);
            $this->email->send();
            return true;

        } catch (Exception $exception){
            $this->error = $exception;
            return false;
        }
    }

    /**
     *  @return null|\Exception
     */

    public function error(): ?Exception
    {
        return $this->error;
    }

 }