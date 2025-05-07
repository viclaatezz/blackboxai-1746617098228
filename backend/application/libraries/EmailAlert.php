<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailAlert {

    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->library('email');

        // Configure email settings here or in config/email.php
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.example.com',
            'smtp_port' => 587,
            'smtp_user' => 'your_email@example.com',
            'smtp_pass' => 'your_password',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'wordwrap'  => TRUE
        );
        $this->ci->email->initialize($config);
    }

    public function send_alert($to_email, $subject, $message)
    {
        $this->ci->email->from('no-reply@flopapp.com', 'Flop Alerts');
        $this->ci->email->to($to_email);
        $this->ci->email->subject($subject);
        $this->ci->email->message($message);

        return $this->ci->email->send();
    }
}
