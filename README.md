## Frontend Dependencies
- Please use bower to update the dependencies in the **bower.json** file in the root folder
```
bower install
```

## Database script
- Use the file **quiz_db.sql** in the **db_script** folder to create databse with the name is **quiz_db**
- The prefix of all the tables is **qz_**

## Laravel
- For conventnient, I create the **framework** folder in the root directory and move the Laravel files and folders into here.

- Install Laravel packages: go to the framework folder and run composer command:
```
composer install
```

## .env file
- Please create the .env file by copy from .env.example file
- Create the variable **DB_TABLE_PREFIX** with the value is **qz_**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quiz_db
DB_TABLE_PREFIX=qz_
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Generate APP_KEY
- After create the .env file, use the artisan command to create the APP_KEY. Go to the **framework** folder and run the command:
```
php artisan key:generate
```
