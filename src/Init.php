<?php 

namespace Winbox;

/** 
 * Adds Winbox.js bundle to the page, allowing the PHP port to create and manipulate windows.
 *
 * @since  1.0.0 
 * @author Carlos Matos | WP Helpers
 */

class Init
{
	protected $js = 'https://rawcdn.githack.com/nextapps-de/winbox/0.1.8/dist/winbox.bundle.js';

	public static function enqueue()
	{
		$winbox = new self;
		echo '<script src="' . $winbox->js . '"></script>' . PHP_EOL;
	}
}