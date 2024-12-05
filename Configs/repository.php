<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Models Directory
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default models directory, just write
    | directory name, like 'Models' not the full path.
    |
    | Default: 'Models'
    |
    */
    'models' => 'Models',


    'criteria' => [
        /*
        |--------------------------------------------------------------------------
        | Accepted Conditions
        |--------------------------------------------------------------------------
        |
        | Conditions accepted in consultations where the Criteria
        |
        | Ex:
        |
        | 'acceptedConditions'=>['=','like']
        |
        | $query->where('foo','=','bar')
        | $query->where('foo','like','bar')
        |
        */
        'acceptedConditions' => [
            '=',
            'like',
            'in',
        ],

        /*
        |--------------------------------------------------------------------------
        | Request Params
        |--------------------------------------------------------------------------
        |
        | Request parameters that will be used to filter the query in the repository
        |
        | Params :
        |
        | - search : Searched value
        |   Ex: https://nyt.loc/?search=lorem
        |
        | - searchFields : Fields in which research should be carried out
        |   Ex:
        |    https://nyt.loc/?search=lorem&searchFields=name;email
        |    https://nyt.loc/?search=lorem&searchFields=name:like;email
        |    https://nyt.loc/?search=lorem&searchFields=name:like
        |
        | - filter : Fields that must be returned to the response object
        |   Ex:
        |   https://nyt.loc/?search=lorem&filter=id,name
        |
        | - orderBy : Order By
        |   Ex:
        |   https://nyt.loc/?search=lorem&orderBy=id
        |
        | - sortedBy : Sort
        |   Ex:
        |   https://nyt.loc/?search=lorem&orderBy=id&sortedBy=asc
        |   https://nyt.loc/?search=lorem&orderBy=id&sortedBy=desc
        |
        | - searchJoin: Specifies the search method (AND / OR), by default the
        |               application searches each parameter with OR
        |   EX:
        |   https://nyt.loc/?search=lorem&searchJoin=and
        |   https://nyt.loc/?search=lorem&searchJoin=or
        |
        */
        'params' => [
            'search' => 'search',
            'searchFields' => 'searchFields',
            'filter' => 'filter',
            'orderBy' => 'orderBy',
            'sortedBy' => 'sortedBy',
            'with' => 'with',
            'searchJoin' => 'searchJoin',
            'withCount' => 'withCount',
        ],
    ],

    /*
       |--------------------------------------------------------------------------
       | Caching Strategy
       |--------------------------------------------------------------------------
    */
    'cache' => [
        /*
        |--------------------------------------------------------------------------
        | Cache Keys File
        |--------------------------------------------------------------------------
        |
        | Here you may specify the cache keys file that is used only with cache
        | drivers that does not support cache tags. It is mandatory to keep
        | track of cache keys for later usage on cache flush process.
        |
        | Default: storage_path('framework/cache/repository.json')
        |
        */
        'keys_file' => base_path('storage/framework/cache/repository.json'),

        /*
        |--------------------------------------------------------------------------
        | Cache Lifetime
        |--------------------------------------------------------------------------
        |
        | Here you may specify the number of minutes that you wish the cache
        | to be remembered before it expires. If you want the cache to be
        | remembered forever, set this option to -1. 0 means disabled.
        |
        | Default: -1
        |
        */
        'lifetime' => (int) env('QUERY_CACHE_LIFETIME', 0),

        /*
        |--------------------------------------------------------------------------
        | Cache without a lifetime worked on current session id
        |--------------------------------------------------------------------------
        |
        | Current config worked as current session only cache.
        | Unique value for every request headers
        |
        | Default: false
        |
        */
        'on_session' => env('QUERY_CACHE_ON_SESSION', false),

        /*
        |--------------------------------------------------------------------------
        | Cache without lifetime worked on current session id
        |--------------------------------------------------------------------------
        |
        | Current config worked as current session only cache.
        | Unique value for every request headers
        |
        | Default: request-tempo-token
        |
        */
        'on_session_key' => env('QUERY_CACHE_ON_SESSION_KEY', 'request-tempo-token'),

        /*
        |--------------------------------------------------------------------------
        | Cache Clear
        |--------------------------------------------------------------------------
        |
        | Specify which actions would you like to clear cache upon success.
        | All repository cached data will be cleared accordingly.
        |
        | Default: ['create', 'update', 'delete']
        |
        */
        'clear_on' => [
            'create',
            'update',
            'delete',
        ],

        /*
        |--------------------------------------------------------------------------
        | Cache Skipping URI
        |--------------------------------------------------------------------------
        |
        | For testing purposes, or maybe some certain situations, you may wish
        | to skip caching layer and get fresh data result set just for the
        | current request. This option allows you to specify custom
        | URL parameter for skipping caching layer easily.
        |
        | Default: 'skipCache'
        |
        */
        'skip_uri' => 'skipCache',
    ],
];
