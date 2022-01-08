## About Debuglinks

DebugLinks, the best way to debug your code.
Our mission is to help developers drastically reduce the time spent debugging their code. And this thanks to the experiences of other developers who have already encountered the same difficulties.


## Installation
After setting up this application and making sure all composer dependencies are pulled in by running `composer install`, next is to setup the `.env` file making sure that all required fields are provided.
The next step is to run theses commands to migrate the database and seeders.

To initiate the process, run the following commands:

```bash
php artisan migrate
composer dump-autoload
php artisan db:seed
```

Install maildev if it is not already done by typing the commands:
```bash
npm install -g maildev
maildev
```
For more information on maildev: https://www.npmjs.com/package/maildev

## RUN PROJECT
After all the configs please start the project with the command:
```bash
php artisan serve
```


## URL
Debuglinks official link : https://www.debuglinks.com/
