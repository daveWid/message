<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Message is a class that lets you easily send messages
 * in your application (aka Flash Messages)
 *
 * @package	Message
 * @author	Dave Widmer
 * @see	http://github.com/daveWid/message
 * @see	http://www.davewidmer.net
 * @copyright	2010 © Dave Widmer
 */
class Message_Core
{
	/**
	 * Constants to use for the types of messages that can be set.
	 */
	const ERROR = 'error';
	const NOTICE = 'notice';
	const SUCCESS = 'success';
	const WARN = 'warn';

	/**
	 * @var	mixed	The message to display.
	 */
	public $message;

	/**
	 * @var	string	The type of message.
	 */
	public $type;

	/**
	 * Creates a new Falcon_Message instance.
	 *
	 * @param	string	Type of message
	 * @param	mixed	Message to display, either string or array
	 */
	public function __construct($type, $message)
	{
		$this->type = $type;
		$this->message = $message;
	}

	/**
	 * Clears the message from the session
	 *
	 * @return	void
	 */
	public static function clear()
	{
		Session::instance()->delete('flash_message');
	}

	/**
	 * Displays the message
	 *
	 * @return	string	Message to string
	 */
	public static function display()
	{
		$msg = self::get();

		if( $msg ){
			self::clear();
			return View::factory('message/basic')->set('message', $msg)->render();
		} else	{
			return '';
		}
	}

	/**
	 * The same as display - used to mold to Kohana standards
	 *
	 * @return	string	HTML for message
	 */
	public static function render()
	{
		return self::display();
	}

	/**
	 * Gets the current message.
	 *
	 * @return	mixed	The message or FALSE
	 */
	public static function get()
	{
		return Session::instance()->get('flash_message', FALSE);
	}

	/**
	 * Sets a message.
	 *
	 * @param	string	Type of message
	 * @param	mixed	Array/String for the message
	 * @return	void
	 */
	public static function set($type, $message)
	{
		Session::instance()->set('flash_message', new Message($type, $message));
	}

}