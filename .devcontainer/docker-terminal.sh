#!/usr/bin/env bash

# Executed on new terminal session

export PATH="/workspace/bin:/workspace/node_modules/.bin:/workspace/vendor/bin:$PATH"

alias bashly='docker run --rm -it --user $(id -u):$(id -g) --volume "$PWD:/app" dannyben/bashly'
