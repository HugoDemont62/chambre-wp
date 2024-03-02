<?php
/**
 * Plugin Name: Custom Chambres
 * Description: This plugin adds a custom post type "Chambres"
 * Version: 1.1
 * Author: Hugo DEMONT
 **/

use CustomChambres\PostType;

require_once 'inc/PostType.php';

class Chambres
{
	public function init(): void
	{
		(new PostType())->register();
	}
}

(new Chambres())->init();