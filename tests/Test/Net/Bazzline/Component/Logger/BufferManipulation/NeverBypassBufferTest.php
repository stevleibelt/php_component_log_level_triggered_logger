<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-06
 */

namespace Test\Net\Bazzline\Component\Logger\BufferManipulation;

use Net\Bazzline\Component\Logger\BufferManipulation\NeverBypassBuffer;
use Psr\Log\LogLevel;
use Test\Net\Bazzline\Component\Logger\TestCase;

/**
 * Class NeverBypassBufferTest
 *
 * @package Test\Net\Bazzline\Component\Logger\BufferManipulation
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-06
 */
class NeverBypassBufferTest extends TestCase
{
    /**
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-06
     */
    public static function testCaseDataProvider()
    {
        return array(
            'no log level set no bypass' => array(
                'logLevel' => null,
                'logLevelToBypass' => null,
                'expectedBypassBufferValue' => false
            ),
            'log level set but not bypass' => array(
                'logLevelToAdd' => LogLevel::INFO,
                'logLevelToBypass' => null,
                'expectedBypassBufferValue' => false
            ),
            'log level set but different bypass' => array(
                'logLevelToAdd' => LogLevel::DEBUG,
                'logLevelToBypass' => LogLevel::INFO,
                'expectedBypassBufferValue' => false
            ),
            'log level set and same to bypass' => array(
                'logLevelToAdd' => LogLevel::INFO,
                'logLevelToBypass' => LogLevel::INFO,
                'expectedBypassBufferValue' => false
            )
        );
    }

    /**
     * @dataProvider testCaseDataProvider
     *
     * @param mixed $logLevel
     * @param mixed $logLevelToBypass
     * @param bool $expectedBypassBufferValue
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-09-06
     */
    public function testBypassBuffer($logLevel, $logLevelToBypass, $expectedBypassBufferValue)
    {
        $buffer = new NeverBypassBuffer();
        if (!is_null($logLevelToBypass)) {
            $buffer->addBypassForLogLevel($logLevelToBypass);
        }

        $this->assertEquals($expectedBypassBufferValue, $buffer->bypassBuffer($logLevel));
    }
}
