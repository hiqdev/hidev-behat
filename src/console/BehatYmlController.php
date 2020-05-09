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
 * `behat.yml` generation.
 * @author Andrii Vasyliev <sol@hiqdev.com>
 */
class BehatYmlController extends \hidev\base\Controller
{
    public function actionIndex()
    {
        $this->take('behat.yml')->save();
    }
}
