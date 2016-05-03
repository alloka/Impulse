<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => 'AWYEa3GJIkIHj0Frt3LFajrG_fEWXQ9nYaPrmfe3W3ruqONhHJgFnbCKgCzJ95IlBZ4j74IBsWvgmx72',
		'ClientSecret' => 'EL1wLI8qf4KmK0xIzLWnfaSTnmvuCjhG2uGrIxweSXrluyrY0_WkRfW5FNARDpOHPLBIdEMWU1QcxCA2',
	),

	# Connection Information
	'Http' => array(
		 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		'LogLevel' => 'FINE',
	),
);