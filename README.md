SupportBee API
========
[![Run Status](https://api.shippable.com/projects/55fede0f1895ca447416a7dd/badge?branch=master)](https://app.shippable.com/projects/55fede0f1895ca447416a7dd)
[![Coverage Badge](https://api.shippable.com/projects/55fede0f1895ca447416a7dd/coverageBadge?branch=master)](https://app.shippable.com/projects/55fede0f1895ca447416a7dd)

A PHP wrapper for the SupportBee REST API.

> You can find your API token in Settings > API Token screen. See https://developers.supportbee.com/api for more.

## Installation
In your project root, run the following:

```sh
composer require supportbee/supportbee dev-master
```

This will create a `vendor` directory (if you dont already have one), and set up the autoloading classmap.

## Usage
Once everything is installed, you should be able to load the composer autoloader in your code.

You can load the wrapper classes using namespace as:
```php
require __DIR__ . '/vendor/autoload.php';

use \SupportBee\SupportBee;
```

Now create a new object

```php
$supportbee = new SupportBee();
```

At this stage you can also supply the configuration parameter `token, company` which is used throughout the API. These can be passed directly as array:

```php
$config = array(
	'token' => 'your token',
	'company' => 'your company name'
);

$supportbee = new SupportBee($config);
```
Now the available API calls can be done using the instance. All the result from API will be returned as associative array. If any status code other than 200 is returned an exception would be thrown.

## Available API methods

**Please refer to [https://developers.supportbee.com/api](https://developers.supportbee.com/api) for avaialble parameter details.**

Incase of multiple paramters : Pass as an associative array.
All method names follow Camel Casing.


### Ticket
 1. *tickets* - Returns 15 tickets of the company in the order of their last activity. Only tickets that are not archived are returned (please see optional parameters to get archived tickets).
 2. *ticket* - Retrieves the ticket specified by the id.
 3. *searchTickets* - Returns 15 tickets of the company in the order of their last activity matching the search query.
 4. *createTicket* - Creates a ticket for the company. Pass the information for ticket as associative array.
 5. *deleteTicket* - Deletes a trashed ticket. Only Admins can delete a trashed ticket.
 6. *archiveTicket* - Archives an unarchived ticket.
 7. *unarchiveTicket* - Un-archives an archived ticket.
 8. *assignTicket* - Assign a ticket to a User or Group. The first paramter is the ticket id. The second paramter is an associative arry with index as user_id if the ticket is to be assigned to an user and group_id if the ticket is to be assigned to a group.
 9. *starTicket* - Stars an un-starred ticket.
 10. *unstarTicket* - Un-stars a starred ticket.
 11. *spamTicket* - Spam's an un-spammed ticket.
 12. *unspamTicket* - Un-spam a spammed ticket.
 13. *trashTicket* - Trashes an un-trashed ticket.
 14. *untrashTicket* - Un-trashes a trashed ticket.
 15. *addLabelToTicket* - Adds label to ticket. You can pass the ticket_id and label name as parameters.
 16. *removeLabelFromTicket* - Removes label from ticket. You can pass the ticket_id and label name as parameters.

### Reply
 1. *replies* - Retrieves all the replies of the ticket with id ticket_id.
 2. *reply* - Retrieves the reply for ticket specified by the ticket_id with id.

### Comment

 1. *comments* - Retrieves all the comments of the ticket with id ticket_id.

### Agent

 1. *agents* - Retrieves all confirmed agents of the company.
 2. *agent* - Retrieves the agent for company specified by the id.

### Label

 1. *labels* - Retrieves all the custom labels of a company.

### Groups

 1. *groups* - Retrieves all the groups of the company.

### Snippets

 1. *snippets* - Returns all the snippets of the company.

### WebHooks

 1. *webhooks* - Returns all the web hooks of the company.

## Development

Questions or problems? Please post them on the [issue tracker](https://github.com/amalfra/supportbee/issues). You can contribute changes by forking the project and submitting a pull request. You can ensure the tests are passing by running `vendor/bin/phpunit`.


UNDER MIT LICENSE
=================

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
