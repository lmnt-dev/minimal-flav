#!/usr/bin/env bash
shopt -s expand_aliases

# Executed on container post creation

echo "source /workspace/.devcontainer/docker-terminal.sh" >> ~/.zshrc
source /workspace/.devcontainer/docker-terminal.sh

echo "Installing zsh-autosuggestions"
git clone -q https://github.com/zsh-users/zsh-autosuggestions \
    ~/.oh-my-zsh/custom/plugins/zsh-autosuggestions

echo "Installing composer dependencies"
composer install
