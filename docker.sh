#!/bin/bash
set -x
docker-compose down
docker-compose up -d
docker-compose scale web=1 php=3

