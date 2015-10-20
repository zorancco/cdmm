#!/bin/bash

chmod +x ./tools/ -R

# php auto build, -n=don't lowercase, -o output file, root directory
#./tools/phpab.phar --lint -n -o ../libs/autoload.php ../libs
./tools/phpab.phar --lint -n -o ../libs/autoload.php ../libs ../vendor

# Then remove the build and test directories
#cd into the app root directory
cd ..
#remove the tests directory
rm tests -rf
#remove the build directory
rm build -rf
