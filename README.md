# Winbox PHP

A wrapper for using Winbox.js just coding in PHP.

# Installation

Clone the repo or use Composer `composer require carloswph/winbox-php`

# Usage

Using this wrapper is actually pretty simple and can be done by just using two different classes. The class Init() provides a static method that adds Winbox.js bundle, allowing new windows to be created. Once the bundle is running, new windows can be added by instances of the class Window(), and respective window name as arguments, and its options. 

The options can be either set by a number of different methods or passed while creating the instance as an array.

```php
require __DIR__ . '/vendor/autoload.php';

?>

<head>
<?php 
	Winbox\Init::enqueue(); // Adds Winbox.js bundle.
	$wb = new Winbox\Window("Winbox Test");
	$wb->setBorder(4); // Sets the winbox border thickness
?>
</head>

<body>
	<?php $wb->render(); ?>
</body>
```

## Methods

`setBorder($thickness)` - accepts integer or strings, corresponding to any CSS unit (px, for instance)
`setColor($color` - admits any valid CSS color and determines the window's border background
`setViewport($viewport)` - admits a single integer or string, or an array of measure (2, 3 or 4 values), corresponding to top, bottom, right and left viewport sizes
`setPosition($x, $y)` - each of the axis variables can be a single value, or an array of two values or strings ([x, width] and [y, height])
`isModal()` - if called, the winbox behaves as a modal box
`setInner($html)` - sets any HTML code to appear inside the winbox
`setID($ID)` - sets the winbox ID
`setClass($class)` - sets the winbox CSS class

`render()` - renders the winbox final result

# To-do

* Add custom behaviours to the windows, through the trait On(), as well as allowing a programatic control of the windows features.
* Create an additional class to set custom CSS, icons and scrollbars to be configured.
