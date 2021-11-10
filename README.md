for Run the Project

- make a Clone on Your server location like xampp->htdocs
- 
- write : composer update
        : composer dump-autoload
        : Rename env folder from  [ .env.example ] to [ .env ] 
        : create new Database like [task]
        : write your database name in .env file [DB_DATABASE=task] 
        : write php artisan key:generate 
        :       php artisan migrate --seed
        :       php artisan cach:clear
        :       php artisan config:cache
    imp :       create folder [images] inside [ storage->app->public ]
        :       php artisan storage:link
        :       php artisan serv
        
1- Dashboard url: http://127.0.0.1:8000/admin/login
    email       : admin@admin.com
    password    : password
    
2- EndUser url: http://127.0.0.1:8000/
