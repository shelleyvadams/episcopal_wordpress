<?php

$bio = new WPAlchemy_MetaBox(array
(
	'id' => '_bio',
	'title' => 'Contact Information',
	'types' => array('people'),
	'mode' => WPALCHEMY_MODE_EXTRACT,
	'prefix' => '_ns',
	'template' => get_stylesheet_directory() . '/metaboxes/bio-meta.php',
));

/* eof */