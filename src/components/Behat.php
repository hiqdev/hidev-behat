<?php
/**
 * HiDev plugin for Behat
 *
 * @link      https://github.com/hiqdev/hidev-behat
 * @package   hidev-behat
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, HiQDev (http://hiqdev.com/)
 */

namespace hidev\behat\components;

/**
 * Behat.
 */
class Behat extends \hidev\base\Component
{
    protected $_version;

    public $colors;

    public function prepareArgs($args = [])
    {
        if ($this->colors) {
            $args[] = '--colors';
        }

        return $args;
    }

    public function getVersion()
    {
        if ($this->_version === null) {
            $this->_version = $this->detectVersion();
        }

        return $this->_version;
    }

    public function detectVersion()
    {
        $lines = $this->exec('behat', ['--version']);

        return explode(' ', $lines[0], 3)[1];
    }
}
