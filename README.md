# Y-ACT Project

This is a repository for the Y-ACT project, built using Laravel, Breeze, Spatie/Laravel-Permission, and Livewire.
<p align="left">
  <img src="https://img.shields.io/github/languages/count/ranjith-acharya/Y-ACT?style=for-the-badge">
  <img src="https://img.shields.io/github/languages/top/ranjith-acharya/Y-ACT?style=for-the-badge">
  <img src="https://img.shields.io/github/last-commit/ranjith-acharya/Y-ACT?style=for-the-badge">
</p>


## Installation

Before you begin, make sure you have the following installed:

- PHP 7.4 or later
- Composer
- Node.js
- NPM

Follow these steps to install and set up the project:

1. Clone the repository:

```
git clone https://github.com/your-username/Y-ACT.git
```

2. Install dependencies:

```
composer install
npm install
```

3. Copy the `.env.example` file to `.env`:

```
cp .env.example .env
```

4. Generate an application key:

```
php artisan key:generate
```

5. Set up your database configuration in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

6. Run database migrations:

```
php artisan migrate
```

7. Install Breeze:

```
php artisan breeze:install
```

8. Install Spatie/Laravel-Permission:

```
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
php artisan migrate
```

9. Install Livewire:

```
composer require livewire/livewire
```

10. Build assets:

```
npm run dev
```

## Usage

To start the development server, run:

```
php artisan serve
```

You can access the application at `http://localhost:8000`.

## Contributing

Contributions are welcome! Please open an issue or pull request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.