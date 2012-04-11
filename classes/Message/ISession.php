<?php

namespace Message;

/**
 * The ISession interface is used to define a session driver that can be used
 * to set and get session data for the Message library.
 *
 * @link       http://github.com/daveWid/message
 *
 * @package    Message
 * @author     Dave Widmer
 * @license    MIT
 */
interface ISession
{
	/**
	 * Retrieve a session variable by the given name, if that session variable
	 * is not found, return the default value. Additionally, this function will
	 * clear out the session variable if found.
	 *
	 * @param  string $name     The property name
	 * @param  mixed  $default  The default value
	 * @return mixed            The property or default value
	 */
	public function get($name, $default = false);

	/**
	 * Sets a session value.
	 *
	 * @param  string $name   The property name
	 * @param  mixed  $value  The property value 
	 */
	public function set($name, $value);

}
