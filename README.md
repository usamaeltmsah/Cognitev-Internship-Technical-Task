# Cognitev-Internship-Technical-Task
This task is to: 
1. create a RESTful campaign resource. Campaign data will be:
   * Name 
   * Country
   * Budget
   * Goal
   * Category. If category is not provided, I used this [API](https://ngkc0vhbrl.execute-api.eu-west-1.amazonaws.com/api/?url=https://arabic.cnn.com/) to extract it.
2. Create a reporting endpoint that accepts:
   - **Dimensions** (used to group data by these fields)
   - **Fields** (Array of fields to return in each campaign)
   - **Duration** [start and end dates]
3. **Develop a UI** to draw the analysis results generated from the analyze service (mentioned
in point 2)
## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.
### Prerequisites
You need to install `PHP 7.0.9`, some softwares as `Xampp` and `Laravel`. You can follow this 10 minutes video tutorial for installation processes:
* [Linux](https://www.youtube.com/watch?v=3DeJCwmlOys)
* [Windows](https://www.youtube.com/watch?v=1exF0kNKCvQ)
### Installing
A step by step series of examples that tell you how to get a development env running

**`HINT:`** 
This steps are for Linux OS, for windows you need to do similar.
- First you need to download the project, so open the terminal and write:
```
git clone https://github.com/usamaeltmsah/Cognitev-Internship-Technical-Task
```
- Then it's require to install composer
```
composer install
```
- Make copy of `.env.example` file with the name `.env`
```
cp .env.example .env
```
- Remove the file `.env.example`
```
rm .env.example
```
- Open .env file and change these fields
```
DB_DATABASE= {Your database name}
DB_USERNAME= {Your username}
DB_PASSWORD= {Your password, default is ''}
```
Example:

```
DB_DATABASE=myDB
DB_USERNAME=root
DB_PASSWORD=''
```
- Open `/config/database.php` and change the required data
 ```
 'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'your database name'),
            'username' => env('DB_USERNAME', 'user name'),
            'password' => env('DB_PASSWORD', 'password'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
 ```
 
 Example
 
  ```
 'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'myDB'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ],
 ```
 
- Then you need to install `composer`
```
composer install
```
- Run this command to create the required tables in your database
```
php artisan migrate
```
- Check your database now, there is a new table called `data` created, right?

- To run the project you need to make serve request
```
php artisan serve
```
If it give you an error, try this command first to generate a key for you
```
php artisan key:generate
```

Try the previous command again
```
php artisan serve
```
- Open the url now `http://127.0.0.1:8000/` and begin the journey

## Running the tests
- Url to show the table data in json format `http://127.0.0.1:8000/data/`
- Url to add new row in the table `http://127.0.0.1:8000/data/create/`
- Url to select data from table `http://127.0.0.1:8000/data/select/{first, second, ...}/`
- Url to group data by some fields `http://127.0.0.1:8000/data/grouped/{first, second, ...}/`
- Url to group and select data by some fields `http://127.0.0.1:8000/data/groupandselect/{first, second, ...}/{first, second, ...}/`

### Break down into end to end tests


## Authors

* **Usama Fouad** - Initial work -[Usama Fouad](https://github.com/usamaeltmsah)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
