# Winbox PHP

A wrapper for using Winbox.js just coding in PHP.

# Installation

Clone the repo or use Composer `composer require carloswph/winbox-php`

# Usage

Using this wrapper is actually pretty simple and can be done by just using two different classes. The class Init() provides a static method that adds Winbox.js bundle, allowing new windows to be created. Once the bundle is running, new windows can be added by instances of the class Window(), and respective window name as arguments, and its options. 

The options can be either set by a number of different methods or passed while creating the instance as an array.

# To-do

* Add custom behaviours to the windows, through the trait On(), as well as allowing a programatic control of the windows features.
* Create an additional class to set custom CSS, icons and scrollbars to be configured.
