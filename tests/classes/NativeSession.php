<?php

/**
 * A quick OOP representation of the PHP session_ function so I can test this
 * Message library out.
 *
 * @package  Message
 * @author   Dave Widmer <dave@davewidmer.net>
 */
class NativeSession implements \Message\ISession
{
	public function __construct()
	{
		//session_start();
	}
	
	public function get_once($name, $default = false)
	{
		$value = $default;
		
		if (isset($_SESSION[$name]))
		{
			$value = $_SESSION[$name];
			unset($_SESSION[$name]);
		}

		return $value;
	}

	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public function __destruct()
	{
		session_write_close();
	}
}