## Simple Blackjack Calculator

This is a simple web app built upon Laravel 4.2 to meet the business requirements of a coding task.

The task is as follows:

>Write a program which accepts two inputs, representing two playing cards out of a standard 52 card deck. Add these two cards together to produce a blackjack 
>score, and print the score on the screen for the output.
>Cards will be identified by the input, the first part representing the face value from 2-10, plus A, K, Q, J. The second part represents the suit S, C, D, H.
>The blackjack score is the face value of the two cards added together, with cards 2-10 being the numeric face value, and A is worth 11, and K, Q, J are each 
>worth 10.

I have provided 2 interfaces which can both meet all of the criteria above.

### Dependancies

* PHP 5.4, with Mcrypt extension installed and enabled
* [Composer package manager](http://getcomposer.org)

#### Optional
* A web server, if access to HTTP API is required

### Installation

1. Clone this repository using git clone (git clone git@github.com:perverse/blackjack.git)
2. Browse to the root of the repository and use [composer](http://getcomposer.org) to install dependancies (composer install)
4. Ensure /app/storage is writable by the current user and by your web server
3. Done!

### CLI Interface

To begin using the CLI interface, go to your installations root directory and type "/path/to/your/php artisan blackjack:simple" and follow the instructions.

### HTTP Interface

1. Direct an Apache Virtual Host/Nginx Server Block/IIS Website to the repositories /public directory.
2. Access the HTTP API via http://your-virtual-host/blackjack?card[]=AH&card[]=10C

### License

The MIT License (MIT)

Copyright (c) 2014 Ronnie Pyne
Laravel Copyright (c) 2014 Taylor Otwell

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
