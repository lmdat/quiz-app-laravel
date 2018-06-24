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

## Laravel Controllers
- The controllers are in the **framework/app/Http/Controllers** folder
- **QuizController**.php handles for Plain PHP
- **V1Controller.php** handles for Rest API called from Vuejs

## Laravel Middleware
- I create the middleware named Cors.php in the **framework/app/Http/Middleware** folder to handle the CORS (Cross-Origin Resource Sharing) if you want to run the Vuejs in other domain or different port(same domain)

## Two versions of frontend URL and Rest API endpoint:
- Suppose that my Laravel Quiz App is installed in the folder **quiz** under the web root: http://localhost:8080/quiz
- Plain PHP version:
```
http://localhost:8080/quiz
```
- Vuejs version:
```
http://localhost:8080/quiz/vue
```
- The API enpoint:
```
http://localhost:8080/quiz/api/v1/quiz
http://localhost:8080/quiz/api/v1/result
http://localhost:8080/quiz/api/v1/user
```
