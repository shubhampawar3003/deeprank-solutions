<?php
/**
 * Security Functions
 * 
 * Provides security utilities for the application including:
 * - CSRF token generation and validation
 * - XSS prevention
 * - Input sanitization
 * - Password hashing
 * - JWT token handling
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */

/**
 * Generate CSRF Token
 * 
 * @return string
 */
function generateCSRFToken() {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

/**
 * Verify CSRF Token
 * 
 * @param string $token Token to verify
 * @return bool
 */
function verifyCSRFToken($token) {
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        return false;
    }
    return hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

/**
 * Sanitize input string
 * 
 * @param string $input Input string
 * @return string
 */
function sanitizeInput($input) {
    if (is_array($input)) {
        return array_map('sanitizeInput', $input);
    }
    
    // Remove leading/trailing whitespace
    $input = trim($input);
    
    // Remove null bytes
    $input = str_replace(chr(0), '', $input);
    
    // Strip HTML tags
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    
    return $input;
}

/**
 * Sanitize email address
 * 
 * @param string $email Email address
 * @return string|false
 */
function sanitizeEmail($email) {
    $email = trim($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    }
    return false;
}

/**
 * Hash password using bcrypt
 * 
 * @param string $password Password to hash
 * @return string
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_HASH_ALGO, ['cost' => PASSWORD_HASH_COST]);
}

/**
 * Verify password against hash
 * 
 * @param string $password Password to verify
 * @param string $hash Hash to verify against
 * @return bool
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Prevent XSS by escaping output
 * 
 * @param string $text Text to escape
 * @return string
 */
function escapeOutput($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitize URL
 * 
 * @param string $url URL to sanitize
 * @return string|false
 */
function sanitizeURL($url) {
    $url = trim($url);
    $url = filter_var($url, FILTER_SANITIZE_URL);
    
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        return $url;
    }
    return false;
}

/**
 * Sanitize filename
 * 
 * @param string $filename Filename to sanitize
 * @return string
 */
function sanitizeFilename($filename) {
    // Remove path traversal attempts
    $filename = str_replace(['..', '/', '\\'], '', $filename);
    
    // Remove special characters
    $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
    
    // Remove leading dots
    $filename = ltrim($filename, '.');
    
    // Limit length
    $filename = substr($filename, 0, 255);
    
    return $filename;
}

/**
 * Validate file upload
 * 
 * @param array $file $_FILES array element
 * @param array $allowed_ext Allowed extensions
 * @param int $max_size Maximum file size
 * @return array ['success' => bool, 'error' => string]
 */
function validateFileUpload($file, $allowed_ext = null, $max_size = UPLOAD_MAX_SIZE) {
    if ($allowed_ext === null) {
        $allowed_ext = ALLOWED_EXTENSIONS;
    }

    if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'error' => 'File upload error'];
    }

    // Check file size
    if ($file['size'] > $max_size) {
        return ['success' => false, 'error' => 'File size exceeds limit'];
    }

    // Get file extension
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    if (!in_array($ext, $allowed_ext)) {
        return ['success' => false, 'error' => 'File type not allowed'];
    }

    // Validate MIME type
    $mime = mime_content_type($file['tmp_name']);
    if (!in_array($mime, ALLOWED_MIME_TYPES)) {
        return ['success' => false, 'error' => 'Invalid file MIME type'];
    }

    return ['success' => true];
}

/**
 * Generate JWT Token
 * 
 * @param array $payload Payload data
 * @param int $expire Expiration time in seconds
 * @return string
 */
function generateJWT($payload, $expire = 3600) {
    $header = ['alg' => 'HS256', 'typ' => 'JWT'];
    $payload['iat'] = time();
    $payload['exp'] = time() + $expire;

    $header_encoded = base64url_encode(json_encode($header));
    $payload_encoded = base64url_encode(json_encode($payload));

    $signature = hash_hmac(
        'sha256',
        $header_encoded . '.' . $payload_encoded,
        JWT_SECRET,
        true
    );
    $signature_encoded = base64url_encode($signature);

    return $header_encoded . '.' . $payload_encoded . '.' . $signature_encoded;
}

/**
 * Verify JWT Token
 * 
 * @param string $token JWT token
 * @return array|false
 */
function verifyJWT($token) {
    $parts = explode('.', $token);
    if (count($parts) !== 3) {
        return false;
    }

    list($header_encoded, $payload_encoded, $signature_encoded) = $parts;

    // Verify signature
    $signature = hash_hmac(
        'sha256',
        $header_encoded . '.' . $payload_encoded,
        JWT_SECRET,
        true
    );
    $signature_decoded = base64url_decode($signature_encoded);

    if (!hash_equals($signature, $signature_decoded)) {
        return false;
    }

    // Decode payload
    $payload = json_decode(base64url_decode($payload_encoded), true);

    // Check expiration
    if (isset($payload['exp']) && $payload['exp'] < time()) {
        return false;
    }

    return $payload;
}

/**
 * Base64 URL Safe Encoding
 * 
 * @param string $data Data to encode
 * @return string
 */
function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

/**
 * Base64 URL Safe Decoding
 * 
 * @param string $data Data to decode
 * @return string
 */
function base64url_decode($data) {
    $data .= str_repeat('=', 4 - strlen($data) % 4);
    return base64_decode(strtr($data, '-_', '+/'));
}

/**
 * Check if user is logged in
 * 
 * @return bool
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Get current logged in user ID
 * 
 * @return int|null
 */
function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

/**
 * Log user out
 */
function logout() {
    $_SESSION = [];
    session_destroy();
    header('Location: ' . SITE_URL . '/admin');
    exit();
}

/**
 * Set error message in session
 * 
 * @param string $message Error message
 */
function setError($message) {
    $_SESSION['error'] = $message;
}

/**
 * Get and clear error message
 * 
 * @return string|null
 */
function getError() {
    $error = $_SESSION['error'] ?? null;
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
    return $error;
}

/**
 * Set success message in session
 * 
 * @param string $message Success message
 */
function setSuccess($message) {
    $_SESSION['success'] = $message;
}

/**
 * Get and clear success message
 * 
 * @return string|null
 */
function getSuccess() {
    $success = $_SESSION['success'] ?? null;
    if (isset($_SESSION['success'])) {
        unset($_SESSION['success']);
    }
    return $success;
}

/**
 * Redirect to URL
 * 
 * @param string $url URL to redirect to
 */
function redirect($url) {
    header('Location: ' . $url);
    exit();
}

/**
 * Send JSON response
 * 
 * @param array $data Response data
 * @param int $status HTTP status code
 */
function sendJSON($data, $status = 200) {
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode($data);
    exit();
}

?>
