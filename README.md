
# Hotel Hebat Web App

This comprehensive hotel web application, developed using the Laravel V8 framework, offers a seamless journey from reservation to payment completion. With its intuitive interface and robust features, users can effortlessly browse available rooms, make reservations for their desired dates, manage bookings, and complete secure payments, all within a single platform. Built with a focus on user experience and efficiency, this application streamlines the entire hotel booking process for both guests and administrators, enhancing the overall experience for all stakeholders involved



## Features

- **Room Availability Search**: Users can search for room availability based on check-in dates, number of guests, and other preferences such as room type or amenities.
- **Room Descriptions**: Detailed information about each available room type, including photos, amenities, bed sizes, and pricing.
- **Room Reservation**: The ability to book rooms directly through the website by selecting check-in dates, number of rooms, and entering contact information.
- **Reservation Confirmation**: Users receive an email or confirmation message after successfully booking a room with details of their reservation.
- **Cancellation and Reservation Changes**: Feature allowing users to cancel or modify their reservations, with appropriate cancellation policies.
- **Payment Options**: Providing various convenient payment methods, such as credit cards, bank transfers, or cash payment upon arrival.
- **Calendar Integration**: Users can add their reservation details to their digital calendars to keep track of their stay dates.

## Screenshoots

![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/c16b2bf9-5049-49a5-bb8c-9fff8a8b4a32)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/6bc14de1-7dee-4bd5-a27d-9a26cecaf2f1)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/0aadcb07-d116-4141-9b84-1b5345c8ca2a)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/15bc6d78-f56c-4680-bea4-052b41dc6b39)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/ecba58e9-69a2-46a5-83cf-917676f22853)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/ce3b8c94-fe5f-443d-af86-12e417751069)
![image](https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/9c612d77-c27d-480d-8638-7bcb3752f45f)



## Tech Stack

**Framework:** Laravel, Bootstrap

**Database:** MySQL or sqlite


## Run Locally


[Download .zip file](https://github.com/fauzanlm/laravel-hotel-web-app/archive/refs/heads/main.zip) and extract to your folder

OR

Clone the project


```bash
  cd your-folder
  git clone https://github.com/fauzanlm/laravel-hotel-web-app.git
```

Go to the project directory

```bash
  cd laravel-hotel-web-app
```

Install Packages

```bash
  composer install
```
Copy .env.example to .env

```bash
  cp .env.example .env
```
Generate AppKey

```bash
  php artisan key:generate
```

Create a new database your-database-name
Open .env on your code editor and set the .env database config

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=root
DB_PASSWORD=
```

Migrate project to generate table

```bash
  php artisan migrate
```
After creating a table, we'll seeding database, run seed command

```bash
  php artisan db:seed
```
Run project

```bash
  php artisan serve
```

open your project locally : http://localhost/8000 (port and host adjust)


## Authors

- [@fauzanlm](https://www.github.com/fauzanlm)


