crud-app

Two small projects, each in its own folder. One keeps state in memory on the client, the other uses a real database.

ToDo-list-react

React todo list built with Vite. No backend. Tasks live in a single array inside useState. Adding a task pushes it into the array and the list re-renders. Moving a task up or down swaps its position with the neighbor in that array, then calls setTasks. Deleting removes the task by index. Everything is lost on refresh, that's intentional. The point is to show local state with useState, nothing else.

Run it:

cd ToDo-list-react
npm install
npm run dev

Open the URL the terminal prints.

alisson-laravel

Laravel app for managing users. Real database, full CRUD. UserController handles store, edit, update, delete. store validates the input (name required, email valid and unique, age numeric if present), creates the user, redirects with a success message. edit and update fetch and modify the record. delete removes it. Views are in form.blade.php and list.blade.php.

Run it:

cd alisson-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

Runs on http://127.0.0.1:8000.

.env is not in the repo because it holds database credentials. Copy .env.example, set your database details, then run migrate.
