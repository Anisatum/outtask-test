## Database

- Initially run with sqlite for ease of use
- Run ` php artisan migrate` to set up

## Website & API

- Run `php artisan serve`

![screenshot](https://github.com/Anisatum/outtask-test/assets/157124339/ca593164-b79f-44b1-9141-7a955426289c)

- Routes:
- `http://localhost:8000/` (website)
- `http://localhost:8000/api/employees/get` (API fetching / syncing with API)
- `http://localhost:8000/api/employees/delete` (deleting employees)

## CSV export 

- Manual run with `php artisan schedule:outtask:export-employees`
- Scheduled in `app/Console/Kernel.php`
