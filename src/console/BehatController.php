<?php
/**
 * HiDev plugin for Behat
 *
 * @link      https://github.com/hiqdev/hidev-behat
 * @package   hidev-behat
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, HiQDev (http://hiqdev.com/)
 */

namespace hidev\behat\console;

/**
 * Behat.
 */
class BehatController extends \hidev\base\Controller
{
    protected $_before = ['behat.yml'];

    public $force;

    public function getComponent()
    {
        return $this->take('behat');
    }

    /**
     * Generates `tests/_bootstrap.php` and runs tests.
     */
    public function actionIndex()
    {
        return $this->doRun();
    }

    protected function doRun()
    {
        $args = $this->getComponent()->prepareArgs();

        return $this->passthru('behat', $args);
    }

    protected static function prepareFile($file)
    {
        return substr($file, -4) === '.php' ? substr($file, 0, -4) : $file;
    }

    protected function buildNamespace($dir = '')
    {
        return $this->take('package')->namespace . ($dir ? '\\' . strtr($dir, '/', '\\') : '');
    }

    protected function buildTestNamespace($dir = 'tests\\unit')
    {
        return $this->buildNamespace($dir);
    }

    protected function buildClass($file, $dir = '', $postfix = '')
    {
        return $this->buildNamespace($dir) . '\\' . strtr(static::prepareFile($file), '/', '\\') . $postfix;
    }

    protected function buildTestClass($file, $dir = 'tests\\unit', $postfix = 'Test')
    {
        return $this->buildClass($file, $dir, $postfix);
    }

    protected function buildPath($file, $dir = 'src', $prefix = '', $postfix = '')
    {
        return $dir . DIRECTORY_SEPARATOR . $prefix . static::prepareFile($file) . $postfix . '.php';

        //## XXX getting absolute path, think if needed
        //return strncmp($path, '/', 1) === 0 ? $path : Yii::getAlias("@root/$path");
    }
}
