<?php

namespace BasicApp\Mailer\Config;

use BasicApp\Mailer\Forms\MailerConfigForm;
use Config\Services;

abstract class BaseMailer extends \BasicApp\Config\BaseConfig
{

    protected $modelClass = MailerConfigForm::class;

    public $useragent = 'CodeIgniter';

    public $from_name;

    public $from_email;

    public $smtp_enabled = 0;

    public $smtp_host;

    public $smtp_port = 25;

    public $smtp_username;

    public $smtp_password;

    public $smtp_encryption;

    public $smtp_keep_alive = 0;

    public $smtp_timeout = 5;

    public function createEmail($config = [], $to = false)
    {
        $email = Services::email();

        if ($this->useragent)
        {
            $config['userAgent'] = $this->useragent;
        }

        if ($this->smtp_enabled)
        {
            $config['SMTPHost'] = $this->smtp_host;

            $config['SMTPUser'] = $this->smtp_username;

            if ($this->smtp_password)
            {
                $config['SMTPPass'] = $this->smtp_password;
            }

            $config['SMTPPort'] = $this->smtp_port;

            $config['SMTPTimeout'] = $this->smtp_timeout;

            $config['SMTPKeepAlive'] = (bool) $this->smtp_keep_alive;

            if ($this->smtp_encryption)
            {
                $config['SMTPCrypto'] = $this->smtp_encryption;
            }
        }

        $email->initialize($config);

        $email->setFrom($this->from_email, $this->from_name);

        return $email;
    }

}