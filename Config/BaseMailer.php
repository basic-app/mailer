<?php

namespace BasicApp\Messages\Config;

use BasicApp\Mailer\Forms\MailerConfigForm;

abstract class BaseMailer extends \BasicApp\Config\BaseConfig
{

    protected $modelClass = MailerConfigForm::class;

    public function __construct()
    {
        parent::__construct();

        $this->smtp_enabled = 0;

        //$this->reply_to_type = MailerConfigForm::REPLY_TO_NONE;

        //$this->charset = MailerConfigForm::CHARSET_UTF8;

        //$this->encoding = MailerConfigForm::ENCODING_BASE64;
    }

}