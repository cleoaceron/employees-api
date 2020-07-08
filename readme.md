# How to run app dependencies

- php composer install

# Edit the .env file to setup into your localhost
- ./.env

# How to run Migration?

- php artisan migrate

# How to run DB Seeder?

- php artisan db:seed

# How to run localhost

- php -S localhost:8000 -t public

# List of Employees Rest API?

- [POST] http://localhost:8000/employees/add/
- [POST] http://localhost:8000/employees/update/<'uuid'>
- [GET] http://localhost:8000/employees/view/<'uuid'>
- [POST] http://localhost:8000/employees/list/<'Page Number (1, 2, 3...)'>

# How to run API Testing?

- phpunit --filter {EmployeeTest}

Thank you!
