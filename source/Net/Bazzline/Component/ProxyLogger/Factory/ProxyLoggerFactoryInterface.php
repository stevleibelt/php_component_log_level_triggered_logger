<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-08 
 */

namespace Net\Bazzline\Component\ProxyLogger\Factory;

use Psr\Log\LoggerInterface;

/**
 * Class ProxyLoggerFactoryInterface
 *
 * @package Net\Bazzline\Component\ProxyLogger\Factory
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-09-08
 */
interface ProxyLoggerFactoryInterface
{
    /**
     * @param LoggerInterface $logger
     * @return \Net\Bazzline\Component\ProxyLogger\Logger\ProxyLoggerInterface
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-09
     */
    public function create(LoggerInterface $logger);
}