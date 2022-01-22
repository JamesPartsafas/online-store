#!/bin/bash

echo "START"

# Run all of your outstanding migrations 
php artisan migrate --force

echo "DONE"
