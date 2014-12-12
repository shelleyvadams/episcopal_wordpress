<?php

$services = new WPAlchemy_MetaBox(array
(
	'id' => '_services',
	'title' => 'Service Time',
	'types' => array('services'),
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_ns',
	'template' => get_stylesheet_directory() . '/metaboxes/times-meta.php',
));

/* eof */