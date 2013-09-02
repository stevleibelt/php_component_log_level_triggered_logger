<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 9/2/13
 */

namespace Net\Bazzline\Component\Logger\Configuration;

use Psr\Log\LogLevel;

/**
 * Class DefaultLogLevelThreshold
 *
 * @package Net\Bazzline\Component\Logger\Configuration
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-02
 */
class DefaultLogLevelThreshold extends LogLevelThreshold
{
    /**
     * @param array $logLevelsToPass
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-02
     */
    public function __construct(array $logLevelsToPass = array())
    {
        $logLevelsToPass = array(
            LogLevel::DEBUG => array(
                LogLevel::INFO,
                LogLevel::NOTICE,
                LogLevel::WARNING,
                LogLevel::ERROR,
                LogLevel::CRITICAL,
                LogLevel::ALERT,
                LogLevel::EMERGENCY
            ),
            LogLevel::INFO => array(
                LogLevel::NOTICE,
                LogLevel::WARNING,
                LogLevel::ERROR,
                LogLevel::CRITICAL,
                LogLevel::ALERT,
                LogLevel::EMERGENCY
            ),
            LogLevel::NOTICE => array(
                LogLevel::WARNING,
                LogLevel::ERROR,
                LogLevel::CRITICAL,
                LogLevel::ALERT,
                LogLevel::EMERGENCY
            ),
            LogLevel::WARNING => array(
                LogLevel::ERROR,
                LogLevel::CRITICAL,
                LogLevel::ALERT,
                LogLevel::EMERGENCY
            ),
            LogLevel::ERROR => array(
                LogLevel::CRITICAL,
                LogLevel::ALERT,
                LogLevel::EMERGENCY
            ),
            LogLevel::CRITICAL => array(
                LogLevel::ALERT,
                LogLevel::EMERGENCY
            ),
            LogLevel::ALERT => array(
                LogLevel::EMERGENCY
            )
        );

        parent::__construct($logLevelsToPass);
    }
}