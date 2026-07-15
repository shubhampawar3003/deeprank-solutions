-- =====================================================
-- Deeprank Solutions Database Schema
-- Database Name: DB_DeepRank
-- Version: 1.0.0
-- Created: 2026-07-15
-- =====================================================

-- Create Database (if not exists)
CREATE DATABASE IF NOT EXISTS DB_DeepRank CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE DB_DeepRank;

-- =====================================================
-- 1. ADMINS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    role ENUM('admin', 'editor', 'moderator') DEFAULT 'admin',
    status ENUM('active', 'inactive') DEFAULT 'active',
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(email),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin
INSERT INTO admins (name, email, password, role, status) VALUES 
('Admin User', 'admin@deeprank.com', '$2y$10$YourHashedPasswordHere', 'admin', 'active');

-- =====================================================
-- 2. CATEGORIES TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description LONGTEXT,
    type ENUM('service', 'blog', 'portfolio') DEFAULT 'blog',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(slug),
    INDEX(type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample categories
INSERT INTO categories (name, slug, description, type) VALUES 
('Digital Marketing', 'digital-marketing', 'Digital Marketing Services', 'service'),
('Web Development', 'web-development', 'Web Development Services', 'service'),
('Software Solutions', 'software-solutions', 'Software Development Solutions', 'service'),
('SEO & Marketing', 'seo-marketing', 'SEO and Marketing Tips', 'blog'),
('Technology', 'technology', 'Technology Articles', 'blog'),
('Portfolio Showcase', 'portfolio-showcase', 'Our Best Works', 'portfolio');

-- =====================================================
-- 3. SERVICES TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    category_id INT,
    description LONGTEXT,
    short_description VARCHAR(500),
    icon VARCHAR(255),
    image VARCHAR(255),
    price DECIMAL(10, 2),
    sort_order INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE SET NULL,
    INDEX(slug),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample services
INSERT INTO services (name, slug, category_id, short_description, icon, price, sort_order) VALUES 
('Search Engine Optimization', 'seo', 1, 'Boost your online visibility with our comprehensive SEO services', 'fas fa-search', 999.00, 1),
('Social Media Marketing', 'social-media', 1, 'Engage with your audience on all social platforms', 'fas fa-share-alt', 799.00, 2),
('Google Ads & PPC', 'google-ads', 1, 'Get instant results with targeted advertising', 'fas fa-ad', 1299.00, 3),
('Website Design', 'web-design', 2, 'Beautiful, responsive websites that convert', 'fas fa-palette', 1599.00, 4),
('Website Development', 'web-development', 2, 'Custom PHP and Laravel development solutions', 'fas fa-code', 1999.00, 5),
('E-Commerce Solutions', 'ecommerce', 2, 'Complete online store solutions', 'fas fa-shopping-cart', 2499.00, 6),
('Mobile App Development', 'mobile-app', 3, 'Native and cross-platform mobile applications', 'fas fa-mobile-alt', 2999.00, 7),
('CRM Development', 'crm-development', 3, 'Custom CRM systems for your business', 'fas fa-chart-line', 3499.00, 8),
('API Development', 'api-development', 3, 'RESTful and GraphQL API solutions', 'fas fa-plug', 2299.00, 9),
('Website Maintenance', 'maintenance', 3, 'Keep your website secure and updated', 'fas fa-tools', 499.00, 10);

-- =====================================================
-- 4. PORTFOLIO TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS portfolio (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    category_id INT,
    description LONGTEXT,
    short_description VARCHAR(500),
    image VARCHAR(255),
    client_name VARCHAR(255),
    project_url VARCHAR(255),
    technology_used VARCHAR(255),
    sort_order INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE SET NULL,
    INDEX(slug),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample portfolio
INSERT INTO portfolio (title, slug, category_id, short_description, client_name, technology_used, sort_order) VALUES 
('E-Commerce Platform', 'ecommerce-platform', 6, 'Complete online store with payment gateway', 'TechStore Inc', 'PHP, MySQL, Bootstrap 5', 1),
('Corporate Website', 'corporate-website', 6, 'Responsive corporate portal', 'Global Solutions Ltd', 'Laravel, Vue.js, MySQL', 2),
('Mobile Banking App', 'mobile-banking', 6, 'Secure banking application', 'FinanceHub', 'React Native, Node.js, MongoDB', 3),
('CRM System', 'crm-system', 6, 'Customer relationship management system', 'Sales Force Corp', 'PHP, Laravel, PostgreSQL', 4),
('Marketing Dashboard', 'marketing-dashboard', 6, 'Analytics and reporting dashboard', 'Digital Media Co', 'React, Node.js, Firebase', 5);

-- =====================================================
-- 5. BLOGS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS blogs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    category_id INT,
    author_id INT,
    content LONGTEXT NOT NULL,
    excerpt VARCHAR(500),
    featured_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description VARCHAR(255),
    meta_keywords VARCHAR(255),
    views INT DEFAULT 0,
    sort_order INT DEFAULT 0,
    status ENUM('published', 'draft', 'archived') DEFAULT 'published',
    published_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY(author_id) REFERENCES admins(id) ON DELETE SET NULL,
    INDEX(slug),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample blogs
INSERT INTO blogs (title, slug, category_id, author_id, content, excerpt, status, published_at) VALUES 
('Top 10 SEO Tips for 2026', 'top-10-seo-tips-2026', 4, 1, '<p>Learn the most effective SEO strategies for 2026...</p>', 'Discover the top SEO strategies that will boost your rankings.', 'published', NOW()),
('Digital Marketing Trends', 'digital-marketing-trends', 4, 1, '<p>The future of digital marketing is here...</p>', 'Explore the latest trends in digital marketing.', 'published', NOW()),
('Web Development Best Practices', 'web-dev-best-practices', 5, 1, '<p>Follow these best practices for modern web development...</p>', 'Learn the best practices for building modern websites.', 'published', NOW());

-- =====================================================
-- 6. TESTIMONIALS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS testimonials (
    id INT PRIMARY KEY AUTO_INCREMENT,
    client_name VARCHAR(255) NOT NULL,
    client_company VARCHAR(255),
    client_designation VARCHAR(255),
    client_image VARCHAR(255),
    message LONGTEXT NOT NULL,
    rating INT DEFAULT 5,
    sort_order INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample testimonials
INSERT INTO testimonials (client_name, client_company, client_designation, message, rating, sort_order) VALUES 
('John Smith', 'TechStore Inc', 'CEO', 'Deeprank Solutions transformed our online presence. Highly recommended!', 5, 1),
('Sarah Johnson', 'Global Solutions Ltd', 'Marketing Manager', 'Professional team, excellent results, and great customer support.', 5, 2),
('Mike Davis', 'FinanceHub', 'CTO', 'The best development partner we have worked with.', 5, 3),
('Emily Brown', 'Sales Force Corp', 'Director', 'Delivered our CRM project on time and exceeded expectations.', 5, 4);

-- =====================================================
-- 7. TEAM TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS team (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    designation VARCHAR(255),
    department VARCHAR(255),
    bio LONGTEXT,
    image VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    social_links JSON,
    sort_order INT DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample team
INSERT INTO team (name, designation, department, bio, sort_order) VALUES 
('Rajesh Kumar', 'CEO & Founder', 'Management', 'Visionary leader with 15+ years in digital solutions', 1),
('Priya Sharma', 'Lead Developer', 'Development', 'Expert in PHP, Laravel, and modern web technologies', 2),
('Amit Patel', 'Digital Marketing Head', 'Marketing', 'Specialist in SEO and digital marketing strategies', 3),
('Neha Singh', 'UI/UX Designer', 'Design', 'Creative designer with eye for modern aesthetics', 4),
('Vikram Verma', 'QA Lead', 'Quality Assurance', 'Ensures quality and reliability of all projects', 5);

-- =====================================================
-- 8. CONTACTS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(255),
    service_interested VARCHAR(255),
    budget VARCHAR(100),
    message LONGTEXT,
    ip_address VARCHAR(50),
    user_agent VARCHAR(255),
    status ENUM('new', 'read', 'replied', 'archived') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(email),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 9. CAREERS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS careers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    position_title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    department VARCHAR(255),
    description LONGTEXT,
    requirements LONGTEXT,
    salary_range VARCHAR(100),
    employment_type ENUM('full-time', 'part-time', 'contract', 'internship') DEFAULT 'full-time',
    location VARCHAR(255),
    sort_order INT DEFAULT 0,
    status ENUM('open', 'closed') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(slug),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample career positions
INSERT INTO careers (position_title, slug, department, employment_type, location, status, sort_order) VALUES 
('Senior PHP Developer', 'senior-php-developer', 'Development', 'full-time', 'Remote', 'open', 1),
('UI/UX Designer', 'ui-ux-designer', 'Design', 'full-time', 'Office', 'open', 2),
('Digital Marketing Executive', 'digital-marketing-executive', 'Marketing', 'full-time', 'Remote', 'open', 3),
('QA Engineer', 'qa-engineer', 'Quality Assurance', 'full-time', 'Office', 'open', 4);

-- =====================================================
-- 10. CAREER APPLICATIONS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS career_applications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    career_id INT NOT NULL,
    applicant_name VARCHAR(255) NOT NULL,
    applicant_email VARCHAR(255) NOT NULL,
    applicant_phone VARCHAR(20),
    applicant_experience INT,
    resume_path VARCHAR(255),
    cover_letter LONGTEXT,
    status ENUM('pending', 'reviewed', 'shortlisted', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY(career_id) REFERENCES careers(id) ON DELETE CASCADE,
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 11. NEWSLETTER TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS newsletter (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    status ENUM('subscribed', 'unsubscribed') DEFAULT 'subscribed',
    verification_token VARCHAR(255),
    verified_at DATETIME,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    unsubscribed_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(email),
    INDEX(status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 12. SEO SETTINGS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS seo_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(255) NOT NULL UNIQUE,
    setting_value LONGTEXT,
    setting_type ENUM('string', 'text', 'number', 'json') DEFAULT 'string',
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample SEO settings
INSERT INTO seo_settings (setting_key, setting_value, setting_type) VALUES 
('site_title', 'Deeprank Solutions - Digital Agency', 'string'),
('site_description', 'Leading digital agency offering SEO, web development, and software solutions', 'string'),
('site_keywords', 'digital marketing, web development, SEO, PHP development', 'string'),
('google_analytics', 'UA-XXXXX-XX', 'string'),
('google_search_console', '', 'string'),
('facebook_pixel', '', 'string'),
('og_image', '/assets/images/og-image.jpg', 'string'),
('twitter_handle', '@deepranksol', 'string');

-- =====================================================
-- 13. WEBSITE SETTINGS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS website_settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    setting_key VARCHAR(255) NOT NULL UNIQUE,
    setting_value LONGTEXT,
    setting_type ENUM('string', 'text', 'number', 'json', 'boolean') DEFAULT 'string',
    description VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX(setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample website settings
INSERT INTO website_settings (setting_key, setting_value, setting_type) VALUES 
('site_name', 'Deeprank Solutions', 'string'),
('site_email', 'info@deeprank.com', 'string'),
('support_email', 'support@deeprank.com', 'string'),
('admin_email', 'admin@deeprank.com', 'string'),
('phone_primary', '+91-XXXXXXXXXX', 'string'),
('phone_secondary', '+91-XXXXXXXXXX', 'string'),
('address', 'Your Business Address Here', 'string'),
('city', 'Your City', 'string'),
('state', 'Your State', 'string'),
('country', 'Your Country', 'string'),
('postal_code', 'XXXXX', 'string'),
('latitude', '28.6139', 'string'),
('longitude', '77.2090', 'string'),
('facebook_url', 'https://facebook.com/deeprank', 'string'),
('twitter_url', 'https://twitter.com/deeprank', 'string'),
('linkedin_url', 'https://linkedin.com/company/deeprank', 'string'),
('instagram_url', 'https://instagram.com/deeprank', 'string'),
('youtube_url', 'https://youtube.com/deeprank', 'string'),
('whatsapp_number', '+91-XXXXXXXXXX', 'string'),
('maintenance_mode', '0', 'boolean'),
('allow_comments', '1', 'boolean'),
('smtp_enabled', '0', 'boolean'),
('smtp_host', 'smtp.gmail.com', 'string'),
('smtp_port', '587', 'number'),
('smtp_username', 'your-email@gmail.com', 'string'),
('smtp_password', '', 'string'),
('currency', 'INR', 'string'),
('date_format', 'd-m-Y', 'string'),
('time_format', 'H:i:s', 'string'),
('timezone', 'Asia/Kolkata', 'string');

-- =====================================================
-- Create Indexes for Better Performance
-- =====================================================

ALTER TABLE services ADD INDEX idx_category_status (category_id, status);
ALTER TABLE portfolio ADD INDEX idx_category_status (category_id, status);
ALTER TABLE blogs ADD INDEX idx_category_author_status (category_id, author_id, status);
ALTER TABLE contacts ADD INDEX idx_email_status (email, status);
ALTER TABLE newsletter ADD INDEX idx_email_status (email, status);
ALTER TABLE careers ADD INDEX idx_department_status (department, status);

-- =====================================================
-- Display Success Message
-- =====================================================

SELECT '✓ Database Setup Complete!' AS Message;
SHOW TABLES;
