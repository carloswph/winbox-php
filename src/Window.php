<?php 

namespace Winbox;

/**
 * Creates and configures a new resizable window inside the browser's viewport.
 * Dismisses any use of JS.
 *
 * @param  string  		$title  	The visible title of the new window.
 * @param  array|null 	$options 	Options, if passed through the new instance.
 * 
 * @since  1.0.0
 * @author Carlos Matos | WP Helpers
 * @see  https://nextapps-de.github.io/winbox/
 * 
 */
class Window
{
	use On;

	protected $title;

	public $options;

	public function __construct(string $title, array $options = null)
	{
		$this->title = $title;
		if(!is_null($options)) {
			$this->options = $options;
		}
	}

	public function setBorder($thickness)
	{
		$this->options['border'] = $thickness;
		
		return $this;
	}

	public function setColor($color)
	{
		$this->options['background'] = $color;

		return $this;
	}

	public function setViewport(mixed $viewport)
	{
		if(is_string($viewport) || is_integer($viewport)) {
			$this->options['top'] = $this->options['right'] = $this->options['bottom'] = $this->options['left'] = $viewport;
		}
		if(is_array($viewport) || count($viewport) == 4) {
			$this->options['top'] = $viewport[0];
			$this->options['right'] = $viewport[1];
			$this->options['bottom'] = $viewport[2];
			$this->options['left'] = $viewport[3];
		}
		if(is_array($viewport) || count($viewport) == 3) {
			$this->options['top'] = $viewport[0];
			$this->options['right'] = $this->options['left'] = $viewport[1];
			$this->options['bottom'] = $viewport[2];
		}
		if(is_array($viewport) || count($viewport) == 2) {
			$this->options['top'] = $this->options['bottom'] = $viewport[0];
			$this->options['right'] = $this->options['left'] = $viewport[1];
		}

		return $this;

	}

	public function setPosition($x, $y)
	{
		if(is_string($x) || is_integer($x)) {
			$this->options['x'] = $x;
		} else {
			$this->options['x'] = $x[0];
			$this->options['width'] = $x[1];
		}

		if(is_string($y) || is_integer($y)) {
			$this->options['y'] = $y;
		} else {
			$this->options['y'] = $y[0];
			$this->options['height'] = $y[1];
		}

		return $this;
	}

	public function isModal()
	{
		$this->options['modal'] = true;

		return $this;
	}

	public function options()
	{
		foreach ($this->options as $key => $value) {
			if(is_string($value)) {
				$options .= PHP_EOL . '  ' . $key . ': "' . $value . '",';
			}
			if(is_integer($value) || is_bool($value)) {
				$options .= PHP_EOL . '  ' . $key . ': ' . $value . ',';
			}
		}

		return $options;
	}

	public function setInner(string $html)
	{
		$this->options['html'] = $html;

		return $this;
	}

	public function embed(string $url)
	{
		$this->options['url'] = $url;
	}

	public function setID(string $ID)
	{
		$this->options['id'] = $ID;

		return $this;
	}

	public function setClass(string $class)
	{
		$this->options['class'] = $class;
	}

	public function cloneDom(string $selector) {}

	public function render()
	{
		$window = '<script>';
		$window .= PHP_EOL . 'new WinBox("' . $this->title . '",{';
		$window .= $this->options();
		$window .= PHP_EOL . '});';
		$window .= PHP_EOL . '</script>';

		echo $window; 
	}
}