# 📝 Blog Application

A clean, beginner-friendly PHP web app that allows users to view blog posts, sign up, log in, search content, and explore posts by category.  
Built using PHP & MySQL with simple routing and form handling.

---

## 🔧 Features

### ✅ Public Pages
- View all blog posts (homepage)
- Search posts by keyword
- Filter posts by category
- Read full blog posts with details
- About, Services, and Contact pages

### ✅ User Authentication
- User **sign up** and **log in** forms
- Session-based authentication
- Secure logout with session destruction

---

## 📁 Project Structure

```
Blog_application/
│
├── index.php               # Homepage
├── blog.php                # Blog posts list
├── post.php                # Single post view
├── search.php              # Search functionality
├── category-post.php       # Filter by category
│
├── signin.php              # Login form
├── signup.php              # Registration form
├── signin-data.php         # Login logic
├── signup-data.php         # Registration logic
├── logout.php              # Logout handler
│
├── about.php               # About page
├── contact.php             # Contact page
├── services.php            # Services page
│
└── .git/                   # Git metadata (if applicable)
```

> 💡 You can improve this structure by using includes for header/footer and creating a config file for database connection.

---

## 🛠️ Getting Started

### 1. Clone the repo  
```bash
git clone https://github.com/yourusername/Blog_application.git
```

### 2. Move to XAMPP `htdocs`  
Place the entire folder in:
```
C:/xampp/htdocs/Blog_application
```

### 3. Start Apache & MySQL using XAMPP

### 4. Set up the database  
- Go to **phpMyAdmin**
- Create a new database (e.g. `blog_app`)
- Import `blog_app.sql` if available, or manually create:
  - `users` table
  - `posts` table
  - `categories` table

### 5. Update database connection  
In `signin-data.php`, `signup-data.php`, and any other DB files:

```php
$conn = mysqli_connect("localhost", "root", "", "blog_app");
```

### 6. Run the app  
Visit:
```
http://localhost/Blog_application/
```

---

## 🧰 Tech Stack

- **Backend:** PHP 7+
- **Database:** MySQL
- **Frontend:** HTML, CSS, JS
- **Local Server:** Apache via XAMPP

---

## 🌐 URLs

- **Main Site:** `http://localhost/Blog_application/`
- **Login:** `http://localhost/Blog_application/signin.php`
- **Register:** `http://localhost/Blog_application/signup.php`

---

## ✨ Optional Future Features

- Admin dashboard for creating/editing posts
- Rich text editor (like TinyMCE)
- Image upload for posts
- Password hashing for better security
- Pagination for post lists
- Comment section under posts

---

## 📸 Screenshots (Optional)

_Add screenshots later if you want to show off the UI._

---

## 👨‍💻 Author

Jack – CS Student @ Fort Hays & AUPP  
Built this to practice PHP, database connections, and user login systems.

---

## 📄 License

This project is for learning purposes and personal development.  
Feel free to modify and expand it!
