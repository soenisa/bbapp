<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About
BBAPP is a personal spending application that I built to track my own spending instead of using 1 Google Sheet that I copy every year.

## Getting started
Run `sail up` to start all docker containers.

Run `sail artisan...` to run artisan commands within the main container.

The app should be available at [http://localhost:8008](http://localhost:8008)

## Transaction Model
At the core, this is appliation tracks spending. Thus each transaction is seen as an expenditure. A positive amount is correlates to a "credit" to my expenses. A negative amount is a "debit" to my exenses. And I didn't want red and negative to be overwhelming so that's why it's displayed this way.

Income is negative. Expense is positive.

## Credits
* CoreUI
* [Bat icons created by flatart_icons - Flaticon](https://www.flaticon.com/free-icons/bat)
