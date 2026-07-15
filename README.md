# Deeprank Solutions - Premium Digital Agency Website

[![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.0+-7952B3?style=flat-square&logo=bootstrap)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)

## 🎯 Overview

A modern, responsive, and SEO-optimized website for Deeprank Solutions - a premium digital agency offering comprehensive digital marketing, web development, and software solutions.

**Built with:** PHP 8 | MySQL | Bootstrap 5 | HTML5 | CSS3 | JavaScript | jQuery

## ✨ Key Features

### 🌐 Frontend
- ✅ Fully responsive design (mobile-first)
- ✅ Premium glassmorphism UI effects
- ✅ Smooth animations and transitions
- ✅ Dark mode support
- ✅ Fast-loading optimized pages
- ✅ Cross-browser compatible

### 🔍 SEO Optimization
- ✅ Dynamic meta tags per page
- ✅ XML sitemap generation
- ✅ robots.txt configuration
- ✅ Schema.org JSON-LD markup
- ✅ Open Graph & Twitter Card tags
- ✅ Canonical URLs
- ✅ SEO-friendly URLs (.htaccess)

### 🛡️ Security
- ✅ Secure admin authentication
- ✅ Password hashing (bcrypt)
- ✅ CSRF protection tokens
- ✅ XSS prevention
- ✅ SQL injection prevention
- ✅ Input validation & sanitization
- ✅ reCAPTCHA integration
- ✅ SSL/TLS ready

### 📊 Admin Panel
- ✅ Dashboard with analytics
- ✅ Manage services, portfolio, blog
- ✅ Team member management
- ✅ Testimonial management
- ✅ Contact message inbox
- ✅ SEO & website settings
- ✅ Secure file uploads

### 📱 Pages Included
1. Home - Hero banner, services, testimonials, CTA
2. About Us - Company mission, values, team
3. Services - Complete service listings
4. Portfolio - Project showcase with filtering
5. Pricing - Service pricing tiers
6. Blog - Blog listing and single posts
7. Careers - Job listings and applications
8. Contact - Contact form with Google Maps
9. Privacy Policy
10. Terms & Conditions

## 📦 Services Offered

### Digital Marketing
- Search Engine Optimization (SEO)
- Local SEO
- Technical SEO
- Social Media Marketing (Facebook, Instagram)
- Google Ads & PPC
- Content Marketing

### Web Development
- Website Design & Development
- PHP Development
- Laravel Development
- WordPress Development
- E-Commerce Solutions

### Software Solutions
- Software Development
- CRM Development
- ERP Development
- Mobile App Development
- API Development

### Support Services
- Website Maintenance
- Cloud Solutions

## 🏗️ Project Structure

```
deeprk-solutions/
├── index.php                    # Home page
├── about.php                    # About Us
├── services.php                 # Services
├── portfolio.php                # Portfolio
├── pricing.php                  # Pricing
├── blog.php                     # Blog listing
├── blog-single.php              # Single blog post
├── careers.php                  # Career opportunities
├── contact.php                  # Contact page
├── privacy-policy.php           # Privacy Policy
├── terms-conditions.php         # Terms & Conditions
│
├── .htaccess                    # SEO URL rewriting
├── robots.txt                   # Search engines
├── sitemap.xml                  # XML sitemap
│
├── includes/
│   ├── config.php               # Configuration
│   ├── db-connection.php        # Database class
│   ├── functions.php            # Helper functions
│   ├── security.php             # Security functions
│   ├── header.php               # Header template
│   ├── footer.php               # Footer template
│   ├── navigation.php           # Navigation menu
│   ├── breadcrumb.php           # Breadcrumb
│   ├── meta-tags.php            # SEO meta tags
│   └── schema-markup.php        # JSON-LD
│
├── admin/
│   ├── index.php                # Login
│   ├── dashboard.php            # Dashboard
│   ├── manage-services.php      # Services
│   ├── manage-portfolio.php     # Portfolio
│   ├── manage-blog.php          # Blog
│   ├── manage-team.php          # Team
│   ├── manage-testimonials.php  # Testimonials
│   ├── messages.php             # Messages
│   ├── settings.php             # Settings
│   ├── change-password.php      # Password
│   ├── logout.php               # Logout
│   └── includes/
│       ├── auth.php             # Authentication
│       └── admin-functions.php  # Admin functions
│
├── assets/
│   ├── css/
│   │   ├── style.css            # Main styles
│   │   ├── bootstrap.min.css    # Bootstrap 5
│   │   ├── animations.css       # Animations
│   │   ├── dark-mode.css        # Dark mode
│   │   └── responsive.css       # Responsive
│   ├── js/
│   │   ├── main.js              # Main script
│   │   ├── jquery-3.6.0.min.js  # jQuery
│   │   ├── bootstrap.bundle.min.js # Bootstrap
│   │   ├── animations.js        # Animations
│   │   ├── dark-mode.js         # Dark mode
│   │   ├── form-validation.js   # Forms
│   │   └── analytics.js         # Analytics
│   ├── images/                  # Images
│   └── fonts/                   # Fonts
│
├── uploads/
│   ├── blog/                    # Blog images
│   ├── portfolio/               # Portfolio images
│   └── team/                    # Team images
│
├── api/
│   ├── contact.php              # Contact API
│   ├── newsletter.php           # Newsletter API
│   └── career.php               # Career API
│
├── database/
│   └── deeprank_solutions.sql   # Database schema
│
├── INSTALLATION.md              # Setup guide
└── LICENSE                      # MIT License
```

## 🚀 Quick Start

### Prerequisites
- PHP 8.0 or higher
- MySQL 8.0 or higher
- Apache with mod_rewrite

### Installation

```bash
# Clone Repository
git clone https://github.com/shubhampawar3003/deeprank-solutions.git
cd deeprank-solutions

# Setup Database
mysql -u root -p < database/deeprank_solutions.sql

# Configure Database (edit includes/config.php)
# Update DB credentials

# Create Upload Directories
mkdir -p uploads/{blog,portfolio,team}
chmod -R 755 uploads

# Access Website
# Frontend: http://localhost/deeprank-solutions
# Admin: http://localhost/deeprank-solutions/admin
# Login: admin@deeprank.com / admin123
```

### ⚠️ Important: Change Default Credentials
Change default admin password immediately after first login!

For detailed setup instructions, see [INSTALLATION.md](INSTALLATION.md)

## 📄 License

MIT License - See [LICENSE](LICENSE) file

---

**Made with ❤️ for Deeprank Solutions**
