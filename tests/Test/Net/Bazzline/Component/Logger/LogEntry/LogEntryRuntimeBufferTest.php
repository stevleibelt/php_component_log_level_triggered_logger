<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-26
 */

namespace Test\Net\Bazzline\Component\Logger;

use Net\Bazzline\Component\Logger\LogEntry\LogEntryRuntimeBuffer;
use Mockery;
use Test\Net\Bazzline\Component\Logger\TestCase;

/**
 * Class LogEntryRuntimeBufferTest
 *
 * @package Test\Net\Bazzline\Component\Logger\LogEntry
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-26
 */
class LogEntryRuntimeBufferTest extends TestCase
{
    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-27
     */
    public function testCreation()
    {
        $collection = $this->getNewBuffer();
        $entry = $this->getLogEntry();

        $this->assertEquals(0, $collection->count());
        $this->assertFalse($collection->contains($entry));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-26
     */
    public function testAttach()
    {
        $buffer = $this->getNewBuffer();
        $buffer->attach($this->getLogEntry());

        $this->assertEquals(1, $buffer->count());
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-26
     */
    public function testContains()
    {
        $buffer = $this->getNewBuffer();
        $entry = $this->getLogEntry();
        $buffer->attach($entry);

        $this->assertTrue($buffer->contains($entry));
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-26
     */
    public function testDetach()
    {
        $buffer = $this->getNewBuffer();
        $entry = $this->getLogEntry();
        //no error expected when detaching a not attached entry
        $buffer->detach($entry);
        //now attach and detach entry
        $buffer->attach($entry);
        $buffer->detach($entry);

        $this->assertEquals(0, $buffer->count());
    }

    /**
     * @return LogEntryRuntimeBuffer
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-26
     */
    private function getNewBuffer()
    {
        return new LogEntryRuntimeBuffer;
    }
}