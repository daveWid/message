# Message

A flash messaging system for Kohana v3.0 and higher.

To use, download the source, extract and rename to message. Move that folder
into your modules directory and activate in your bootstrap.

## Usage
To set a flash message all it takes is the following

	Message::set($type, $message);

| Name    |  Description                                              |
|---------|-----------------------------------------------------------|
| type    | The type of message that this is (error, success, etc...) |
| message | A string or array of strings                              |

## Wrapper methods
There are also methods that are wrappers for the different types of messages.

	Message::error($message)
	Message::success($message)
	Message::notice($message)
	Message::warn($message)

When you need to get a message you can:

	echo Message::display(); or
	echo Message::render();

### Custom Views

You can also pass the name of a custom view into the `Message::display()` or
`Message::render()` functions (e.g. `Message::display('message/custom')`)

In your custom view you will get a variable `$message` that has properties of `$type`
and `$message` described above under usage.


## Messages

There are 4 constants you can use to set a message

	Message::ERROR = 'error'
	Message::NOTICE = 'notice'
	Message::SUCCESS = 'success'
	Message::WARN = 'warn'

## Style
The message class produces the following code by default.

	<ul id="message" class"type">
		<li>Message</li>
		... Repeated if an array
	</ul>

To style, set #message and the classes for the constants .error, .success, .notice, .warn

-----

### Sample Usage

I get the most mileage from this class when validating forms. Here is a quick example.

	$validation = new Validate($_POST);
	$validation->rule(.....) <-- Add rules

	if($validation->check())
	{
		// Validation passed
		Message::success('Form Success!');
		// OR -> Message::set(Message::SUCCESS, 'Form Success!');
	}
	else
	{
		// Validation failed
		Message::error($validation->errors('form');
		// OR -> Message::set(Message::ERROR, $validation->errors('form'));
	}