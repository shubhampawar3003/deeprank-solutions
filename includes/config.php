<?php
/**
 * Deeprank Solutions - Configuration File
 * 
 * This file contains all configuration settings for the website.
 * Database credentials, site settings, security keys, and API configurations.
 * 
 * WARNING: Keep this file secure and never commit to public repositories
 * with real credentials!
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 * @license MIT
 */

// =====================================================
// ERROR REPORTING - Set to 0 in production
// =====================================================
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/../logs/php-errors.log');

// =====================================================
// ENVIRONMENT SETTINGS
// =====================================================
define('ENVIRONMENT', 'development'); // development, staging, production
define('DEBUG', ENVIRONMENT === 'development'); // Debug mode

// =====================================================
// DATABASE CONFIGURATION
// =====================================================
define('DB_HOST', 'localhost');              // Database host
define('DB_USER', 'root');                   // Database username
define('DB_PASS', '');                       // Database password (empty for localhost)
define('DB_NAME', 'DB_DeepRank');            // Your database name
define('DB_PORT', 3306);                     // Database port
define('DB_CHARSET', 'utf8mb4');             // Character set
define('DB_TIMEZONE', '+00:00');             // Database timezone

// =====================================================
// SITE CONFIGURATION
// =====================================================
define('SITE_URL', 'http://localhost/deeprank-solutions');    // Base URL
define('SITE_NAME', 'Deeprank Solutions');                    // Site name
define('SITE_DESCRIPTION', 'Premium Digital Agency');         // Site description
define('SITE_EMAIL', 'info@deeprank.com');                    // Site email
define('ADMIN_EMAIL', 'admin@deeprank.com');                  // Admin email
define('SUPPORT_EMAIL', 'support@deeprank.com');              // Support email

// =====================================================
// SECURITY CONFIGURATION
// =====================================================
define('SECRET_KEY', 'deeprank-secret-key-change-in-production-2026');    // Secret key for encryption
define('JWT_SECRET', 'deeprank-jwt-secret-change-in-production-2026');    // JWT secret
define('SESSION_NAME', 'DEEPRANK_SESSION');                              // Session name
define('SESSION_TIMEOUT', 3600);                                         // Session timeout (1 hour)
define('CSRF_TOKEN_NAME', 'deeprank_csrf_token');                        // CSRF token name
define('PASSWORD_HASH_ALGO', PASSWORD_BCRYPT);                          // Password hashing algorithm
define('PASSWORD_HASH_COST', 10);                                        // Bcrypt cost factor

// =====================================================
// UPLOAD CONFIGURATION
// =====================================================
define('UPLOAD_DIR', dirname(__FILE__) . '/../uploads/');              // Upload directory
define('UPLOAD_MAX_SIZE', 20 * 1024 * 1024);                           // Max upload size (20 MB)
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx']);
define('ALLOWED_MIME_TYPES', [
    'image/jpeg',
    'image/png',
    'image/gif',
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
]);

// =====================================================
// EMAIL CONFIGURATION
// =====================================================
define('MAIL_FROM_NAME', 'Deeprank Solutions');                    // Email from name
define('MAIL_FROM_EMAIL', 'noreply@deeprank.com');                // Email from address
define('SMTP_ENABLED', false);                                    // Enable SMTP
define('SMTP_HOST', 'smtp.gmail.com');                            // SMTP host
define('SMTP_PORT', 587);                                         // SMTP port
define('SMTP_USERNAME', 'your-email@gmail.com');                  // SMTP username
define('SMTP_PASSWORD', 'your-app-password');                     // SMTP password
define('SMTP_ENCRYPTION', 'tls');                                 // SMTP encryption (tls, ssl)

// =====================================================
// RECAPTCHA CONFIGURATION
// =====================================================
define('RECAPTCHA_ENABLED', false);                               // Enable reCAPTCHA
define('RECAPTCHA_SITE_KEY', 'YOUR_RECAPTCHA_SITE_KEY');          // reCAPTCHA site key
define('RECAPTCHA_SECRET_KEY', 'YOUR_RECAPTCHA_SECRET_KEY');      // reCAPTCHA secret key

// =====================================================
// GOOGLE ANALYTICS
// =====================================================
define('GOOGLE_ANALYTICS_ID', 'UA-XXXXX-XX');                     // Google Analytics ID
define('GOOGLE_SEARCH_CONSOLE_TOKEN', '');                       // Google Search Console verification token

// =====================================================
// FACEBOOK PIXEL
// =====================================================
define('FACEBOOK_PIXEL_ID', 'YOUR_FACEBOOK_PIXEL_ID');            // Facebook Pixel ID

// =====================================================
// SOCIAL MEDIA LINKS
// =====================================================
define('SOCIAL_LINKS', [
    'facebook' => 'https://facebook.com/deepranksolutions',
    'twitter' => 'https://twitter.com/deepranksol',
    'linkedin' => 'https://linkedin.com/company/deeprank',
    'instagram' => 'https://instagram.com/deepranksol',
    'youtube' => 'https://youtube.com/@deepranksolutions',
    'whatsapp' => 'https://wa.me/919876543210'
]);

// =====================================================
// PAGINATION
// =====================================================
define('ITEMS_PER_PAGE', 10);                                     // Items per page
define('PAGINATION_RANGE', 5);                                    // Pagination range

// =====================================================
// CACHING
// =====================================================
define('CACHE_ENABLED', false);                                   // Enable caching
define('CACHE_DIR', dirname(__FILE__) . '/../cache/');            // Cache directory
define('CACHE_EXPIRY', 3600);                                     // Cache expiry time (1 hour)

// =====================================================
// TIMEZONE
// =====================================================
date_default_timezone_set('Asia/Kolkata');                        // Set timezone

// =====================================================
// APPLICATION PATHS
// =====================================================
define('ROOT_PATH', dirname(__FILE__) . '/../');                  // Root path
define('INCLUDES_PATH', dirname(__FILE__) . '/');                 // Includes path
define('ADMIN_PATH', dirname(__FILE__) . '/../admin/');           // Admin path
define('ASSETS_PATH', dirname(__FILE__) . '/../assets/');         // Assets path
define('API_PATH', dirname(__FILE__) . '/../api/');               // API path
define('LOG_PATH', dirname(__FILE__) . '/../logs/');              // Log path

// =====================================================
// HTTP HEADERS
// =====================================================
header('X-Frame-Options: SAMEORIGIN');                            // Prevent clickjacking
header('X-Content-Type-Options: nosniff');                        // Prevent MIME sniffing
header('X-XSS-Protection: 1; mode=block');                        // Enable XSS protection
header('Referrer-Policy: strict-origin-when-cross-origin');       // Referrer policy
header('Content-Type: text/html; charset=utf-8');                 // Content type

// =====================================================
// ENABLE SESSIONS
// =====================================================
if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_set_cookie_params([
        'lifetime' => SESSION_TIMEOUT,
        'path' => '/',
        'domain' => $_SERVER['HTTP_HOST'] ?? 'localhost',
        'secure' => false,  // Set to true for HTTPS
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    session_start();
}

// =====================================================
// SITE AVAILABILITY CHECK
// =====================================================
define('SITE_AVAILABLE', true);                                   // Maintenance mode

if (!SITE_AVAILABLE && ENVIRONMENT !== 'development') {
    die('Site is under maintenance. Please try again later.');
}

// =====================================================
// CONFIGURATION LOADED
// =====================================================
define('CONFIG_LOADED', true);

?>
