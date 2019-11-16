<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Mailer\Forms;

use BasicApp\Mailer\Config\Mailer;
use BasicApp\Core\Form;

abstract class BaseMailerConfigForm extends \BasicApp\Config\BaseConfigForm
{

    protected $returnType = Mailer::class;

    protected $allowedFields = [
        'useragent',
        'from_name',
        'from_email',
        'smtp_enabled',
        'smtp_host',
        'smtp_username',
        'smtp_password',
        'smtp_port',
        'smtp_keep_alive',
        'smtp_encryption',
        'smtp_timeout'
    ];

    protected $validationRules = [
        'useragent' => 'max_length[255]',
        'from_name' => 'max_length[255]',
        'from_email' => 'max_length[255]|valid_email|required',
        'smtp_enabled' => 'is_natural',
        'smtp_host' => 'max_length[255]',
        'smtp_username' => 'max_length[255]',
        'smtp_password' => 'max_length[255]',
        'smtp_port' => 'is_natural|permit_empty',
        'smtp_timeout' => 'is_natural_no_zero',
        'smtp_keep_alive' => 'in_list[0,1]',
        'smtp_encryption' => 'in_list[tls,ssl]|permit_empty'
    ];

    protected $fieldLabels = [
        'useragent' => 'Useragent',
        'from_name' => 'From Name',
        'from_email' => 'From E-mail',
        'smtp_enabled' => 'SMTP Enabled',
        'smtp_host' => 'SMTP Host',
        'smtp_port' => 'SMTP Port',
        'smtp_username' => 'SMTP Username',
        'smtp_password' => 'SMTP Password',
        'smtp_timeout' => 'SMTP Timeout (in seconds)',
        'smtp_keep_alive' => 'SMTP Persistent Connection',
        'smtp_encryption' => 'SMTP Encryption'
    ];

    protected $langCategory = 'messages';

    public function renderForm(Form $form, $data)
    {
        $return = '';

        $return .= $form->inputGroup($data, 'from_name');

        $return .= $form->inputGroup($data, 'from_email');

        $return .= $form->checkboxGroup($data, 'smtp_enabled');

        $return .= $form->inputGroup($data, 'smtp_host');

        $return .= $form->inputGroup($data, 'smtp_port');

        $return .= $form->inputGroup($data, 'smtp_username');

        $return .= $form->passwordGroup($data, 'smtp_password');

        $return .= $form->inputGroup($data, 'smtp_timeout');

        $return .= $form->dropdownGroup($data, 'smtp_encryption', ['' => '', 'tls' => 'tls', 'ssl' => 'ssl']);

        $return .= $form->checkboxGroup($data, 'smtp_keep_alive');

        $return .= $form->inputGroup($data, 'useragent');

        return $return;
    }

}