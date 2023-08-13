### Zap-Map API challenge
this app is for development purposes only

## Installation

# Run to create database
php artisan create:database

# Run to migrate database
php artisan migrate

# Run to import csv file on database location table
php artisan db:seed

# Run to do feature and unit testing
php artisan test

## USAGE

Endpoint:

http://127.0.0.1:8000/api/locationswithinradius

With Paramater:
http://127.0.0.1:8000/api/locationswithinradius?latitude=51.475603934275675&longitude=-2.3807167145198114&radius=10

## Development Method
I created console command to create the database and use seeder to import the data from csv.  I used Haversine formula for getting
the locations within the radius. I used Repository design pattern to keep the code organized and reduce redundancy and make changes to the backend more easier.




