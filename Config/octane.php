<?php

declare(strict_types=1);

use Laravel\Octane\Octane;
use Swoole\Constant;

return [

    /*
    |--------------------------------------------------------------------------
    | Octane Server
    |--------------------------------------------------------------------------
    |
    | This value determines the default "server" that will be used by Octane
    | when starting, restarting, or stopping your server via the CLI. You
    | are free to change this to the supported server of your choosing.
    |
    | Supported: "roadrunner", "swoole"
    |
    */
    'server' => env('OCTANE_SERVER', 'swoole'),

    /*
    |--------------------------------------------------------------------------
    | Force HTTPS
    |--------------------------------------------------------------------------
    |
    | When this configuration value is set to "true", Octane will inform the
    | framework that all absolute links must be generated using the HTTPS
    | protocol. Otherwise your links may be generated using plain HTTP.
    |
    */
    'https' => (bool) env('OCTANE_HTTPS', true),

    /*
    |--------------------------------------------------------------------------
    | Swoole Core options
    |--------------------------------------------------------------------------
    |
    | When this configuration value is set to "true", Octane will inform the
    | framework that all absolute links must be generated using the HTTPS
    | protocol. Otherwise your links may be generated using plain HTTP.
    */
    'swoole' => [
//        Constant::OPTION_SSL => true,
        'options' => [
//            Constant::OPTION_SSL_CERT_FILE => env('SSL_LOCAL_CERT'),
//            Constant::OPTION_SSL_KEY_FILE => env('SSL_LOCAL_PK'),
//            Constant::OPTION_LOG_FILE => base_path('var/swoole/_http.log'),
//            Constant::OPTION_PACKAGE_MAX_LENGTH => 10 * 1024 * 1024,
//            Constant::OPTION_UPLOAD_MAX_FILESIZE => 5 * 1024 * 1024,
//            Constant::OPTION_ENABLE_COROUTINE => true,
//            Constant::OPTION_WORKER_NUM => swoole_cpu_num(),
//            Constant::OPTION_MAX_THREAD_NUM => swoole_cpu_num() * 2,
//            Constant::OPTION_MIN_THREAD_NUM => 1,
//            Constant::OPTION_TASK_WORKER_NUM => 4,
//            Constant::OPTION_OPEN_TCP_NODELAY => true,
//            Constant::OPTION_MAX_COROUTINE => 100000,
//            Constant::OPTION_OPEN_HTTP2_PROTOCOL => true,
//            Constant::OPTION_MAX_REQUEST => 100000,
//            Constant::OPTION_SOCKET_BUFFER_SIZE => 2 * 1024 * 1024,
//            Constant::OPTION_BUFFER_OUTPUT_SIZE => 2 * 1024 * 1024,
        ],
    ],

    'state_file' => base_path('var/swoole/_state.json'),

    /*
    |--------------------------------------------------------------------------
    | Octane Listeners
    |--------------------------------------------------------------------------
    |
    | All of the event listeners for Octane's events are defined below. These
    | listeners are responsible for resetting your application's state for
    | the next request. You may even add your own listeners to the list.
    |
    */
    'listeners' => [
        Laravel\Octane\Events\WorkerStarting::class => [
            Laravel\Octane\Listeners\EnsureUploadedFilesAreValid::class,
            Laravel\Octane\Listeners\EnsureUploadedFilesCanBeMoved::class,
        ],

        Laravel\Octane\Events\RequestReceived::class => [
            ...Octane::prepareApplicationForNextOperation(),
            ...Octane::prepareApplicationForNextRequest(),
            //
        ],

        Laravel\Octane\Events\RequestHandled::class => [
            //
        ],

        Laravel\Octane\Events\RequestTerminated::class => [
            // FlushUploadedFiles::class,
        ],

        Laravel\Octane\Events\TaskReceived::class => [
            ...Octane::prepareApplicationForNextOperation(),
            //
        ],

        Laravel\Octane\Events\TaskTerminated::class => [
            //
        ],

        Laravel\Octane\Events\TickReceived::class => [
            ...Octane::prepareApplicationForNextOperation(),
            //
        ],

        Laravel\Octane\Events\TickTerminated::class => [
            //
        ],

        Laravel\Octane\Contracts\OperationTerminated::class => [
            Laravel\Octane\Listeners\FlushTemporaryContainerInstances::class,
            // DisconnectFromDatabases::class,
            // CollectGarbage::class,
        ],

        Laravel\Octane\Events\WorkerErrorOccurred::class => [
            Laravel\Octane\Listeners\ReportException::class,
            Laravel\Octane\Listeners\StopWorkerIfNecessary::class,
        ],

        Laravel\Octane\Events\WorkerStopping::class => [
            //
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Warm / Flush Bindings
    |--------------------------------------------------------------------------
    |
    | The bindings listed below will either be pre-warmed when a worker boots
    | or they will be flushed before every new request. Flushing a binding
    | will force the container to resolve that binding again when asked.
    |
    */
    'warm' => [
        ...Octane::defaultServicesToWarm(),
    ],

    'flush' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Octane Cache Table
    |--------------------------------------------------------------------------
    |
    | While using Swoole, you may leverage the Octane cache, which is powered
    | by a Swoole table. You may set the maximum number of rows as well as
    | the number of bytes per row using the configuration options below.
    |
    */
    'cache' => [
        'rows' => 1000,
        'bytes' => 10000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Octane Swoole Tables
    |--------------------------------------------------------------------------
    |
    | While using Swoole, you may define additional tables as required by the
    | application. These tables can be used to store data that needs to be
    | quickly accessed by other workers on the particular Swoole server.
    |
    */
    'tables' => [
        'example:1000' => [
            'name' => 'string:1000',
            'votes' => 'int',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | File Watching
    |--------------------------------------------------------------------------
    |
    | The following list of files and directories will be watched when using
    | the --watch option offered by Octane. If any of the directories and
    | files are changed, Octane will automatically reload your workers.
    |
    */
    'watch' => [
        'app',
        'bootstrap',
        'config',
        'database',
        'public/**/*.php',
        'resources/**/*.php',
        'routes',
        'composer.lock',
        '.env',
    ],

    /*
    |--------------------------------------------------------------------------
    | Garbage Collection Threshold
    |--------------------------------------------------------------------------
    |
    | When executing long-lived PHP scripts such as Octane, memory can build
    | up before being cleared by PHP. You can force Octane to run garbage
    | collection if your application consumes this amount of megabytes.
    |
    */
    'garbage' => 50,

    /*
    |--------------------------------------------------------------------------
    | Maximum Execution Time
    |--------------------------------------------------------------------------
    |
    | The following setting configures the maximum execution time for requests
    | being handled by Octane. You may set this value to 0 to indicate that
    | there isn't a specific time limit on Octane request execution time.
    |
    */
    'max_execution_time' => 30,
];
