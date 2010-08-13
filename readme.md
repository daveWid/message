# Message

A flash messaging system for Kohana v3.0 and higher.

To use, download the source, extract and rename to message. Move that folder into your modules directory and activate in your bootstrap.

## Usage
To set a flash message all it takes is the following

Message::set( _type_, _message_ );

## Wrapper methods
There are also methods that are wrappers for the different types of messages
	Message::error(_message_)
	Message::success(_message_)
	Message::notice(_message_)
	Message::warn(_message_)

_type_: Use a constant that can be found below   
_message_:  A message string or array of message strings

When you need to get a message you can:
	echo Message::display(); or
	echo Message::render();

## Messages

There are 4 constants you can use to set a message

	Message::ERROR = 'error'
	Message::NOTICE = 'notice'
	Message::SUCCESS = 'success'
	Message::WARN = 'warn'

## Style
The message class produces the following code by default
	<ul id="message" class"_type_">
		<li>_Message_</li>
		... Repeated if an array
	</ul>

To style, set #message and the classes for the constants
.error, .success, .notice, .warn

-----

### Sample Usage

I get the most mileage from this class when validating forms. Here is a quick example.

	$validation = new Validate($_POST);
	$validation->rule(.....) <-- Add rules

	if( $validation->check() )
	{
		// Validation passed
		Message::success('Form Success!');
		// OR -> Message::set(Message::SUCCESS, 'Form Success!');
	}
	else
	{
		// Validation failed
		Message::error($validation->errors('_form_');
		// OR -> Message::set(Message::ERROR, $validation->errors('_form_'));
	}
