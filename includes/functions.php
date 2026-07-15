<?php
/**
 * Global Functions
 * 
 * Provides utility functions used throughout the application
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */

/**
 * Format price/currency
 * 
 * @param float $price Price to format
 * @param string $currency Currency symbol
 * @return string
 */
function formatPrice($price, $currency = '₹') {
    return $currency . ' ' . number_format($price, 2, '.', ',');
}

/**
 * Format date
 * 
 * @param string $date Date string
 * @param string $format Date format
 * @return string
 */
function formatDate($date, $format = 'd M Y') {
    if (empty($date)) return '';
    return date($format, strtotime($date));
}

/**
 * Generate slug from text
 * 
 * @param string $text Text to convert
 * @return string
 */
function generateSlug($text) {
    // Convert to lowercase
    $text = strtolower($text);
    
    // Replace spaces with hyphens
    $text = preg_replace('/\s+/', '-', $text);
    
    // Remove special characters
    $text = preg_replace('/[^a-z0-9-]/', '', $text);
    
    // Remove consecutive hyphens
    $text = preg_replace('/-+/', '-', $text);
    
    // Remove leading/trailing hyphens
    $text = trim($text, '-');
    
    return $text;
}

/**
 * Truncate text
 * 
 * @param string $text Text to truncate
 * @param int $length Maximum length
 * @param string $suffix Suffix to add
 * @return string
 */
function truncateText($text, $length = 100, $suffix = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . $suffix;
}

/**
 * Convert text to uppercase first letter
 * 
 * @param string $text Text to convert
 * @return string
 */
function capitalizeFirst($text) {
    return ucfirst(strtolower($text));
}

/**
 * Format file size
 * 
 * @param int $bytes File size in bytes
 * @return string
 */
function formatFileSize($bytes) {
    $units = ['B', 'KB', 'MB', 'GB'];
    $size = $bytes;
    $unit = 0;
    
    while ($size >= 1024 && $unit < count($units) - 1) {
        $size /= 1024;
        $unit++;
    }
    
    return number_format($size, 2) . ' ' . $units[$unit];
}

/**
 * Get gravatar URL
 * 
 * @param string $email Email address
 * @param int $size Avatar size
 * @return string
 */
function getGravatarURL($email, $size = 80) {
    $email = strtolower(trim($email));
    $hash = md5($email);
    return "https://www.gravatar.com/avatar/{$hash}?s={$size}&d=mp";
}

/**
 * Get reading time
 * 
 * @param string $text Text content
 * @param int $wpm Words per minute
 * @return int
 */
function getReadingTime($text, $wpm = 200) {
    $wordCount = str_word_count(strip_tags($text));
    $readingTime = ceil($wordCount / $wpm);
    return $readingTime > 0 ? $readingTime : 1;
}

/**
 * Generate random string
 * 
 * @param int $length Length of string
 * @return string
 */
function generateRandomString($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

/**
 * Get file extension
 * 
 * @param string $filename Filename
 * @return string
 */
function getFileExtension($filename) {
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}

/**
 * Get base filename
 * 
 * @param string $filename Filename
 * @return string
 */
function getBasename($filename) {
    return pathinfo($filename, PATHINFO_BASENAME);
}

/**
 * Check if email exists in database
 * 
 * @param string $email Email to check
 * @return bool
 */
function emailExists($email) {
    global $db;
    $db->prepare('SELECT id FROM admins WHERE email = ?');
    $db->bind(['email' => $email]);
    $db->execute();
    return $db->count() > 0;
}

/**
 * Get admin by email
 * 
 * @param string $email Admin email
 * @return array|null
 */
function getAdminByEmail($email) {
    global $db;
    $db->prepare('SELECT * FROM admins WHERE email = ?');
    $db->bind(['email' => $email]);
    $db->execute();
    return $db->getRow();
}

/**
 * Get admin by ID
 * 
 * @param int $id Admin ID
 * @return array|null
 */
function getAdminById($id) {
    global $db;
    $db->prepare('SELECT * FROM admins WHERE id = ?');
    $db->bind(['id' => $id]);
    $db->execute();
    return $db->getRow();
}

/**
 * Count total records in table
 * 
 * @param string $table Table name
 * @return int
 */
function countRecords($table, $where = '') {
    global $db;
    $sql = "SELECT COUNT(*) as total FROM {$table}";
    if ($where) {
        $sql .= " WHERE {$where}";
    }
    $db->prepare($sql);
    $db->execute();
    $row = $db->getRow();
    return $row['total'] ?? 0;
}

/**
 * Get site setting
 * 
 * @param string $key Setting key
 * @return mixed
 */
function getSetting($key) {
    global $db;
    $db->prepare('SELECT setting_value, setting_type FROM website_settings WHERE setting_key = ?');
    $db->bind(['key' => $key]);
    $db->execute();
    $row = $db->getRow();
    
    if (!$row) return null;
    
    $value = $row['setting_value'];
    $type = $row['setting_type'];
    
    // Convert based on type
    if ($type === 'json') {
        return json_decode($value, true);
    } elseif ($type === 'number') {
        return (int)$value;
    } elseif ($type === 'boolean') {
        return (bool)$value;
    }
    
    return $value;
}

/**
 * Update site setting
 * 
 * @param string $key Setting key
 * @param mixed $value Setting value
 * @return bool
 */
function updateSetting($key, $value) {
    global $db;
    
    // Check if setting exists
    $db->prepare('SELECT id FROM website_settings WHERE setting_key = ?');
    $db->bind(['key' => $key]);
    $db->execute();
    
    if ($db->count() > 0) {
        // Update
        $db->prepare('UPDATE website_settings SET setting_value = ? WHERE setting_key = ?');
        $db->bind([['value' => $value, 's'], ['key' => $key, 's']]);
    } else {
        // Insert
        $db->prepare('INSERT INTO website_settings (setting_key, setting_value) VALUES (?, ?)');
        $db->bind([['key' => $key, 's'], ['value' => $value, 's']]);
    }
    
    return $db->execute();
}

?>
