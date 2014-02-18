<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2011 - 2014 SMS Taiwan, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Windwalker\Data\Joomla;

use Joomla\Database\DatabaseDriver;

/**
 * Class DatabaseFactory
 *
 * @since 1.0
 */
abstract class DatabaseFactory
{
	/**
	 * Property db.
	 *
	 * @var DatabaseDriver
	 */
	protected static $db = null;

	/**
	 * getDb
	 *
	 * @param array $option
	 *
	 * @return  DatabaseDriver
	 */
	public static function getDbo($option = array(), $forceNew = false)
	{
		if (!self::$db || $forceNew)
		{
			self::$db = static::createDbo($option);
		}

		return self::$db;
	}

	/**
	 * setDb
	 *
	 * @param   DatabaseDriver $db
	 *
	 * @return  void
	 */
	public static function setDbo(DatabaseDriver $db)
	{
		self::$db = $db;
	}

	/**
	 * createDbo
	 *
	 * @param array $option
	 *
	 * @return  DatabaseDriver
	 */
	public static function createDbo(array $option)
	{
		$dbFactory = \Joomla\Database\DatabaseFactory::getInstance();

		$option['driver'] = empty($option['driver']) ? $option['driver'] : 'mysql';

		return $dbFactory->getDriver($option['driver'], $option);
	}
}
