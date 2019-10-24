<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Mailer\Forms;

use BasicApp\Mailer\Config\MailerConfig;

//use BasicApp\Messages\Config\MessageConfig;
//use PHPMailer\PHPMailer\PHPMailer;
//use BasicApp\Core\Form;

abstract class BaseMessageConfigForm extends \BasicApp\Configs\DatabaseConfigForm
{

    //const CHARSET_UTF8 = '';

    //const ENCODING_BASE64;

    const REPLY_TO_NONE = '';

    const REPLY_TO_ADMIN = 'admin';
    
    const REPLY_TO_FROM = 'from';

    protected $returnType = MailerConfig::class;

    protected $validationRules = [
        'from_name' => 'max_length[255]',
        'from_email' => 'max_length[255]|valid_email|required',
        'smtp_enabled' => 'is_natural',
        'smtp_host' => 'max_length[255]',
        'smtp_username' => 'max_length[255]',
        'smtp_password' => 'max_length[255]',
        'smtp_secure' => 'max_length[255]',
        'smtp_port' => 'is_natural',
        //'encoding' => 'max_length[255]',
        //'charset' => 'max_length[255]',
        //'reply_to_type' => 'max_length[255]',
        //'admin_email' => 'max_length[255]|valid_email',
        //'admin_name' => 'max_length[255]'
    ];

    protected $fieldLabels = [
        'from_name' => 'From Name',
        'from_email' => 'From E-mail',
        'smtp_enabled' => 'Use SMTP',
        'smtp_host' => 'SMTP Host',
        'smtp_port' => 'SMTP Port',
        'smtp_username' => 'SMTP Username',
        'smtp_password' => 'SMTP Password',
        'smtp_secure' => 'SMTP Encryption',
        //'encoding' => 'Encoding',
        //'charset' => 'Charset',
        //'reply_to_type' => 'Reply To',
        //'admin_name' => 'Admin Name',
        //'admin_email' => 'Admin E-mail'
    ];

    protected $langCategory = 'messages';

    public function renderForm(Form $form, $data)
    {
        $return = '';

        $return .= $form->inputGroup($data, 'from_name');

        $return .= $form->inputGroup($data, 'from_email');

//        $return .= $form->dropdownGroup($data, 'reply_to_type', static::replyToTypeItems([static::REPLY_TO_NONE => '...']));

//        $return .= $form->inputGroup($data, 'admin_name');

//        $return .= $form->inputGroup($data, 'admin_email');

//        $return .= $form->dropdownGroup($data, 'charset', static::charsetItems(['' => '...']));

//        $return .= $form->dropdownGroup($data, 'encoding', static::encodingItems(['' => '...']));

        $return .= $form->checkboxGroup($data, 'smtp_enabled');

        $return .= $form->inputGroup($data, 'smtp_host');

        $return .= $form->inputGroup($data, 'smtp_port');

        $return .= $form->inputGroup($data, 'smtp_username');

        $return .= $form->passwordGroup($data, 'smtp_password');

  //      $return .= $form->dropdownGroup($data, 'encoding', static::smtpSecureItems(['' => '...']));

        return $return;
    }

    /*

    public static function smtpSecureItems(array $return = [])
    {
        $return['tls'] = 'TLS';
        
        $return['ssl'] = 'SSL';

        return $return;
    }

    */

    /*

    public static function encodingItems(array $return = [])
    {
        $return[PHPMailer::ENCODING_7BIT] = PHPMailer::ENCODING_7BIT;
        
        $return[PHPMailer::ENCODING_8BIT] = PHPMailer::ENCODING_8BIT;
        
        //$return['16bit'] = '16bit'; // not tested
        
        $return[PHPMailer::ENCODING_BASE64] = PHPMailer::ENCODING_BASE64;
        
        $return[PHPMailer::ENCODING_BINARY] = PHPMailer::ENCODING_BINARY;
        
        $return[PHPMailer::ENCODING_QUOTED_PRINTABLE] = PHPMailer::ENCODING_QUOTED_PRINTABLE;

        return $return;
    }

    */

    /*

    public static function charsetItems(array $return = [])
    {
        $return[PHPMailer::CHARSET_UTF8] =  PHPMailer::CHARSET_UTF8;
        
        $return[PHPMailer::CHARSET_ISO88591] = PHPMailer::CHARSET_ISO88591;

        return $return;
    }

    */


    /*

    public static function replyToTypeItems(array $return = [])
    {
    	$return[static::REPLY_TO_FROM] = t('message', 'Reply-To Sender');

    	$return[static::REPLY_TO_ADMIN] = t('message', 'Reply-To Admin');

    	return $return;
    }

    */

}