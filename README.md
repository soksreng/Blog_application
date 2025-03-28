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
├── about.php
├── blog.php
├── category-post.php
├── contact.php
├── index.php
├── logout.php
├── post.php
├── search.php
├── services.php
├── signin.php
├── signup.php
├── signin-data.php
├── signup-data.php
├── admin/
│   ├── add-category.php
│   ├── add-category-data.php
│   ├── add-post.php
│   ├── add-post-data.php
│   ├── add-user.php
│   ├── add-user-data.php
│   ├── dashboard.php
│   ├── delete-category.php
│   ├── delete-post.php
│   ├── delete-user.php
│   ├── edit-category.php
│   ├── edit-category-data.php
│   ├── edit-post.php
│   ├── edit-post-data.php
│   ├── edit-user.php
│   ├── edit-user-data.php
│   ├── manage-categories.php
│   ├── manage-users.php
│   └── partial/
│       └── header.php
├── config/
│   ├── constants.php
│   └── database.php
├── css/
│   └── style.css
├── js/
│   └── main.js
├── images/
│   └── [avatar images...]
├── partial/
│   ├── header.php
│   └── footer.php
└── .git/     
```

> 💡 You can improve this structure by using includes for header/footer and creating a config file for database connection.

---

## 🛠️ Getting Started

### 1. Clone the repo  
```bash
git clone https://github.com/soksreng/Blog_application.git
```

### 2. Move to XAMPP `htdocs`  
Place the entire folder in:
```
C:/xampp/htdocs/Blog_application
```

### 3. Start Apache & MySQL using XAMPP

### 4. Set up the database  
- Go to **phpMyAdmin**
- Create a new database (e.g. `Blog_application`)
- Import `Blog_application.sql`, or manually create:
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
- Image upload for posts
- Password hashing for better security
- Pagination for post lists

---

## 👨‍💻 Author

Sok Sreng(Jack) Chan – CS Student @ Fort Hays & AUPP  

---

## 📄 License

This project is for learning purposes and personal development.  
Feel free to modify and expand it!
