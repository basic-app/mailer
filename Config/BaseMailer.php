<?php

namespace BasicApp\Mailer\Config;

use BasicApp\Mailer\Forms\MailerConfigForm;

abstract class BaseMailer extends \BasicApp\Config\BaseConfig
{

    protected $modelClass = MailerConfigForm::class;

    public $from_name;

    public $from_email;

    public $smtp_enabled;

    public $smtp_host;

    public $smtp_port;

    public $smtp_username;

    public $smtp_password;

    public function __construct()
    {
        parent::__construct();

        $this->smtp_enabled = 0;
    }

}