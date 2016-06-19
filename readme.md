# GetWings Internship Test Project

This Project is developed using Laravel framework.
Laravel is a web application framework with expressive, elegant syntax.

This app fetches tweets of `kamaalrkhan` and display within a table.
Refresh button for refeshing page.
Pagination with AJAX infinite scroll.

## Screenshot
![Screenshot1](/storage/1.jpg?raw=true "Screenshot 1")
-------------------------------------------------------------------
![Screenshot2](/storage/2.jpg?raw=true "Screenshot 2")

## Installation Process

To install clone the repo:

``git clone https://www.github.com/kinnngg/whitespace.git``

``cd whitespace``

``composer install``

``php artisan key:generate``

rename `.env.example` file to `.env` if not already done by composer.
open `.env` and place all credentials there.
**Database credentials and Twitter keys are mandatory**

``php artisan migrate``

You are done. Gud Luck!