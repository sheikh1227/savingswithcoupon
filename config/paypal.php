<?php 
return [ 
  
    'client_id' => 'AT4W3CmPArAnmN3TZZfTUIgXJLUY2_vnOUWnUIiZeLywE2Tp93vEj9mhinzmOD-Mmfg4NlinkE6V0YpV',

	'secret' => 'EC3psNBoiX_WM-Abebgo523sFKfEpl3tnsuIu0BD6E_gpMA3AEXOIP3ntuOup7dioIxPyDkIzIRMNJ9G',

    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];