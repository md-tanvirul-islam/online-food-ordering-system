# Set the project:
## Run these command one by one.
### ***** PHP and Composer have to be installed in your machine to run these commands. *****

#### steps:
  1. Clone the project in your machine or download the project zip file and unzip the project file.
  2. Go to the project root folder.
  3. make copy of .env.example file and rename the copied file with .env .
  4. make a database in your database system, then set the DB_CONNECTION, DB_HOST,  DB_PORT, DB_DATABASE(database name), DB_USERNAME, DB_PASSWORD in the .env file
  3. Run in the terminal 'composer update' in the project's root folder
  4. Run in the terminal 'php artisan migrate:fresh --seed'
  5. Now run 'php artisan serve' in the terminal.

 ### Admin User:
    mail:admin@admin.com
    password: adminPass




