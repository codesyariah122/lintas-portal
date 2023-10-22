# LINTAS PORTAL

#### First import db

**_import `db_lintas.sql` to your database, use database client like phpmyadmin or other_**

**Run the command here:**

```
composer install
cp env-example .env
chmod +x get_access.sh
chmod +x openssl_sign.sh
./get_access.sh
./openssl_sign.sh

```

**Manual create openssl key**

```
openssl genpkey -algorithm RSA -out private.pem -aes256
```

**Remove passphrase**

```
openssl rsa -in private.pem -out private.pem
```
