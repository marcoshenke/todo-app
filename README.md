# 📝 Todo App - Backend (Laravel 12 API)

A RESTful API built with Laravel 12 that serves as the backend for the Todo App. This API handles authentication, task management, and data persistence, providing endpoints for creating, reading, updating, and deleting (CRUD) tasks.

## 🚀 API Deployed

> [Check Helth status API](https://todo-app-x4hz.onrender.com/api/health-check)

## ⚙️ Tech Stack

-   **PHP 8.2** - Backend language
-   **Laravel 12** - PHP framework
-   **Sanctum** - Authentication for API tokens

## 📁 Most important part of the structure folder used

-   **`app/Http/Controllers/`** → Handles API logic and processes HTTP requests.
-   **`app/Models/`** → Eloquent models for database interaction.
-   **`database/migrations/`** → Defines database tables and schema changes.
-   **`routes/api.php`** → Defines API endpoints.
-   **`app/Providers/`** → Contains Laravel service providers for bootstrapping and configuring services.
-   **`config/`** → Stores configuration files for various Laravel features.

## 🛠️ How to Run Locally

1. **Clone this repository:**

    ```bash
    git clone https://github.com/your-username/todo-app-backend.git
    cd todo-app-backend

    composer install

     cp .env.example .env
     php artisan key:generate

     php artisan migrate --seed

     php artisan serve
    ```

✅ API Features

-   User authentication with Laravel Sanctum
-   Task management (Create, Read, Update, Delete)
-   Token-based authentication for secure access
-   Database migrations
-   Built-in middleware for request handling

📌 Future Improvements

-   Password confirmation via email for account security
-   Task categories and labels to improve organization
-   Task activity logs to track changes and user interactions
-   Task progress tracking (percentage-based completion)
-   Unit tests
