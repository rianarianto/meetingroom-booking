# Meeting Room Booking System

A web-based application for managing and booking meeting rooms efficiently. Built with **Laravel 9** and **SB Admin 2** dashboard template.

## Features

- **Room Management**: Add, edit, and manage meeting rooms with details like capacity and location.
- **Booking System**: 
    - Real-time room availability check.
    - Automated validation to prevent booking overlaps (time conflicts).
    - Track booking status, division, and meeting details.
- **Room Types**: Categorize rooms (e.g., Meeting Room, Discussion Room).
- **Dashboard**: Professional admin panel powered by SB Admin 2.
- **User Management**: Secure authentication and profile management.

## Tech Stack

- **Framework**: Laravel 9.x
- **Frontend**: Bootstrap 4 (SB Admin 2)
- **Database**: MySQL
- **Dependencies**: 
    - Laravel UI (for authentication)
    - Carbon (for date/time handling)
    - EasyNav (for navigation management)

## Installation

Follow these steps to set up the project locally:

1. **Clone the repository**
   ```bash
   git clone https://github.com/rianarianto/meetingroom-booking.git
   cd meetingroom-booking
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Configure Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Edit `.env` and set your database credentials.*

4. **Run Migrations and Seeders**
   ```bash
   php artisan migrate --seed
   ```
   *This will create the database tables and populate them with initial data (Admin user, time slots, and room types).*

5. **Run the Application**
   ```bash
   php artisan serve
   ```

## Default Credentials

After running the seeders, you can log in with:
- **Email**: `admin@admin.com`
- **Password**: `password`

## Project Structure (Key Files)

- `app/Http/Controllers/BookingController.php`: Core logic for booking validation and management.
- `database/migrations/`: Database schema definitions.
- `database/seeders/`: Initial data population.
- `resources/views/booking/`: Frontend views for the booking system.

## Credits

- [Laravel](https://laravel.com/)
- [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2)
- [Laravel SB Admin 2 Preset](https://github.com/aleckrh/laravel-sb-admin-2)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
