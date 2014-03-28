<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Solo\UI\Twig\Extensions;

class Link extends \Twig_Extension
{

	/**
	 * Returns a list of functions to add to the existing list.
	 *
	 * @return array An array of functions
	 */
	public function getFunctions()
	{
		return array(
			new \Twig_SimpleFunction("link", $this->mylink())
		);
	}

	/**
	 * Returns the name of the extension.
	 *
	 * @return string The extension name
	 */
	public function getName()
	{
		return "link";
	}

	public function mylink($view=null, $action=null, $args=array())
	{
		return function($view=null, $action=null, $args=array())
		{
			if ($view)
				return "/view/{$view}";

			if ($action)
				return "/action/{$action}";
		};
	}
}

