<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-03 
 */

namespace Net\Bazzline\Component\ProxyLogger\BufferManipulator;

/**
 * Class BypassBufferAwareInterface
 *
 * @package Net\Bazzline\Component\ProxyLogger\BufferManipulator
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-03
 */
interface BypassBufferAwareInterface
{
    /**
     * @return null|BypassBufferInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-03
     */
    public function getBypassBuffer();

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-03
     */
    public function hasBypassBuffer();

    /**
     * @param BypassBufferInterface $bypassBuffer
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-03
     */
    public function setBypassBuffer(BypassBufferInterface $bypassBuffer);
}