<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Image Driver
	|--------------------------------------------------------------------------
	|
	| Intervention Image supports "GD Library" and "Imagick" to process images
	| internally. You may choose one of them according to your PHP
	| configuration. By default PHP's "GD Library" implementation is used.
	|
	| Supported: "gd", "imagick"
	|
	*/

	'driver' => 'gd',
	'sizes'  => [
		'small' => [ '100', '100' ],
		'mediumBlog' => [ '180', '180' ],
		'medium'   => [ '400', '400' ],
		'large' => [ '800', '800' ],
		'largeSlideshow' => [ '825', '389' ],
	],

);
