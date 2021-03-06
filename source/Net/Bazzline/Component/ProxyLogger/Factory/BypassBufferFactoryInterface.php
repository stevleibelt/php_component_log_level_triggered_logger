<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-10-13
 */

namespace Net\Bazzline\Component\ProxyLogger\Factory;

use Net\Bazzline\Component\ProxyLogger\Validator\IsValidLogLevelAwareInterface;

/**
 * Class BypassBufferFactoryInterface
 *
 * @package Net\Bazzline\Component\ProxyLogger\Factory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-10-13
 */
interface BypassBufferFactoryInterface extends IsValidLogLevelAwareInterface
{
    /**
     * @return \Net\Bazzline\Component\ProxyLogger\BufferManipulator\BypassBufferInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-10-13
     */
    public function create();

    /**
     * @param array $logLevelsToBypass
     * @return $this
     * @throws \Net\Bazzline\Component\ProxyLogger\Exception\RuntimeException
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-10-14
     */
    public function setLogLevelsToBypass(array $logLevelsToBypass);
}