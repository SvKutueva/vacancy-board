<?php

namespace Distr;

use Composer\IO\IOInterface;

class Installer
{
    protected $io;

    public function __construct(IOInterface $io)
    {
        $this->io = $io;
    }

    public function processConfig($config)
    {
        $params = $this->askParams($config['params']);
        self::arrayReplaceRecursive($config['result'], $params);

        return $config['result'];
    }

    protected function askParams(array $requiredParams)
    {
        $result = [];
        foreach ($requiredParams as $key => $params) {
            $default = isset($params['default']) ? $params['default'] : null;
            $message = $params['message'];

            if ($default === true) {
                $default = 'yes';
            } elseif ($default === false) {
                $default = 'no';
            }

            $question = sprintf('<question>%s</question> (<comment>%s</comment>): ', $message, $default);

            $value = $this->io->askAndValidate($question, function ($val) use ($default, $message){
                    if (is_null($val) && is_null($default)) {
                        throw new \InvalidArgumentException($message . ' is required');
                    }
                    return $val;
                }, 3, $default);

            if (in_array(strtolower($value), ['yes', 'y', 'true'])) {
                $value = true;
            }

            if (in_array(strtolower($value), ['no', 'n', 'false'])) {
                $value = false;
            }

            $result[$key] = $value;
        }

        return $result;
    }

    protected static function arrayReplaceRecursive(&$base, $replacements)
    {
        foreach ($base as $key => &$value) {
            if ( ! is_array($value)) {
                if (array_key_exists($key, $replacements)) {
                    $base[$key] = $replacements[$key];
                }
            } else {
                self::arrayReplaceRecursive($value, $replacements);
            }
        }
    }
}