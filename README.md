<div align="center">

# 🏨 Hotel Hebat - Web Application

**An intuitive, full-featured Hotel Management & Reservation System built on the Laravel framework.**

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-%5E8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.1-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)
[![CI Tests](https://img.shields.io/github/actions/workflow/status/fauzanlm/laravel-hotel-web-app/tests.yml?branch=main&label=CI%20Quality&style=for-the-badge&logo=github-actions&logoColor=white)](https://github.com/fauzanlm/laravel-hotel-web-app/actions)

<p align="center">
  <a href="#-about-the-project">About</a> •
  <a href="#-key-features">Key Features</a> •
  <a href="#-user-roles--demo-credentials">Demo Credentials</a> •
  <a href="#-database-schema--erd">Database Schema</a> •
  <a href="#-system-requirements">Requirements</a> •
  <a href="#-installation-guide">Installation</a> •
  <a href="#-modernization--upgrade-roadmap">Modernization Roadmap</a>
</p>

</div>

---

## 📖 About the Project

**Hotel Hebat** is an end-to-end hotel reservation and administration web portal designed to deliver a smooth guest experience from room browsing to invoice generation, while providing staff and managers with complete oversight of rooms, transactions, and check-ins.

Built using Laravel with multi-tier role-based access control (RBAC), the system streamlines daily hospitality workflows for guests, receptionists, and administrators.

---

## ✨ Key Features

### 👤 Guest / Customer
- **Room Catalog & Details:** Browse rooms categorized by types with real-time price, facility tags, and photo galleries.
- **Online Booking:** Select check-in & check-out dates, guest counts, and room quantity with instant room allocation.
- **Payment Verification:** Upload payment receipts/proofs directly into the portal.
- **Digital Invoices & Tickets:** Download or print PDF booking confirmations with integrated QR codes for rapid front-desk verification (`barryvdh/laravel-dompdf` + `simplesoftwareio/simple-qrcode`).
- **Booking Management:** Track active reservation statuses and cancel pending reservations before confirmation.

### 🛎️ Front Desk / Receptionist
- **Reservation Processing:** Inspect incoming bookings, filter by date/guest, and transition orders through status stages (`Process`, `Verified`, `Failed`, `Rejected`).
- **Streamlined Check-In & Check-Out:**
  - One-click check-in for pre-booked guests.
  - Direct walk-in personal data check-in (`checkin-pdata`).
  - Automated room occupancy state toggle (`Vacant` ➔ `Occupied` ➔ `Vacant`).
- **Payment Reconciliation:** Review and approve customer-uploaded payment receipts or upload manual proofs on the spot.
- **Activity Logbook:** Transparent audit trail of check-ins, check-outs, and order status updates.

### 🛡️ Admin Management
- **Dashboard Overview:** Real-time visibility into overall bookings, room occupancy, and revenue streams.
- **Room Management:** CRUD operations for individual hotel room numbers, types, and operational states.
- **Room Types & Pricing:** Configure room categories, amenities, pricing per night, and gallery photos.
- **Facility Management:** Maintain hotel-wide amenities (swimming pool, restaurant, gym, Wi-Fi) and in-room facilities.
- **System Audit Logs:** Full event logging of operational executions with timestamp and executor IDs.

---

## 📸 Screenshots

<div align="center">
  <table>
    <tr>
      <td align="center"><b>Landing Page & Hero</b></td>
      <td align="center"><b>Room Selection & Details</b></td>
    </tr>
    <tr>
      <td><img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/c16b2bf9-5049-49a5-bb8c-9fff8a8b4a32" width="450" alt="Landing Page"></td>
      <td><img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/6bc14de1-7dee-4bd5-a27d-9a26cecaf2f1" width="450" alt="Room Details"></td>
    </tr>
    <tr>
      <td align="center"><b>Admin Dashboard</b></td>
      <td align="center"><b>Receptionist Management</b></td>
    </tr>
    <tr>
      <td><img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/0aadcb07-d116-4141-9b84-1b5345c8ca2a" width="450" alt="Admin Dashboard"></td>
      <td><img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/15bc6d78-f56c-4680-bea4-052b41dc6b39" width="450" alt="Receptionist Management"></td>
    </tr>
    <tr>
      <td align="center"><b>Booking & Reservation</b></td>
      <td align="center"><b>Payment & Invoice Ticket</b></td>
    </tr>
    <tr>
      <td><img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/ecba58e9-69a2-46a5-83cf-917676f22853" width="450" alt="Booking"></td>
      <td><img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/ce3b8c94-fe5f-443d-af86-12e417751069" width="450" alt="Payment Proof"></td>
    </tr>
  </table>
  <br>
  <img src="https://github.com/fauzanlm/laravel-hotel-web-app/assets/70043864/9c612d77-c27d-480d-8638-7bcb3752f45f" width="800" alt="Invoice Details">
</div>

---

## 👥 User Roles & Demo Credentials

When the database seeders are executed (`php artisan db:seed`), the following test accounts are automatically provisioned:

| Role | Name | Email | Password | Dashboard URL | Capabilities |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Admin** | Hamba Allah | `adminhh@gmail.com` | `hhebatadmin` | `/admin` | Rooms, Room Types, Hotel Facilities, Room Facilities, System Logs |
| **Receptionist** | Receptionis | `receptionis@gmail.com` | `hhebatreceptionis` | `/receptionis` | Reservation verification, Check-In, Check-Out, Upload payment proofs |
| **Customer** | Daniel | `daniel14@gmail.com` | `danielqwe` | `/transactions` | Booking rooms, payment proof upload, print PDF tickets |
| **Customer** | Muhammad Fauzan | `fauzan14072004@gmail.com` | `mfau1407` | `/transactions` | Booking rooms, payment proof upload, print PDF tickets |

---

## 🗄️ Database Schema & ERD

### Entity-Relationship Diagram

```mermaid
erDiagram
    USERS ||--o{ TRANSACTIONS : "places"
    USERS ||--o{ PAYMENTS : "submits"
    USERS ||--o| CUSTOMERS : "profile"
    TYPE_ROOMS ||--o{ ROOMS : "categorizes"
    ROOMS ||--o{ TRANSACTIONS : "assigned_to"
    TRANSACTIONS ||--o| PAYMENTS : "settled_by"
    TRANSACTIONS ||--o{ LOGS : "audited_by"

    USERS {
        bigint id PK
        string name
        string email
        string role "admin | resepsionis | customer"
        string phone
        string password
    }
    CUSTOMERS {
        bigint id PK
        bigint user_id FK
        string name
        string address
        string gender "male | female"
        string job
        date birthdate
    }
    TYPE_ROOMS {
        bigint id PK
        string name
        string foto
        string price
        string facilities
        text information
    }
    ROOMS {
        bigint id PK
        string type_id FK
        string number
        string status "v (vacant) | r (reserved) | o (occupied)"
    }
    TRANSACTIONS {
        bigint id PK
        string user_id FK
        string room_id FK
        string check_in
        string check_out
        string many_room
        string status "waiting for payment | process | verified | checked in | checked out | canceled"
    }
    PAYMENTS {
        bigint id PK
        string user_id FK
        string transaction_id FK
        string price
        string bukti
    }
    FACILITIES {
        bigint id PK
        string facility_name
        text detail
    }
    FACILITY_ROOMS {
        bigint id PK
        string facility_name
    }
    LOGS {
        bigint id PK
        string transaction_id FK
        string log
        string executor_id FK
    }
```

### Room & Transaction Lifecycle States
- **Room Statuses:**
  - `v` (**Vacant / Available**): Ready to be booked.
  - `r` (**Reserved**): Blocked by an active booking.
  - `o` (**Occupied**): Guest has completed check-in.
- **Transaction Statuses:**
  `waiting for payment` ➔ `process` ➔ `verified` ➔ `checked in` ➔ `checked out` *(or `canceled`, `failed`, `rejected`)*.

---

## 💻 System Requirements

- **PHP:** `>= 8.2` (compatible with PHP 8.2 and 8.3)
- **Composer:** `>= 2.0`
- **Node.js & NPM:** Node.js `>= 16.x` & NPM `>= 8.x`
- **Database:** MySQL `>= 5.7` / MariaDB `>= 10.3` or SQLite `>= 3.8`
- **PHP Extensions:** `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `gd` (for QR Code generation)

---

## 🚀 Installation Guide

### Step 1: Clone the Repository
```bash
git clone https://github.com/fauzanlm/laravel-hotel-web-app.git
cd laravel-hotel-web-app
```

### Step 2: Install Dependencies
```bash
# Install PHP Composer dependencies
composer install

# Install Frontend NPM dependencies
npm install
```

### Step 3: Configure Environment
```bash
# Copy example environment configuration
cp .env.example .env

# Generate application encryption key
php artisan key:generate
```

### Step 4: Configure Database
Open `.env` in your preferred editor and set your database connection details:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_hotel
DB_USERNAME=root
DB_PASSWORD=
```
*(Optional: For quick testing with SQLite, set `DB_CONNECTION=sqlite` and create an empty file: `touch database/database.sqlite`)*

### Step 5: Run Migrations and Seeders
```bash
# Run schema migrations and populate demo accounts & rooms
php artisan migrate --seed
```

### Step 6: Link Storage Directory
Ensure public access to uploaded photos and payment proofs:
```bash
php artisan storage:link
```

### Step 7: Compile Assets & Run Local Server
```bash
# Compile frontend assets
npm run dev

# Start local PHP server
php artisan serve
```

Access the application in your browser:
👉 **http://127.0.0.1:8000**

---

## 🧪 Testing & Continuous Integration

This repository includes a production-ready CI workflow template located at [`.github/workflows.example/tests.yml`](.github/workflows.example/tests.yml):

- **Composer Lock & Spec Validation**: `composer validate --strict`
- **PHP Syntax & Linting**: Syntax inspection across all controllers, models, routes, migrations, and configs.
- **Unit & Feature Tests**: Execution of PHPUnit suites using SQLite in-memory database.

### Enabling GitHub Actions CI
To activate GitHub Actions in your repository fork or origin:
```bash
# 1. Enable workflow scope if using GitHub CLI
gh auth refresh -s workflow

# 2. Activate the workflow template
mkdir -p .github/workflows
cp .github/workflows.example/tests.yml .github/workflows/tests.yml
git add .github/workflows/tests.yml
git commit -m "ci: activate GitHub Actions workflow"
git push
```

Run the test suite locally:
```bash
vendor/bin/phpunit
# or
php artisan test
```

---

## 🏗️ Modernization & Upgrade Roadmap

The project has been upgraded to **Laravel 10** (`v10.50.3`) running on **PHP 8.2+**. Future modernizations can target **Laravel 11+** and **Vite**:

```mermaid
flowchart LR
    A["Laravel 8.x<br/>(PHP 8.0/8.1)"] --> B["Laravel 10.x<br/>(PHP 8.2 - 8.3) ✅"]
    B --> C["Laravel 11.x<br/>(PHP 8.2 - 8.4)"]
    C --> D["Vite Migration<br/>(Webpack Mix ➔ Vite)"]
```

### Completed Migration Checklist (Laravel 10)

| Component / Package | Upgraded Version | Status | Notes & Actions |
| :--- | :--- | :---: | :--- |
| **PHP Runtime** | `^8.2` | ✅ | Compatible with PHP 8.2 and 8.3. |
| **`laravel/framework`** | `v10.50.3` | ✅ | Modernized core framework to Laravel 10. |
| **`fruitcake/laravel-cors`** | *Removed* | ✅ | Using Laravel built-in CORS (`Illuminate\Http\Middleware\HandleCors`). |
| **`facade/ignition`** | `spatie/laravel-ignition: ^2.9` | ✅ | Replaced discontinued Facade Ignition with Spatie Ignition for Laravel 10. |
| **`barryvdh/laravel-dompdf`** | `^3.1` (Dompdf 3.x) | ✅ | Resolved upstream Dompdf 2.x security advisories. |
| **`laravel/sanctum`** | `v3.3.3` | ✅ | Upgraded to Sanctum v3. |
| **`laravel/ui`** | `v4.6.3` | ✅ | Retains Bootstrap 5 auth scaffolding on Laravel 10. |
| **`simplesoftwareio/simple-qrcode`** | `v4.2.0` | ✅ | Retains QR code generation on PHP 8.2. |
| **`phpunit/phpunit`** | `v10.5.66` | ✅ | Modernized test suite to PHPUnit 10 schema `<source>`. |

---

## 📄 License

This software is open-sourced under the [MIT License](LICENSE).

## 👨‍💻 Author

- **Muhammad Fauzan** ([@fauzanlm](https://github.com/fauzanlm))
