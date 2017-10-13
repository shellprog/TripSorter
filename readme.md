# Installation

Download and install composer from below website
https://getcomposer.org/

Once composer is downloaded, open terminal/ command prompt in trip sorter project folder and run

    php composer.phar install --prefer-dist

# Running Tests

Run the following command in project folder to run all tests

    vendor/bin/phpunit tests/
    
# Extending

We can easily add new functionality in specified transport since our architecture is have separate transport models and interfaces. 
To add a new transport just create an interface for the transport and create a model which extends AbstractBoardingClass and implements newly created interface.

# Output

To check the output run following command from project folder

    php index.php
    
sort() method will sort the boarding cards and will return the sorted cards.
printDescription() method will return the description which can be printed by each transport type.