<?php

$map = new WPAlchemy_MetaBox(array
(
	'id' => '_map',
	'title' => 'Google Map Embed',
	'types' => array('page'),
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_ns',
	'template' => get_stylesheet_directory() . '/metaboxes/map-meta.php',
));

/* eof */