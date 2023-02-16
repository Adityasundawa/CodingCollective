# CodingCollective Challenge
CRUD with Oauth2



Note:


Clone the repository

    git clone https://github.com/Adityasundawa/CodingCollective

Switch to the repo folder

    cd CodingCollective

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

Documentation Swagger:
https://app.swaggerhub.com/apis/ADITYASUNDAWACO/CodingCollective/1.0.0

