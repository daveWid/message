<?php

/**
 * Testing out the Message test.
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
	 * Running through a messages lifecycle and see if everything works as planned.
	 */
	public function testLifecycle()
	{
		$this->assertFalse(\Message\Message::get());

		\Message\Message::error("There was a problem");

		$message = \Message\Message::get();
		$this->assertSame("There was a problem", $message->message);
		$this->assertSame('error', $message->type);

		$this->assertFalse(\Message\Message::get());
	}

}