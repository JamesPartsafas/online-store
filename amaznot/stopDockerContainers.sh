#!/usr/bin/env bash

# This is a utility script to quickly end running docker containers
docker stop $(docker ps -a -q)