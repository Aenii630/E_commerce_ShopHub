# 🛒 ShopHub - Laravel E-Commerce Store

<div align="center">

![ShopHub](https://img.shields.io/badge/ShopHub-E--Commerce-e94560?style=for-the-badge&logo=shopping-cart)
![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap)

**Pakistan's #1 Online Shopping Store - Sadiqabad, Punjab**

### 🎬 [Watch Demo Video](https://www.youtube.com/watch?v=YOUR_VIDEO_ID)

> Click the link above to watch a full walkthrough of ShopHub
> https://drive.google.com/file/d/1urTkjIKcG0xR5vAlTzIi0OC5X4AjbDze/view?usp=drive_link

</div>

---

## 📋 Table of Contents
- [Admin Panel](#admin-panel)
- [Database](#database)
- [Project Structure](#project-structure)
- [Configuration](#configuration)
- [Contact](#contact)

---

## 🎬 Demo

| 🎥 Demo Video :https://drive.google.com/file/d/1urTkjIKcG0xR5vAlTzIi0OC5X4AjbDze/view?usp=drive_link
| 💻 GitHub | [View Code]( |https://github.com/Aenii630/E_commerce_ShopHub)

---

## 🏪 About

ShopHub is a full-featured e-commerce web application built with **Laravel 12** and **Bootstrap 5**. It provides a complete online shopping experience with product browsing, cart management, order placement, and a powerful admin panel with DataTables integration.

> **Location:** Sadiqabad, Punjab, Pakistan
> **Contact:** aenagul561@gmail.com

---

## ✨ Features

### 🛍️ Customer Features
- ✅ Beautiful Home Page with Hero Section
- ✅ Product Listing with Search & Category Filter
- ✅ Sidebar with Category Navigation
- ✅ Single Product View with Related Products
- ✅ Shopping Cart (Session Based)
- ✅ Checkout & Order Placement
- ✅ My Orders Page (Track Orders)
- ✅ Contact Form with Email Notification
- ✅ User Registration & Login
- ✅ Responsive Design (Mobile Friendly)

### 🔐 Admin Features
- ✅ Admin Dashboard with Live Stats
- ✅ Products Management (Add, Edit, Delete, Image Upload)
- ✅ Orders Management with Status Update
- ✅ Users Management
- ✅ DataTables Integration (Search, Sort, Pagination)
- ✅ Admin Sidebar Navigation
- ✅ Revenue Tracking
- ✅ Recent Orders on Dashboard

---

## 🛠️ Tech Stack

| Technology | Version | Purpose |
|-----------|---------|---------|
| Laravel | 12.x | Backend Framework |
| PHP | 8.2+ | Server Language |
| MySQL | 8.0+ | Database |
| Bootstrap | 5.3 | Frontend CSS Framework |
| Font Awesome | 6.4 | Icons |
| DataTables | 1.13.6 | Admin Tables |
| jQuery | 3.7.0 | JavaScript Library |
| Google Fonts | Poppins | Typography |

---

## ⚙️ Installation

### Requirements
- PHP >= 8.2
- Composer
- MySQL
- XAMPP (Recommended)

### Step 1: Clone Project
```bash
cd C:\xampp\htdocs
git clone   https://github.com/Aenii630/E_commerce_ShopHub
cd ecommerce
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Environment Setup
```bash
copy .env.example .env
php artisan key:generate
```

### Step 4: Database Configuration
Open `.env` file and update:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Create Database
Open phpMyAdmin at `http://localhost/phpmyadmin` and create:
```sql
CREATE DATABASE ecommerce_db;
```

### Step 6: Run Migrations & Seed
```bash
php artisan migrate:fresh --seed
```

### Step 7: Storage Link
```bash
php artisan storage:link
```

### Step 8: Start Server
```bash
php artisan serve
```

### Step 9: Open Browser
```
http://localhost:8000
```

---

## 🚀 Usage

### 👤 Customer Login
| Field | Value |
|-------|-------|
| Email | user@test.com |
| Password | password |

### 🔐 Admin Login
| Field | Value |
|-------|-------|
| Email | aenagul561@gmail.com |
| Password | admin123 |

---

## 📄 Pages

| Page | URL | Description |
|------|-----|-------------|
| 🏠 Home | `/` |, Categories, Featured Products |
| 🛍️ Products | `/products` | All Products with Filter & Search Sidebar |
| 📦 Single Product | `/products/{id}` | Product Detail & Related Products |
| 🛒 Cart | `/cart` | Shopping Cart with Summary |
| 💳 Checkout | `/checkout` | Place Order with Delivery Info |
| 📋 My Orders | `/orders` | Track Your Orders |
| 📞 Contact | `/contact` | Contact Form with Map |
| 🔑 Login | `/login` | User Login |
| 📝 Register | `/register` | User Registration |

---

## 🔐 Admin Panel

| Page | URL | Description |
|------|-----|-------------|
| 📊 Dashboard | `/admin` | Stats Cards & Recent Orders |
| 📦 Products | `/admin/products` | Manage All Products with DataTable |
| ➕ Add Product | `/admin/products/create` | Add New Product with Image |
| ✏️ Edit Product | `/admin/products/{id}/edit` | Edit Existing Product |
| 🛒 Orders | `/admin/orders` | All Customer Orders with DataTable |
| 📋 Order Detail | `/admin/orders/{id}` | Order Items & Status Update |
| 👥 Users | `/admin/users` | All Registered Users with DataTable |

---

## 🗄️ Database

### Tables

| Table | Columns | Description |
|-------|---------|-------------|
| `users` | id, name, email, password, role | Registered users with roles (admin/user) |
| `products` | id, name, description, price, stock, image, category | Product catalog |
| `orders` | id, user_id, total, status, address, phone | Customer orders |
| `order_items` | id, order_id, product_id, quantity, price | Items in each order |
| `contacts` | id, name, email, subject, message | Contact form messages |

### Order Status Flow
```
pending → processing → delivered
                    ↓
                cancelled
```

### Default Seeded Data
- **15 Products** across 6 categories
- **1 Admin User** (aenagul561@gmail.com)
- **1 Test User** (user@test.com)

### Product Categories
| Category | Products |
|----------|---------|
| 👕 Clothing | Men Shirt, Women Lawn Suit, Kurta Shalwar |
| 👜 Bags | Kids School Bag, Ladies Hand Bag, Laptop Bag |
| 💍 Accessories | Leather Wallet, Sunglasses |
| 👟 Footwear | Running Shoes, Kids Sneakers |
| 📱 Electronics | Wireless Earbuds, Smart Watch, Mobile Cover |
| 💄 Skincare | Face Wash, Moisturizer Cream |

---

## 📁 Project Structure

```
ecommerce/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── ProductController.php
│   │   │   ├── CartController.php
│   │   │   ├── OrderController.php
│   │   │   ├── ContactController.php
│   │   │   └── Admin/
│   │   │       ├── DashboardController.php
│   │   │       ├── ProductController.php
│   │   │       ├── OrderController.php
│   │   │       └── UserController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Order.php
│       ├── OrderItem.php
│       └── Contact.php
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_products_table.php
│   │   ├── create_orders_table.php
│   │   ├── create_order_items_table.php
│   │   └── create_contacts_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── ProductSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── home.blade.php
│       ├── contact.blade.php
│       ├── checkout.blade.php
│       ├── products/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── cart/
│       │   └── index.blade.php
│       ├── orders/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── admin/
│           ├── dashboard.blade.php
│           ├── products/
│           │   ├── index.blade.php
│           │   ├── create.blade.php
│           │   └── edit.blade.php
│           ├── orders/
│           │   ├── index.blade.php
│           │   └── show.blade.php
│           └── users/
│               └── index.blade.php
└── routes/
    └── web.php
```

---

## 🔧 Configuration

### ✏️ Change Admin Email & Password
Open `database/seeders/DatabaseSeeder.php`:
```php
User::create([
    'name'     => 'Admin',
    'email'    => 'YOUR_EMAIL_HERE',      // ← Change this
    'password' => bcrypt('YOUR_PASSWORD'), // ← Change this
    'role'     => 'admin',
]);


## 📞 Contact

| 📧 Email | aenagul561@gmail.com |
| 📍 Location | Sadiqabad, Punjab, Pakistan |
| 🕐 Working Hours | Monday - Saturday: 9AM - 9PM |

---

## 📜 License

This project is open source and available under the [MIT License](LICENSE).

---

<div align="center">

### 🎬 [▶️ Watch Full Demo Video]
https://drive.google.com/file/d/1urTkjIKcG0xR5vAlTzIi0OC5X4AjbDze/view?usp=drive_link

---

Made with ❤️ in Sadiqabad, Pakistan

**ShopHub © 2026 - All Rights Reserved**

![Visitors](https://img.shields.io/badge/Made%20with-Laravel-FF2D20?style=for-the-badge&logo=laravel)```
