# Message

The message library lets you quick implement flash messages into your application.
You will need php 5.3+ to as this library uses namespaces.

## Usage

### Setup

// TODO: fill out

### Getting

To get a message all you need to do is run `get`:

``` php
<?php

\Message\Message::get();
```

If no message is found this function will return `false`.

### Setting

To set a flash message all it takes is the following:

``` php
<?php

\Message\Message::set($type, $message);
```

### Properties

Name | type | Description
-----|------|-------------
type | string | The type of message (this can be anything)
message | mixed | The message you want to pass along. This can be anything, but a string or array of strings will probably work best

## Wrapper methods

There are also methods that are wrappers for the different types of messages.

``` php
<?php

\Message\Message::error($message);
\Message\Message::success($message);
\Message\Message::notice($message);
\Message\Message::warn($message);
```

-----

Developed by [Dave Widmer](http://www.davewidmer.net).
