<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2014 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Application\Web;

use Windwalker\Application\Environment\Environment;
use Windwalker\Application\Environment\ServerInterface;

/**
 * The WebEnvironment class.
 * 
 * @since  {DEPLOY_VERSION}
 */
class WebEnvironment extends Environment
{
	/**
	 * Property client.
	 *
	 * @var  WebClient
	 */
	public $client;

	/**
	 * Class init.
	 *
	 * @param WebClient       $client
	 * @param ServerInterface $server
	 */
	public function __construct(WebClient $client = null, ServerInterface $server = null)
	{
		$this->client = $client ? : new WebClient;

		parent::__construct($server);
	}

	/**
	 * Method to get property Client
	 *
	 * @return  \Windwalker\Application\Web\WebClient
	 */
	public function getClient()
	{
		return $this->client;
	}

	/**
	 * Method to set property client
	 *
	 * @param   \Windwalker\Application\Web\WebClient $client
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setClient($client)
	{
		$this->client = $client;

		return $this;
	}
}