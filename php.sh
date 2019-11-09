#!/usr/bin/env bash

exec docker run --rm -it --volume $(pwd):/app --user $(id -u):$(id -g) --workdir /app php $@