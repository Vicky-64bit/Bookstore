
# 📚 Bookstore

A full-stack online bookstore built using **PHP**, **MySQL**, **HTML**, **CSS**, **Bootstrap**, and **JavaScript**. This application allows users to browse books, add them to cart or wishlist, place orders, and manage profiles. Admins can manage books, categories, and view all orders.

## 🌐 Live Demo

> 🔗 *Coming soon*

---

## ✨ Features

### 👤 User Panel
- User registration & login system
- Browse books by categories
- Add books to cart or wishlist
- Checkout and view order history
- Download digital book receipts (PDF/ZIP)
- Razorpay payment gateway integration

### 🔐 Admin Panel
- Admin authentication system
- Manage book listings (add/edit/delete)
- Manage categories
- View and delete user orders

---

## 🛠️ Tech Stack

| Frontend      | Backend     | Database  | Payment     |
|---------------|-------------|-----------|-------------|
| HTML5, CSS3   | PHP         | MySQL     | Razorpay    |
| Bootstrap     | JavaScript  | PDO       |             |
| jQuery        |             |           |             |

---

## 📁 Folder Structure

```
bookstore/
│
├── admin-panel/           # Admin dashboard files
├── categories-admins/     # Admin category management
├── includes/              # Common files like header, footer
├── config/                # Configuration and DB connection
├── user/                  # User profile, orders, downloads
├── assets/                # CSS, JS, images
├── index.php              # Homepage
├── cart.php               # Shopping cart
├── checkout.php           # Checkout process
└── ...                    # Other pages and utilities
```

---

## 🚀 Getting Started

### Prerequisites

- PHP >= 7.0
- MySQL
- Apache server (e.g. XAMPP, WAMP)

### Installation

1. **Clone the repository:**

```bash
git clone https://github.com/Vicky-64bit/Bookstore.git
```

2. **Start Apache and MySQL** from XAMPP or WAMP.

3. **Import the SQL file**:
   - Open **phpMyAdmin**
   - Create a new database `bookstore`
   - Import the file: `bookstore.sql` (located in root or `config/`)

4. **Configure database connection:**
   - Open `config/config.php` and update your DB credentials:

```php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bookstore";
```

5. **Access the site:**
   - User panel: `http://localhost/bookstore/`
   - Admin panel: `http://localhost/bookstore/admin-panel/`

---

## 🧪 Test Credentials

### User
- 📧 Email: `user@test.com`
- 🔑 Password: `123456`

### Admin
- 📧 Email: `admin@test.com`
- 🔑 Password: `admin123`

---

## 💡 Future Improvements

- Implement search & filter functionality
- Add pagination to product listings
- Integrate email confirmation
- Add coupon/discount system
- Improve UI responsiveness

---

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

---

## 📜 License

This project is licensed under the [MIT License](LICENSE).

---

## 📬 Contact

**Developer:** Pravesh Swami  
**GitHub:** [@Vicky-64bit](https://github.com/Vicky-64bit)  
**Email:** [vickyswami9460@gmail.com]
