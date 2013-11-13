<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 8/27/13
 */

namespace Net\Bazzline\Component\ProxyLogger\Logger;

use Net\Bazzline\Component\ProxyLogger\Event\BufferEvent;
use Net\Bazzline\Component\ProxyLogger\LogRequest\LogRequestBufferInterface;
use Net\Bazzline\Component\ProxyLogger\Factory\LogRequestBufferFactoryInterface;

/**
 * Class BufferLogger
 *
 * @package Net\Bazzline\Component\ProxyLogger\Logger
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-08-27
 * @todo replace logRequestBufferFactory or try to remove it
 */
class BufferLogger extends AbstractLogger implements BufferLoggerInterface
{
    /**
     * @var LogRequestBufferFactoryInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-26
     */
    protected $logRequestBufferFactory;

    /**
     * @var LogRequestBufferInterface
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-26
     */
    protected $logRequestBuffer;

    /**
     * @param LogRequestBufferFactoryInterface $factory
     * @return mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-27
     */
    public function setLogRequestBufferFactory(LogRequestBufferFactoryInterface $factory)
    {
        $this->logRequestBufferFactory = $factory;
        $this->logRequestBuffer = $this->logRequestBufferFactory->create();

        return $this;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-27
     */
    public function log($level, $message, array $context = array())
    {
        $logRequest = $this->logRequestFactory->create($level, $message, $context);
        $this->event->setLogRequest($logRequest);
        $this->event->setLoggerCollection($this->loggers);
        $this->dispatcher->dispatch(BufferEvent::ADD_LOG_REQUEST_TO_BUFFER, $this->event);
    }

    /**
     * Flush buffer content to logger
     *
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-27
     */
    public function flush()
    {
        $this->event->setLoggerCollection($this->loggers);
        $this->dispatcher->dispatch(BufferEvent::BUFFER_FLUSH, $this->event);

        return $this;
    }

    /**
     * Cleans buffer
     *
     * @return $this
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-08-27
     */
    public function clean()
    {
        $this->event->setLoggerCollection($this->loggers);
        $this->dispatcher->dispatch(BufferEvent::BUFFER_CLEAN, $this->event);

        return $this;
    }
}