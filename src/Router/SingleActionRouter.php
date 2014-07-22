<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Router;

/**
 * Class SingleActionRouter
 *
 * @since 1.0
 */
class SingleActionRouter extends Router
{
	/**
	 * Property requests.
	 *
	 * @var  array
	 */
	protected $requests = array();

	/**
	 * Class init.
	 *
	 * @param array $routes
	 */
	public function __construct(array $routes = array())
	{
		$this->addMaps($routes);
	}

	/**
	 * addRoute
	 *
	 * @param string $pattern
	 * @param string $controller
	 *
	 * @throws  \LogicException
	 * @throws  \InvalidArgumentException
	 * @return  Router
	 */
	public function addMap($pattern, $controller = null)
	{
		if (!is_string($controller))
		{
			throw new \InvalidArgumentException('Please give me controller name string. ' . ucfirst(gettype($controller)) . ' given.');
		}

		if ($pattern instanceof Route)
		{
			throw new \LogicException('Do not use Route object in ' . get_called_class());
		}

		return parent::addRoute(null, $pattern, array('_controller' => $controller));
	}

	/**
	 * parseRoute
	 *
	 * @param string $route
	 *
	 * @throws  \UnexpectedValueException
	 * @return  array|boolean
	 */
	public function match($route)
	{
		$vars = parent::match($route);

		if (!array_key_exists('_controller', $vars))
		{
			throw new \UnexpectedValueException('Controller not found.', 500);
		}

		$controller = $vars['_controller'];

		unset($vars['_controller']);

		$this->setRequests($vars);

		return $controller;
	}

	/**
	 * getRequests
	 *
	 * @return  array
	 */
	public function getRequests()
	{
		return $this->requests;
	}

	/**
	 * setRequests
	 *
	 * @param   array $requests
	 *
	 * @return  SingleActionRouter  Return self to support chaining.
	 */
	public function setRequests($requests)
	{
		$this->requests = $requests;

		return $this;
	}
}
 