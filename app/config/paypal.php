<?php
return array(
    // set your paypal credential
    'client_id' => 'AXKlYhC80o5JGneIcL1m9ZgGb94bSM0ejqLrYUUlY2qzDGtWdZdIcu_csjME',
    'secret' => 'EDc92hBefDAZeNQxCTkkWH_f9aw59mbgzfjZmejEZnYmlDg-6p4nCcVPbGIP',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);