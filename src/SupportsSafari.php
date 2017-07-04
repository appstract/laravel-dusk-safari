<?php

namespace Appstract\DuskDrivers\Safari;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;

trait SupportsSafari
{
    /**
     * The SafariDriver process instance.
     */
    protected static $safariProcess;

    /**
     * Start the Safari process.
     *
     * @return void
     */
    public static function startSafariDriver()
    {
        static::$safariProcess = static::buildSafariProcess();

        static::$safariProcess->start();

        static::afterClass(function () {
            static::stopSafariDriver();
        });
    }

    /**
     * Stop the Safaridriver process.
     *
     * @return void
     */
    public static function stopSafariDriver()
    {
        if (static::$safariProcess) {
            static::$safariProcess->stop();
        }
    }

    /**
     * Build the process to run the Safaridriver.
     *
     * @return \Symfony\Component\Process\Process
     */
    protected static function buildSafariProcess()
    {
        return (new ProcessBuilder())
            ->setPrefix('/usr/bin/safaridriver')
            ->add('-p 9515')
            ->getProcess();
    }

    /**
     * Disable logging for safari.
     */
    protected function storeConsoleLogsFor($browsers)
    {
        return false;
    }
}
