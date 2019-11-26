<?php

namespace BasicApp\Mailer\Config;

use BasicApp\Mailer\Forms\MailerConfigForm;
use Config\Services;

abstract class BaseMailer extends \BasicApp\Config\BaseConfig
{

    protected $modelClass = MailerConfigForm::class;

    public $disabled;

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

    public function emailConfig($config)
    {
        if ($this->useragent)
        {
            $config['userAgent'] = $this->useragent;
        }

        if ($this->smtp_enabled)
        {
            $config['protocol'] = 'smtp';

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

        return $config;
    }

    public function createEmail($config = [])
    {
        $email = Services::email();

        $config = $this->emailConfig($config);

        $email->initialize($config);

        $email->setFrom($this->from_email, $this->from_name);

        return $email;
    }    

    public function sendEmail($email, array $options = [], & $error = null)
    {
        if ($this->disabled)
        {
            $error = 'Mailer disabled. Contact support.';

            return false;
        }

        $return = $email->send();

        if (!$return)
        {
            $error = $email->printDebugger([]);
        }

        return $return;
    }

}