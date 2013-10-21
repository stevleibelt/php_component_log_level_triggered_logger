# Version History

* [next](https://github.com/stevleibelt/php_component_proxy_logger)
    * add example how to add a proxy logger in a proxy logger
    * add output of example flush buffer trigger logger versus normal logger to readme
    * adapt factories, replace all the parameters in the create call with some "setBufferClassName" methods
    * adapt factories added awareInterfaces to fitting buffer manipulators
    * readme examples are also provided as try out code example
    * replace AwareInterfaces with DependInterfaces where needed
    * update examples for buffer manipulator factories
* [1.1.0](https://github.com/stevleibelt/php_component_proxy_logger/tree/1.1.0) - not yet released
    * create factories for buffer manipulator
    * create documentation directory with code from readme
    * rename *BufferManipulation* to *BufferManipulator*
    * update factory section for buffer manipulator factories
* [1.0.4](https://github.com/stevleibelt/php_component_proxy_logger/tree/1.0.4) - released at 2013-10-05
    * refactor UpwardFlushBufferTrigger - replace complex array with numbers
* [1.0.3](https://github.com/stevleibelt/php_component_proxy_logger/tree/1.0.3) - released at 2013-10-04
    * add example that provides same logging code with and without proxy logger
* [1.0.2](https://github.com/stevleibelt/php_component_proxy_logger/tree/1.0.2) - released at 2013-09-11
    * fixed error in *ManipulateBufferLogger::flushTheBuffer*
* [1.0.1](https://github.com/stevleibelt/php_component_proxy_logger/tree/1.0.1) - released at 2013-09-10
    * declare *LogRequestFactoryInterface* and *LogRequestBufferFactoryInterface* as optional for factory *BufferLoggerFactoryInterface*
    * declare *LogRequestFactoryInterface* and *LogRequestBufferFactoryInterface* as optional for factory *ManipulateBufferLoggerFactoryInterface*
* [1.0.0](https://github.com/stevleibelt/php_component_proxy_logger/tree/1.0.0) - released at 2013-09-08
    * added a lot more example
    * added threshold level for ManipulateBufferLogger that enables the possibility to bypass the buffer for certain levels (by BypassBufferInterface)
    * big refactoring to easy up trigger and bypass handling for buffer manipulation
    * renamed LogEntry to LogRequest
    * restructured project
* [0.9.0](https://github.com/stevleibelt/php_component_proxy_logger/tree/0.9.0) - released at 2013-08-29
    * BufferLogger - buffers log messages and provides *flush* or *clean* for buffer control
    * DefaultMap to trigger inherited log levels by only providing one log level
    * IsValidLogLevel to validate if provided log level is meeting the LogLevel requirement as a well defined value
    * ProxyLogger - generic proxy class that is working internally with the injected the [PSR-3 logger](https://github.com/php-fig/log)
    * LogEntry class to use a [simple value object](http://en.wikipedia.org/wiki/Data_Transfer_Object)
    * LogEntryCollection for easy dealing with multiple LogEntries
    * LogEntryFactory to easy up LogRequest creation
    * TriggerBufferLogger - flushes the buffer by configured log level