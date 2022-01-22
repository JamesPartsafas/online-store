#!/usr/bin/env bash

# This is a script to quickly set up a DB for development environments.

docker run --rm --name postgres -p 5432:5432 -d \
    -e POSTGRES_PASSWORD=postgres_password \
    -e POSTGRES_USERNAME=postgres \
    -e POSTGRES_DB=amaznot \
    postgres 

# Wait for container to start
sleep 5

# Migrate and seed database
php artisan migrate
php artisan db:seed --class=ProductSeeder


# Run the following commands to go into psql in docker container

# docker exec -it postgres bash
# psql -U postgres
# \c amaznot