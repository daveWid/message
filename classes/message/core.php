<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Message is a class that lets you easily send messages
 * in your application (aka Flash Messages)
 *
 * @package    Message
 * @author     Dave Widmer
 * @see        http://github.com/daveWid/message
 * @see        http://www.davewidmer.net
 * @copyright  2010-2011 © Dave Widmer
 */
class Message_Core
{
	/**
	 * @var  string    The default view if one isn't passed into display/render.
	 */
	public static $default = "message/basic";

	/**
	 * Constants to use for the types of messages that can be set.
	 */
	const ERROR = 'error';
	const NOTICE = 'notice';
	const SUCCESS = 'success';
	const WARN = 'warn';

	/**
	 * @var  mixed    The message to display.
	 */
	public $message;

	/**
	 * @var  string   The type of message.
	 */
	public $type;

	/**
	 * Creates a new Message instance.
	 *
	 * @param   string   Type of message
	 * @param   mixed    Message to display, either string or array
	 */
	public function __construct($type, $message)
	{
		$this->type = $type;
		$this->message = $message;
	}

	/**
	 * Clears the message from the session.
	 */
	public static function clear()
	{
		Session::instance()->delete('flash_message');
	}

	/**
	 * Displays the message.
	 *
	 * @param    string    Name of the view
	 * @return   string    Message to string
	 */
	public static function display($view = null)
	{
		$html = "";
		$msg = self::get();

		if($msg)
		{
			if ($view === null)
			{
				$view = self::$default;
			}

			self::clear();
			$html = View::factory($view)->set('message', $msg)->render();
		}

		return $html;
	}

	/**
	 * The same as display - used to mold to Kohana standards.
	 *
	 * @param    string    Name of the view
	 * @return   string    HTML for message
	 */
	public static function render($view = null)
	{
		return self::display($view);
	}

	/**
	 * Gets the current message.
	 *
	 * @return   mixed    The message or FALSE
	 */
	public static function get()
	{
		return Session::instance()->get('flash_message', FALSE);
	}

	/**
	 * Sets a message.
	 *
	 * @param   string   Type of message
	 * @param   mixed    Array/String for the message
	 */
	public static function set($type, $message)
	{
		Session::instance()->set('flash_message', new Message($type, $message));
	}

	/**
	 * Sets an error message.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function error($message)
	{
		self::set(Message::ERROR, $message);
	}

	/**
	 * Sets a notice.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function notice($message)
	{
		self::set(Message::NOTICE, $message);
	}

	/**
	 * Sets a success message.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function success($message)
	{
		self::set(Message::SUCCESS, $message);
	}

	/**
	 * Sets a warning message.
	 *
	 * @param    mixed    String/Array for the message(s)
	 */
	public static function warn($message)
	{
		self::set(Message::WARN, $message);
	}

}
