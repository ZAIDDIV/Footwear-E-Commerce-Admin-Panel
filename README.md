# 👟 Footwear E-Commerce Admin Panel

A comprehensive, professional-grade admin panel and e-commerce platform for managing footwear products, categories, orders, and customers. Built with PHP, MySQL, and Bootstrap 4, this system provides both administrative controls and a user-facing storefront for browsing and purchasing footwear products.

---

## ✨ Features

### Admin Panel Features
- 📊 **Dashboard Analytics** - Real-time sales metrics, revenue tracking, and performance indicators
- 👟 **Product Management** - Add, edit, view, and delete footwear products with image uploads
- 🏷️ **Category Management** - Create and organize product categories (Men, Women, etc.)
- 📦 **Order Management** - Track and manage customer orders and order history
- 👥 **Customer Management** - View and manage customer profiles and activities
- 📈 **Advanced Charts & Reports** - Visual data representations with multiple chart types (Morris, Flot, Google Charts, Chartist)
- 🛠️ **Responsive Design** - Fully responsive admin interface with mobile support
- 📋 **Data Tables** - Sortable, searchable data tables with pagination
- 🎨 **Modern UI Components** - Interactive modals, tooltips, popovers, and notifications

### User-Facing Features
- 🛒 **Product Browsing** - Browse footwear products by category (Women, Men)
- 🔍 **Product Details** - View detailed product information with images
- 🛍️ **Shopping Cart** - Add/remove products from cart
- ❤️ **Wishlist** - Save favorite products
- 💳 **Checkout** - Secure checkout process
- 📝 **Order Tracking** - View order status and history
- 📧 **Contact System** - Customer contact and support page
- 🏪 **About Us** - Company information page
- 📱 **Responsive Store** - Mobile-friendly shopping experience

---

## 🛠️ Technologies Used

### Backend
- **PHP 7.x+** - Server-side scripting language
- **MySQL/MariaDB** - Database management system
- **MySQLi** - PHP MySQL interface for database operations

### Frontend - Admin Panel
- **Bootstrap 4** - Responsive CSS framework
- **Corona Admin Template** - Professional admin dashboard template
- **jQuery** - JavaScript library for DOM manipulation
- **CSS3** - Advanced styling and animations

### Frontend - User Store
- **Bootstrap 4** - Responsive CSS framework
- **HTML5** - Semantic markup
- **CSS3** - Custom styling
- **JavaScript** - Interactive features

### Libraries & Plugins
- **Chart.js** - Interactive charts and graphs
- **Morris.js** - Beautiful charts for historical data
- **Google Charts** - Advanced data visualization
- **Flot Chart** - Lightweight charting library
- **Chartist.js** - Simple responsive charts
- **DataTables** - Advanced table plugin with sorting and filtering
- **Select2** - Enhanced select boxes
- **Dropzone.js** - Drag-and-drop file uploads
- **Cropper.js** - Image cropping functionality
- **Light Gallery** - Image gallery and lightbox
- **Owl Carousel** - Responsive carousel slider
- **Form Validation** - Client-side form validation
- **iCheck** - Custom checkboxes and radio buttons
- **Mapael & Google Maps** - Map integrations
- **Rickshaw** - Time-series chart library
- **Bootstrap Table** - Enhanced HTML tables
- **Context Menu** - Right-click context menus
- **X-editable** - Inline editing
- **Toast Notifications** - User notifications
- **Typeahead** - Autocomplete suggestions

---

## 📋 Prerequisites

Before you begin, ensure you have the following installed on your system:

- **Web Server** - Apache (included in XAMPP, WAMP, LAMP)
- **PHP** - Version 7.0 or higher
- **MySQL/MariaDB** - Version 5.7 or higher
- **XAMPP/WAMP/LAMP** - Local development environment (recommended for beginners)
- **Text Editor/IDE** - VS Code, PhpStorm, Sublime Text, etc.
- **Modern Web Browser** - Chrome, Firefox, Safari, or Edge
- **Git** (optional) - For version control

---

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/ZAIDDIV/Footwear-E-Commerce-Admin-Panel.git
cd Footwear-E-Commerce-Admin-Panel
```

Or download the ZIP file and extract it to your web server's root directory.

### 2. Set Up Local Development Environment

#### Using XAMPP (Windows/Mac/Linux):
1. Download and install [XAMPP](https://www.apachefriends.org/)
2. Extract the project to: `C:\xampp\htdocs\Corona Admin Panel\` (Windows) or `/Applications/XAMPP/xamppfiles/htdocs/` (Mac)
3. Start Apache and MySQL from the XAMPP Control Panel

#### Using WAMP (Windows):
1. Download and install [WAMP](https://www.wampserver.com/)
2. Extract to `C:\wamp64\www\Corona Admin Panel\`
3. Start WAMP services

#### Using LAMP (Linux):
1. Install Apache2, PHP, and MySQL
2. Extract to `/var/www/html/Corona Admin Panel/`
3. Restart Apache: `sudo systemctl restart apache2`

### 3. Database Configuration

#### 3.1 Create the Database

1. **Open phpMyAdmin**
   - Navigate to `http://localhost/phpmyadmin` in your browser
   - Log in with your MySQL credentials (default: root / no password for XAMPP)

2. **Create Database**
   - Click "New" in the left sidebar
   - Database name: `zaid_adminpanel`
   - Collation: `utf8mb4_unicode_ci`
   - Click "Create"

3. **Create Tables**
   - Import the database schema by executing the following SQL:

```sql
-- Corona Category Table
CREATE TABLE IF NOT EXISTS `corona` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cat_name` varchar(100) NOT NULL,
  `cat_img` varchar(255) DEFAULT NULL,
  UNIQUE KEY `cat_name` (`cat_name`)
);

-- Product Table
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cat_id` int(11) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `p_qty` int(11) DEFAULT 0,
  `p_price` decimal(10,2) NOT NULL,
  `p_desc` text,
  `p_image` varchar(255) DEFAULT NULL,
  FOREIGN KEY (`cat_id`) REFERENCES `corona`(`cat_id`) ON DELETE CASCADE
);

-- Users Table (Optional, for user accounts)
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) UNIQUE NOT NULL,
  `email` varchar(100) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP
);

-- Orders Table
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11),
  `order_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE SET NULL
);
```

### 4. Configuration Files

Update the database connection credentials in the following files:

**Admin Panel Configuration:**
- File: `Admin/Config/config.php`
- Ensure database credentials match your MySQL setup:

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "zaid_adminpanel");

// Add error checking
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

**User Frontend Configuration:**
- File: `User/config/config.php`
- Update with the same credentials

**Note:** If your MySQL has a password, update the connection string:
```php
$conn = mysqli_connect("localhost", "root", "your_password", "zaid_adminpanel");
```

### 5. Run the Application

#### Start the Application:

1. **Open your web browser**
2. **Admin Panel:** `http://localhost/Corona Admin Panel/Admin/`
3. **User Store:** `http://localhost/Corona Admin Panel/User/`

If you're using a different folder name, adjust the URL accordingly.

#### Expected Structure:
```
http://localhost/Corona Admin Panel/
├── Admin/             (Admin Dashboard)
└── User/              (Customer Store)
```

---

## 📖 Usage

### For Administrators

#### 1. **Accessing the Admin Panel**
- Navigate to: `http://localhost/Corona Admin Panel/Admin/`
- The dashboard displays key metrics and quick links

#### 2. **Managing Categories**
- Go to **Categories** section
- **Add Category**: Upload footwear category image (Men, Women, Kids, etc.)
- **View Categories**: See all existing categories
- **Edit/Delete**: Modify or remove categories
- **Note**: Deleting a category will remove all related products

#### 3. **Managing Products**
- Go to **Products** section
- **Add Product**:
  - Select category
  - Enter product name, quantity, price, and description
  - Upload product image
  - Click "Save"
- **View Products**: See all products in a searchable, sortable table
- **Edit Product**: Update product details
- **Delete Product**: Remove product from inventory

#### 4. **Managing Orders**
- Go to **Orders** section
- View customer orders with details
- Track order status
- Process refunds or cancellations

#### 5. **Dashboard Analytics**
- View sales charts and graphs
- Monitor revenue trends
- Check inventory status
- Analyze customer activity

### For End Users

#### 1. **Browsing Products**
- Visit: `http://localhost/Corona Admin Panel/User/`
- View "Best Sellers" on homepage
- Browse by category (Men, Women)
- Click on products to see details

#### 2. **Shopping**
- **Add to Cart**: Click cart icon on product
- **View Cart**: Go to cart page
- **Modify Cart**: Change quantities or remove items
- **Proceed to Checkout**: Enter shipping and payment information

#### 3. **Additional Features**
- **Wishlist**: Save favorite products
- **About Us**: Learn about the store
- **Contact**: Send inquiries or feedback
- **Order Status**: Track order completion

---

## 📁 Project Structure

```
Footwear-E-Commerce-Admin-Panel/
│
├── Admin/                          # Admin Dashboard
│   ├── index.php                   # Admin Home/Dashboard
│   ├── assets/
│   │   ├── css/                    # Stylesheets
│   │   ├── js/                     # JavaScript libraries and plugins
│   │   ├── fonts/                  # Custom fonts
│   │   ├── images/                 # Admin images and icons
│   │   ├── Include/                # Header, sidebar, footer components
│   │   ├── vendors/                # Third-party libraries
│   │   └── scss/                   # SCSS source files
│   ├── Backend/
│   │   ├── product.php             # Product CRUD operations
│   │   ├── category.php            # Category CRUD operations
│   │   └── order.php               # Order management
│   ├── Config/
│   │   └── config.php              # Database configuration
│   ├── category/
│   │   ├── add_category.php        # Add new category
│   │   ├── view_category.php       # List categories
│   │   └── Del_category.php        # Delete category
│   ├── Product/
│   │   ├── add_product.php         # Add new product
│   │   └── view_product.php        # List products
│   ├── orders/
│   │   └── cart.php                # Cart management
│   └── img/                        # Product images storage
│
├── User/                           # Customer Frontend
│   ├── index.php                   # Store Homepage
│   ├── assets/
│   │   ├── about.html              # About page
│   │   ├── contact.html            # Contact page
│   │   ├── men.html                # Men's products
│   │   ├── women.html              # Women's products
│   │   ├── product-detail.html     # Product detail view
│   │   ├── cart.html               # Shopping cart
│   │   ├── checkout.html           # Checkout page
│   │   ├── order-complete.html     # Order confirmation
│   │   ├── add-to-wishlist.html    # Wishlist page
│   │   ├── css/                    # Stylesheets
│   │   ├── js/                     # JavaScript
│   │   ├── fonts/                  # Fonts
│   │   ├── images/                 # Product images
│   │   └── Include/                # Header and footer
│   ├── backend/
│   │   └── main_category.php       # Category backend logic
│   ├── config/
│   │   └── config.php              # Database configuration
│   └── img/                        # Image storage
│
└── README.md                       # Project documentation
```

---

## 🔧 Troubleshooting

### Common Issues and Solutions

#### 1. **Database Connection Error**
**Problem:** `Connection failed: No such file or directory`

**Solution:**
- Verify MySQL is running in XAMPP/WAMP Control Panel
- Check database credentials in `config.php`
- Ensure database `zaid_adminpanel` exists
- Check MySQL port (default: 3306)

```bash
# Test connection
mysql -u root -p zaid_adminpanel
```

#### 2. **Blank Page or White Screen**
**Problem:** Page shows nothing or displays errors

**Solution:**
- Check PHP error logs: `php_error_log` in XAMPP folder
- Enable error reporting in PHP config
- Check file permissions (755 for directories, 644 for files)
- Verify all include files exist and paths are correct

#### 3. **Images Not Uploading**
**Problem:** Product images don't upload or disappear

**Solution:**
- Verify `img/` folder exists and is writable:
  ```bash
  chmod 755 Admin/img
  chmod 755 User/img
  ```
- Check file size limits in `php.ini`:
  ```
  upload_max_filesize = 50M
  post_max_size = 50M
  ```
- Verify image file permissions (644)

#### 4. **404 Errors/Pages Not Found**
**Problem:** Links return 404 errors

**Solution:**
- Verify file names match exactly (case-sensitive on Linux)
- Check `.htaccess` file if it exists
- Verify URL paths in navigation links
- Test with `http://localhost/Corona%20Admin%20Panel/Admin/` (encoded spaces)

#### 5. **Session Issues**
**Problem:** Login sessions not working

**Solution:**
- Verify `session_start()` is called at the top of PHP files
- Check session storage path permissions
- Clear browser cookies and cache
- Ensure cookies are enabled

#### 6. **Styling Not Loading**
**Problem:** Admin panel looks unstyled

**Solution:**
- Clear browser cache (Ctrl+Shift+Delete)
- Check CSS file paths in HTML
- Verify Bootstrap and jQuery are loaded
- Open browser console (F12) for CSS errors

#### 7. **JavaScript Not Working**
**Problem:** Interactive features not functional

**Solution:**
- Check browser console (F12) for JavaScript errors
- Verify jQuery is loaded before other scripts
- Ensure script files exist at specified paths
- Check for conflicting libraries

---

## 🤝 Contributing

We welcome contributions from the community! To contribute:

### Steps to Contribute:

1. **Fork the repository**
   ```bash
   git clone https://github.com/ZAIDDIV/Footwear-E-Commerce-Admin-Panel.git
   ```

2. **Create a feature branch**
   ```bash
   git checkout -b feature/AmazingFeature
   ```

3. **Make your changes**
   - Follow existing code style and conventions
   - Add comments for complex logic
   - Test thoroughly before committing

4. **Commit your changes**
   ```bash
   git commit -m 'Add some AmazingFeature'
   ```

5. **Push to the branch**
   ```bash
   git push origin feature/AmazingFeature
   ```

6. **Open a Pull Request**
   - Describe your changes clearly
   - Reference any related issues
   - Wait for review and feedback

### Before Contributing:
- **Read existing code** to understand the patterns
- **Test all features** after making changes
- **Report bugs** before submitting features
- **Follow PSR-12** PHP coding standards
- **Document changes** if modifying functionality

### Suggestions for Improvements:
- ✅ User authentication and login system
- ✅ Payment gateway integration (Stripe, PayPal)
- ✅ Email notifications for orders
- ✅ Product reviews and ratings
- ✅ Inventory management alerts
- ✅ API integration for shipping
- ✅ Advanced search and filtering
- ✅ Bulk product import/export
- ✅ Performance optimization
- ✅ Security enhancements

---

## 📄 License

This project is open source and available under the **MIT License**.

You are free to:
- ✅ Use this software for personal and commercial projects
- ✅ Modify and distribute the code
- ✅ Use it as a template for your projects

Conditions:
- ⚠️ Include the original license in any distribution
- ⚠️ No liability for issues arising from usage

---

## 👨‍💻 Author

**ZAID** - Full Stack Developer
- GitHub: [@ZAIDDIV](https://github.com/ZAIDDIV)
- Email: [Contact for inquiries]

---

## 📞 Support

If you encounter issues or have questions:

1. **Check Troubleshooting Section** - Most common issues are documented
2. **Search Existing Issues** - Check GitHub issues for solutions
3. **Create New Issue** - Provide detailed error messages and steps to reproduce
4. **Contact Developer** - Reach out for advanced support

---

## 🗺️ Roadmap

### v1.0 (Current)
- ✅ Basic admin panel
- ✅ Product management
- ✅ Category management
- ✅ User storefront
- ✅ Shopping cart

### v1.1 (Planned)
- 🔄 User authentication
- 🔄 Order management system
- 🔄 Email notifications
- 🔄 Product reviews

### v2.0 (Future)
- 🔄 Payment gateway integration
- 🔄 REST API
- 🔄 Mobile app
- 🔄 Advanced analytics
- 🔄 Inventory management

---

## 🎯 Quick Links

- 📖 [Documentation](README.md)
- 🐛 [Report Bug](https://github.com/ZAIDDIV/Footwear-E-Commerce-Admin-Panel/issues)
- 💡 [Request Feature](https://github.com/ZAIDDIV/Footwear-E-Commerce-Admin-Panel/issues)
- ⭐ [Star the Repository](https://github.com/ZAIDDIV/Footwear-E-Commerce-Admin-Panel)

---

## 📊 Stats

- **Language**: PHP, HTML, CSS, JavaScript
- **Database**: MySQL
- **Framework**: Bootstrap 4
- **Admin Template**: Corona Admin Template
- **License**: MIT
- **Status**: Active & Maintained

---

## ✅ Testing Checklist

Before deploying, verify:
- [ ] Database connection works
- [ ] Admin panel loads without errors
- [ ] Can add/edit/delete categories
- [ ] Can add/edit/delete products
- [ ] Product images upload correctly
- [ ] User storefront displays products
- [ ] Shopping cart functions
- [ ] All links work
- [ ] Mobile responsive on tablets
- [ ] Mobile responsive on phones

---

**Last Updated**: February 2026  
**Version**: 1.0  
**Status**: ✅ Active & Maintained

---

Thank you for using the Footwear E-Commerce Admin Panel! We hope this helps you build an amazing online store. 🚀
