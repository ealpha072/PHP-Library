# php-library
A library management system with user and admin section. The users are the students while the librarian is the admin.

## User abilities
Users can:
* View borrowed books
* Change their profiles such as passwords, email address
* Contact the admin***

## ADMIN abilities
The admin can
* Add a student
* Give out books and post fines for unreturned books
* Issue books that are borrowed
* Delete users 

## Technologies used
* PHP
* PHPmyadmin
* SQL
* Jquery
* Bootstrap
* CSS

## How it works

On loading of the page, a user can either register or login with his credentials. Once logged in, the user can view the number of books borrowed, credits earned, fines collected etc. Should there be inquiries, the user can contact the admin through a form. The dashboard contains links to various pages.

## To do 
* Improve security to guard against attacks by:
  * Filtering form data
  * Hashing passwords
* remember to validate check box for remember me...code in remnants.php
* Add validation for address/phone and maybe image...
* Check on the password change error display
* Fix the error of search results displaying on top of profile page
