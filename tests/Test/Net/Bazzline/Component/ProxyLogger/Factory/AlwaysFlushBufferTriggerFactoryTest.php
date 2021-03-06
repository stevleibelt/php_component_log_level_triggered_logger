<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-10-20
 */

namespace Test\Net\Bazzline\Component\ProxyLogger\Factory;

use Net\Bazzline\Component\ProxyLogger\BufferManipulator\AlwaysFlushBufferTrigger;
use Net\Bazzline\Component\ProxyLogger\Factory\AlwaysFlushBufferTriggerFactory;
use Test\Net\Bazzline\Component\ProxyLogger\TestCase;

/**
 * Class AlwaysFlushBufferTriggerFactory
 *
 * @package Test\Net\Bazzline\Component\ProxyLogger\Factory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-10-20
 */
class AlwaysFlushBufferTriggerFactoryTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-10-20
     */
    public function testCreate()
    {
        $factory = $this->getNewFactory();
        $flushBufferTrigger = $factory->create();

        $this->assertTrue($flushBufferTrigger instanceof AlwaysFlushBufferTrigger);
    }

    /**
     * @return AlwaysFlushBufferTriggerFactory
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-10-20
     */
    private function getNewFactory()
    {
        return new AlwaysFlushBufferTriggerFactory();
    }
}