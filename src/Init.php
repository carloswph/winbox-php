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

	public static function enqueue(bool $local = false)
	{
		$winbox = new self;
		$asset = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if(file_exists('./src/assets/winbox.bundle.js')) {
			$js = $asset . 'src/assets/winbox.bundle.js';
		} else {
			$js = $asset . 'vendor/carloswph/winbox.php/src/assets/winbox.bundle.js';
		}

		if($local == true) {
			echo '<script src="' . $js . '"></script>' . PHP_EOL;
		} else {
			echo '<script src="' . $winbox->js . '"></script>' . PHP_EOL;
		}
		
	}
}