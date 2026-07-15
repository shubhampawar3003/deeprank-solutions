# Deeprank Solutions - Complete Installation Guide

## 📋 Table of Contents
1. [System Requirements](#system-requirements)
2. [Installation Steps](#installation-steps)
3. [Database Setup](#database-setup)
4. [Configuration](#configuration)
5. [Verification](#verification)
6. [Troubleshooting](#troubleshooting)

---

## 💻 System Requirements

### Minimum Requirements
- **PHP:** 8.0 or higher
- **MySQL:** 8.0 or higher
- **Apache:** 2.4+ with mod_rewrite enabled
- **RAM:** 512 MB
- **Disk Space:** 500 MB

### Recommended Requirements
- **PHP:** 8.2+
- **MySQL:** 8.0.27+
- **Apache:** 2.4.52+
- **RAM:** 2 GB
- **Disk Space:** 2 GB

### Check Your System

**Check PHP Version:**
```bash
php -v
```

**Check MySQL Version:**
```bash
mysql --version
```

**Check Apache Version:**
```bash
apache2ctl -v
```

---

## 🚀 Installation Steps

### Step 1️⃣: Clone Repository

```bash
# Navigate to your web root
cd /var/www/html

# Clone the repository
git clone https://github.com/shubhampawar3003/deeprank-solutions.git

# Navigate into project
cd deeprank-solutions

# List files to verify
ls -la
```

**Expected Output:**
```
README.md
LICENSE
.gitignore
.htaccess
robots.txt
INSTALLATION.md
```

---

### Step 2️⃣: Create MySQL Database

#### Option A: Using Command Line

```bash
# Connect to MySQL
mysql -u root -p

# Enter your MySQL password when prompted
```

**Inside MySQL CLI:**
```sql
-- Create database
CREATE DATABASE deeprank_solutions CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Verify database created
SHOW DATABASES;

-- Exit MySQL
EXIT;
```

#### Option B: Using phpMyAdmin

1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Click **"New"** on left sidebar
3. Enter Database Name: `deeprank_solutions`
4. Select Collation: `utf8mb4_unicode_ci`
5. Click **"Create"**

---

### Step 3️⃣: Create Directory Structure

```bash
# Navigate to project directory
cd /var/www/html/deeprank-solutions

# Create upload directories
mkdir -p uploads/blog
mkdir -p uploads/portfolio
mkdir -p uploads/team
mkdir -p admin/uploads
mkdir -p cache
mkdir -p logs

# Verify directories created
ls -la uploads/
```

**Expected Output:**
```
drwxr-xr-x  blog
drwxr-xr-x  portfolio
drwxr-xr-x  team
```

---

### Step 4️⃣: Set File Permissions

```bash
# Make directories writable
chmod -R 755 uploads
chmod -R 755 admin/uploads
chmod -R 755 cache
chmod -R 755 logs

# Set web server ownership (Linux/Mac)
sudo chown -R www-data:www-data /var/www/html/deeprank-solutions

# Verify permissions
ls -la | grep uploads
```

---

### Step 5️⃣: Enable Apache mod_rewrite

```bash
# Enable rewrite module
sudo a2enmod rewrite

# Verify it's enabled
sudo a2query -m | grep rewrite

# Restart Apache
sudo systemctl restart apache2

# Verify Apache is running
sudo systemctl status apache2
```

**Expected Output:**
```
● apache2.service - The Apache HTTP Server
   Loaded: loaded (...)
   Active: active (running) since ...
```

---

### Step 6️⃣: Configure Apache Virtual Host

**Create Configuration File:**
```bash
sudo nano /etc/apache2/sites-available/deeprank.conf
```

**Paste This Configuration:**
```apache
<VirtualHost *:80>
    ServerName localhost
    ServerAdmin admin@deeprank.local
    DocumentRoot /var/www/html/deeprank-solutions
    
    <Directory /var/www/html/deeprank-solutions>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/deeprank-error.log
    CustomLog ${APACHE_LOG_DIR}/deeprank-access.log combined
</VirtualHost>
```

**Enable the Site:**
```bash
# Enable the configuration
sudo a2ensite deeprank.conf

# Verify configuration
sudo apache2ctl configtest

# Reload Apache
sudo systemctl reload apache2
```

---

### Step 7️⃣: Configure PHP Settings

**Find php.ini Location:**
```bash
php -i | grep "php.ini"
```

**Edit PHP Configuration:**
```bash
sudo nano /etc/php/8.0/apache2/php.ini
```

**Update These Settings:**
```ini
; Upload settings
upload_max_filesize = 20M
post_max_size = 20M

; Timezone
date.timezone = "UTC"

; Error reporting (change to 0 in production)
error_reporting = E_ALL
display_errors = On

; Session settings
session.save_path = "/var/lib/php/sessions"
```

**Restart Apache:**
```bash
sudo systemctl restart apache2
```

---

## 🗄️ Database Setup

### Step 1: Import Database Schema

**We'll create the SQL file in the next step, but here's how to import it:**

```bash
# Navigate to project directory
cd /var/www/html/deeprank-solutions

# Import database (once SQL file is available)
mysql -u root -p deeprank_solutions < database/deeprank_solutions.sql
```

**Expected Output:**
No output means success!

**Verify Database Tables:**
```bash
mysql -u root -p deeprank_solutions -e "SHOW TABLES;"
```

---

## ⚙️ Configuration

### Step 1: Create config.php

**We'll create this file in the next step. For now, understand the structure:**

The file should be at: `includes/config.php`

It will contain:
- Database credentials
- Site configuration
- Security keys
- Email settings
- API keys

---

## ✅ Verification

### Step 1: Test Database Connection

```bash
# Test MySQL connection
mysql -u root -p -h localhost deeprank_solutions -e "SELECT 1;"
```

**Expected Output:**
```
+---+
| 1 |
+---+
| 1 |
+---+
```

### Step 2: Test Apache Configuration

```bash
# Check Apache configuration
sudo apache2ctl configtest
```

**Expected Output:**
```
Syntax OK
```

### Step 3: Check mod_rewrite is Enabled

```bash
# List enabled modules
sudo apache2ctl -M | grep rewrite
```

**Expected Output:**
```
rewrite_module (shared)
```

### Step 4: Test PHP

**Create a test file:**
```bash
echo "<?php phpinfo(); ?>" > /var/www/html/deeprank-solutions/test.php
```

**Open in browser:**
- `http://localhost/deeprank-solutions/test.php`

**Delete test file when done:**
```bash
rm /var/www/html/deeprank-solutions/test.php
```

---

## 🔐 Security Configuration

### Step 1: File Permissions

```bash
# Set correct permissions for PHP files
find /var/www/html/deeprank-solutions -type f -name "*.php" -exec chmod 644 {} \;

# Set correct permissions for directories
find /var/www/html/deeprank-solutions -type d -exec chmod 755 {} \;

# Keep upload directories writable
chmod 755 /var/www/html/deeprank-solutions/uploads
chmod 755 /var/www/html/deeprank-solutions/admin/uploads
```

### Step 2: Disable Directory Listing

**Verify .htaccess has:**
```apache
<IfModule mod_autoindex.c>
    Options -Indexes
</IfModule>
```

### Step 3: Protect Sensitive Files

**Verify .htaccess blocks:**
```apache
RewriteRule ^(includes|admin/includes|database)(/|$) - [F,L]
RewriteRule \.(env|sql|bak)$ - [F,L]
```

---

## 🌐 Access the Website

Once setup is complete:

### Frontend
```
URL: http://localhost/deeprank-solutions
```

### Admin Panel
```
URL: http://localhost/deeprank-solutions/admin
Email: admin@deeprank.com
Password: admin123
```

⚠️ **IMPORTANT: Change admin password immediately after first login!**

---

## 🐛 Troubleshooting

### Issue 1: 404 Errors on All Pages

**Solution:**
```bash
# Verify mod_rewrite is enabled
sudo a2enmod rewrite

# Verify .htaccess exists
ls -la /var/www/html/deeprank-solutions/.htaccess

# Verify AllowOverride is set
sudo grep -n "AllowOverride" /etc/apache2/sites-available/deeprank.conf

# Should show: AllowOverride All

# Restart Apache
sudo systemctl restart apache2
```

### Issue 2: Database Connection Error

**Solution:**
```bash
# Verify MySQL is running
sudo systemctl status mysql

# Test connection
mysql -u root -p -h localhost

# Verify database exists
mysql -u root -p -e "SHOW DATABASES;"

# Verify database has tables
mysql -u root -p deeprank_solutions -e "SHOW TABLES;"
```

### Issue 3: File Upload Fails

**Solution:**
```bash
# Check directory permissions
ls -la /var/www/html/deeprank-solutions/ | grep uploads

# Should show: drwxr-xr-x (755)

# Verify ownership
ls -l /var/www/html/deeprank-solutions/ | head -5

# Should be owned by www-data:www-data

# Fix permissions
sudo chown -R www-data:www-data /var/www/html/deeprank-solutions/uploads
chmod -R 755 /var/www/html/deeprank-solutions/uploads
```

### Issue 4: Blank White Page

**Solution:**
```bash
# Check PHP error log
tail -f /var/log/php-errors.log

# Check Apache error log
sudo tail -f /var/log/apache2/error.log

# Enable error reporting in config.php
define('DEBUG', true);
```

### Issue 5: Login Not Working

**Solution:**
```bash
# Verify admin user exists
mysql -u root -p deeprank_solutions -e "SELECT * FROM admins;"

# Check if password is hashed
mysql -u root -p deeprank_solutions -e "SELECT id, email, password FROM admins LIMIT 1;"

# Clear browser cookies
# Try logging in again
```

---

## ✅ Installation Checklist

- [ ] PHP 8.0+ installed and verified
- [ ] MySQL 8.0+ installed and running
- [ ] Repository cloned
- [ ] Database created
- [ ] Upload directories created
- [ ] File permissions set (755 for dirs, 644 for files)
- [ ] Apache mod_rewrite enabled
- [ ] Virtual host configured
- [ ] PHP settings updated
- [ ] Apache restarted
- [ ] Website accessible at http://localhost/deeprank-solutions
- [ ] Admin panel accessible
- [ ] Admin password changed
- [ ] Test files deleted

---

## 📞 Support

If you encounter issues:

1. Check error logs:
   ```bash
   tail -f /var/log/apache2/error.log
   ```

2. Verify permissions:
   ```bash
   ls -la /var/www/html/deeprank-solutions/
   ```

3. Test database:
   ```bash
   mysql -u root -p deeprank_solutions -e "SHOW TABLES;"
   ```

4. Check Apache config:
   ```bash
   sudo apache2ctl configtest
   ```

---

## 🎉 Installation Complete!

Your Deeprank Solutions website is now ready to use!

**Next Steps:**
1. Login to admin panel
2. Change admin password
3. Update website settings
4. Add your content
5. Configure SEO settings

---

**Made with ❤️ by Deeprank Solutions Development Team**
