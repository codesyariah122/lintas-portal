env_file=".env"
api_key="API_KEY=$(openssl rand -hex 16 | tr -d '\n' | tr -dc '[:alnum:]!@#$%^&*()_+')"
secret_key_confirmation=""

while [ "$secret_key_confirmation" != "y" ] && [ "$secret_key_confirmation" != "n" ]; do
  read -p "Are you sure to create a new API_KEY and SECRET_KEY in $env_file? (y/n): " secret_key_confirmation
done

if [ "$secret_key_confirmation" = "y" ]; then
  secret_key_base64=$(openssl rand -base64 32 | tr -d '\n' | tr -dc '[:alnum:]!@#$%^&*()_+')
  sed -i "/^API_KEY=/s/.*/$api_key/" "$env_file"
  sed -i "/^SECRET_KEY=/s~.*~SECRET_KEY=$secret_key_base64~" "$env_file"
  echo "API_KEY & SECRET_KEY Successfully created in $env_file."
else
  echo "There are no changes to $env_file."
fi



#!/bin/bash
# @author Puji Ermanto <pujiermanto@gmail.com>

env_file=".env"
api_key="API_KEY=$(openssl rand -hex 16 | tr -d '\n' | tr -dc '[:alnum:]!@#$%^&*()_+')"

read -p "Are your sure to create a new API_KEY in $env_file? (y/n): " confirmation

if [ "$confirmation" = "y" ]; then
    sed -i "/^API_KEY=/s/.*/$api_key/" "$env_file"
    echo "API_KEY Successfully created in $env_file."
else
    echo "There are no changes to $env_file."
fi
