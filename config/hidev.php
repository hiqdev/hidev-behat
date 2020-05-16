<?php
/**
 * HiDev plugin for Behat
 *
 * @link      https://github.com/hiqdev/hidev-behat
 * @package   hidev-behat
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2020, HiQDev (http://hiqdev.com/)
 */

return [
    'controllerMap' =>  [
        'test' => [
            'after' => [
                'behat',
            ],
        ],
        'behat' => [
            'class' => \hidev\behat\console\BehatController::class,
        ],
        'behat.yml' => [
            'class' => \hidev\behat\console\BehatYmlController::class,
        ],
    ],
    'components' => [
        'behat' => [
            'class' => \hidev\behat\components\Behat::class,
        ],
        'behat.yml' => [
            'class' => \hidev\behat\components\BehatYml::class,
        ],
        'binaries' => [
            'behat' => [
                'package'  => 'behat/behat',
                'version'  => '^3.6',
            ],
        ],
    ],
];
