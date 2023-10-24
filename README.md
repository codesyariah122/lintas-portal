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

#### If use nginx

**Adding this line inside sites conf**

```
location / {
         try_files $uri $uri/ /index.php$is_args$args;
         if ($request_method = 'OPTIONS') {
         add_header 'Access-Control-Allow-Origin' '*';
         add_header 'Access-Control-Allow-Methods' 'GET, POST, OPTIONS';
         add_header 'Access-Control-Allow-Headers' 'X-Api-Key, Content-Type';
         add_header 'Access-Control-Max-Age' 1728000;
         add_header 'Content-Type' 'text/plain; charset=utf-8';
         add_header 'Content-Length' 0;
         return 204;
         }
         add_header 'Access-Control-Allow-Origin' '*';
         add_header 'Access-Control-Allow-Methods' 'GET, POST, OPTIONS';
         add_header 'Access-Control-Allow-Headers' 'X-Api-Key, Content-Type';
    }
```

**Manual create openssl key**

```
openssl genpkey -algorithm RSA -out private.pem -aes256
```

**Remove passphrase**

```
openssl rsa -in private.pem -out private.pem
```
