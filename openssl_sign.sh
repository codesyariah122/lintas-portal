#!/bin/bash
# @author Puji Ermanto <pujiermanto@gmail.com>


read -p "Generate private key without passphrase? (yes/no): " confirm

if [ "$confirm" == "yes" ] || [ "$confirm" == "y"  ]; then
    if openssl genpkey -algorithm RSA -out private.pem -aes256 -pass pass:;
    then
        mv private.pem App/Data/Keys/private.pem
        chmod 777 App/Data/Keys/private.pem
        echo "Private key has been generated and moved to /var/www/lintas-portal/App/Data/Keys/private.pem"
    else
        echo "Failed to generate private key."
    fi
else
    echo "Operation canceled."
fi
