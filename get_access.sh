#!/bin/bash

env_file=".env"
api_key="API_KEY=$(openssl rand -hex 16)"

read -p "Are your sure to create a new API_KEY in $env_file? (y/n): " confirmation

if [ "$confirmation" = "y" ]; then
    sed -i "/^API_KEY=/s/.*/$api_key/" "$env_file"
    echo "API_KEY Successfully created in $env_file."
else
    echo "There are no changes to $env_file."
fi
