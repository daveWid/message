<?php

/**
 * Testing out the Message class.
 *
 * @package    Message
 * @author     Dave Widmer <dave@davewidmer.net>
 */
class MessageTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Setup the session instance
	 */
	public function setUp()
	{
		$session = new NativeSession;
		\Message\Message::set_session($session);

		parent::setUp();
	}

	/**
	 * Running through a message's lifecycle and see if everything works as planned.
	 */
	public function testLifecycle()
	{
		$this->assertFalse(\Message\Message::get());

		\Message\Message::error("There was a problem");

		$message = \Message\Message::get();
		$this->assertInstanceOf("\\Message\\Message", $message);
		$this->assertSame("There was a problem", $message->message);
		$this->assertSame('error', $message->type);

		$this->assertFalse(\Message\Message::get());
	}

}