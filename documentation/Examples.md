# Examples

This component is shipped with a lot of [examples](https://github.com/stevleibelt/php_component_proxy_logger/tree/master/examples/Example), so take a look inside. All examples can be called on the command line like 'php examples/Example/BufferLogger/Example.php'.

To get a rough idea how you are able to regain freedom and silence in your logs, simple execute the [upward flush buffer versus normal logger](https://github.com/stevleibelt/php_component_proxy_logger/blob/master/examples/Example/ManipulateBufferLogger/ExampleWithUpwardFlushBufferTriggerVersusNormalLogger.php) example.
This example shows an example output of a process that deals with some data. First, the normal logger is used. The normal logger outputs each logging request. Secondly, the normal logger is used but only well defined log levels are able to pass. Third time, the upward flush buffer is used as a part of the manipulate buffer logger. This time all information's are logged per data set if a given threshold level is reached. After each data set, the buffer is cleaned.

## Create A Buffer Logger That Flushs The Buffer If Log Level Error Or Above Is Used

```php
<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-09
 */

use Net\Bazzline\Component\ProxyLogger\BufferManipulation\UpwardFlushBufferTrigger;
use Net\Bazzline\Component\ProxyLogger\Factory\ManipulateBufferLoggerFactory;

//craete a psr3 logger
$logger = MyPSR3Logger();

//create the trigger
$flushBuffer = UpwardFlushBufferTrigger();
//set trigger to log level \Psr\Log\LogLevel::ERROR
$flushBuffer->setTriggerToError();

//use factory to create manipulate buffer logger
$bufferLogger = new ManipulateBufferLoggerFactory(
    $logger, null, null, $flushBuffer);

//log request is added to the buffer
$bufferLogger->info('this is an info message');
//log request is added to the buffer
$bufferLogger->debug('a debug information');
//buffer flush is triggered
$bufferLogger->error('the server made a boo boo');
```

## Create A Buffer Logger That Bypass Configured Log Requests From Buffer

```php
<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-09
 */

use Net\Bazzline\Component\ProxyLogger\BufferManipulation\BypassBuffer;
use Net\Bazzline\Component\ProxyLogger\Factory\ManipulateBufferLoggerFactory;

//craete a psr3 logger
$logger = MyPSR3Logger();

//create bypass
$bypassBuffer = new BypassBuffer();
//set log Level \Psr\Log\LogLevel::INFO to bypass
$bypassBuffer->addBypassForLogLevelInfo();

//use factory to create manipulate buffer logger
$bufferLogger = new ManipulateBufferLoggerFactory(
    $logger, null, null, null, $bypassBuffer);

//log request is added to the buffer
$bufferLogger->info('this is an info message');
//log request is passed to all added real loggers
$bufferLogger->debug('a debug information');
//log request is added to the buffer
$bufferLogger->error('the server made a boo boo');
```

## Use Buffer Logger Inside A Process That Iterates Over A Collection Of Items

```php
<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-09-09
 */

use Net\Bazzline\Component\ProxyLogger\Factory\BufferLoggerFactory;
use Net\Bazzline\Component\ProxyLogger\Factory\LogRequestFactory;
use Net\Bazzline\Component\ProxyLogger\Factory\LogRequestBufferFactory;

//it is assumed that a logger is returned,
// that implements the \Psr\Log\LoggerInterface
$realLogger = $this->getMyLogger();
$bufferLoggerFactory = BufferLoggerFactory($realLogger);

$bufferLogger = $bufferLoggerFactory->create();

//it is assumed that a collection object or a plain array with items is returned
$collectionOfItemsToProcess = $this->getCollectionOfItemsToProcess();

//it is assumed that a class is returned,
// that can handle a item from the collection of items
//it is assumed that a class is returned,
// that implements the LoggerAwareInterface
//it is assumed that a class throws an RuntimeException
// if a item could not be processed
$itemProcessor = $this->getItemProcessor();
$itemProcessor->setLogger($bufferLogger);

//this example shows the benefit of reclaimed silence and freedom on your log
//only if something happens, log requests are send to your logger
foreach ($collectionOfItemsToProcess as $itemToProcess) {
    try {
        $itemProcessor->setItem($itemToProcess);
        $itemProcessor->execute();
        //clean log buffer if nothing happens
        $itemProcessor->getLogger()->clean();
    } catch (RuntimeException $exception) {
        //add exception message as log request to the buffer
        $itemProcessor->getLogger()->error($exception->getMessage());
        //flush buffer to the real logger to debug what has happen
        $itemProcessor->getLogger()->flush();
    }
}

```
