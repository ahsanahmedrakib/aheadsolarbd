<p align="center">
    <img src="https://aheadsolarbd.com/favicon.ico" width="80" alt="Ahead Solar Logo">
</p>

<h1 align="center">Ahead Solar Bangladesh</h1>

<p align="center">
    Official website for <strong>Ahead Solar</strong> (<a href="https://aheadsolarbd.com">aheadsolarbd.com</a>) — a solar energy solutions provider in Bangladesh.
</p>

## Overview

Ahead Solar BD is a full-featured corporate website built with **Laravel** that presents the company's services, projects, and solutions alongside a complete admin panel for managing site content.

### Public Site

- Landing page with animated hero slider, services, featured projects and customer reviews
- About pages: company profile, sister concerns, Message from Managing Director, management team
- Services listing with individual service detail pages
- Projects portfolio with category filtering and detail pages
- Solar financing solutions: CAPEX, OPEX, Build–Operate–Transfer (BOT) and a cost comparison
- Dedicated landing page for **Palash Charging Station** (EV charging)
- Contact page with Google Map integration and a form backed by the admin panel

### Admin Panel

- Authenticated dashboard at `/admin`
- Full CRUD management for services, projects, team members and hero sliders
- Inbox for contact messages, Palash EV charging applications and customer reviews (with approval workflow)
- User administration with role-based access
- Site settings editor (contact details, Google Map, and general metadata)

## Tech Stack

- **Backend:** Laravel (PHP 8.3+)
- **Frontend:** Blade templates, Tailwind CSS 4, Swiper for carousels
- **Build tool:** Vite
- **Database:** MySQL
- **Testing:** PHPUnit / Pest

## Requirements

- PHP ^8.3
- Composer
- Node.js (for frontend assets)
- MySQL

## Installation

```bash
# 1. Install PHP dependencies
composer install

# 2. Set up environment
cp .env.example .env
php artisan key:generate
```

Configure your database credentials in `.env`, then run:

```bash
# 3. Create tables
php artisan migrate

# 4. Install and build frontend assets
npm install
npm run build

# 5. Start the dev server
php artisan serve
```

Existing installs can bootstrap everything in one step:

```bash
composer run setup
```

## Default Admin Credentials

These are defined in `.env.example` — change them in production!

- **Email:** `admin@aheadsolarbd.com`
- **Password:** `Admin@123`

## Development

```bash
composer run dev          # Laravel + Vite dev servers
npm run dev               # Vite only
npm run build             # Production asset build
composer run test         # Run the test suite
```

## Useful Scripts

- `composer run setup` — full bootstrap (composer install, env, migrate, build assets)
- `composer run dev` — start the Laravel and Vite dev servers

## License

Proprietary. All rights reserved to Ahead Solar Bangladesh.