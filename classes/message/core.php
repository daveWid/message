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
	const ERROR   = 'error';
	const NOTICE  = 'notice';
	const SUCCESS = 'success';
	const WARN    = 'warn';

	/**
	 * @var	string	The type of message.
	 */
	public $type;

	/**
	 * @var	mixed	The message to display.
	 */
	public $content;

	/**
	 * @var  string  Default message display view.
	 */
	public static $default = 'message/basic';

	/**
	 * Creates a new Falcon_Message instance.
	 *
	 * @param	string	Type of message
	 * @param	mixed	Message to display, either string or array
	 */
	public function __construct($type, $content)
	{
		$this->type    = $type;
		$this->content = $content;
	}

	public static function factory($type, $content)
	{
		return new Message($type, $content);
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
	 * @param   string  Filename of view to render
	 * @return	string	Message to string
	 */
	public static function display($view = NULL)
	{
		if ($view === NULL)
		{
			$view = Message::$default;
		}

		$messages = self::get();

		// if (($messages = self::get()) !== NULL)
		// {
			self::clear();
			return View::factory($view, array('messages' => $messages));
		// }
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
		return Session::instance()->get('flash_message', array());
	}

	/**
	 * Sets a message.
	 *
	 * @param	string	Type of message
	 * @param	mixed	Array/String for the message
	 * @return	void
	 */
	public static function set($type, $content)
	{
		$session = Session::instance();

		$messages = $session->get('flash_message', array());

		$messages[] = Message::factory($type, $content);

		$session->set('flash_message', $messages);
	}

	/**
	 * Sets an error message.
	 *
	 * @param	mixed	String/Array for the message(s)
	 * @return	void
	 */
	public static function error($content)
	{
		self::set(Message::ERROR, $content);
	}

	/**
	 * Sets a notice.
	 *
	 * @param	mixed	String/Array for the message(s)
	 * @return	void
	 */
	public static function notice($content)
	{
		self::set(Message::NOTICE, $content);
	}

	/**
	 * Sets a success message.
	 *
	 * @param	mixed	String/Array for the message(s)
	 * @return	void
	 */
	public static function success($content)
	{
		self::set(Message::SUCCESS, $content);
	}

	/**
	 * Sets a warning message.
	 *
	 * @param	mixed	String/Array for the message(s)
	 * @return	void
	 */
	public static function warn($content)
	{
		self::set(Message::WARN, $content);
	}

}
