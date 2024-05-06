
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
If you use MySQL, create a new database hotel-hebat (example) then migrate project to generate table

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
