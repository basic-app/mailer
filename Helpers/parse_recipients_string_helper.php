<?php

if (!function_exists('parse_recipients_string'))
{
    /**
     * Parse string "User 1 <user@example.com>, user2@example.com" to array ["user@example.com>" => "User 1", user2@example.com]
     */
    function parse_recipients_string(string $string)
    {
        $return = [];

        foreach(explode(',', $string) as $segment)
        {
            $segment = trim($segment);

            if (preg_match('|(.*)' . preg_quote('<', '|'). '(.+)' . preg_quote('>', '|') .'|', $segment, $matches))
            {
                $to_name = $matches[1];

                $to_email = $matches[2];

                $to_name = trim($to_name);

                $return[$email] = $name;
            }
            else
            {
                $return[] = $string;
            }
        }

        return $return;
    }
}