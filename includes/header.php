<?php
/**
 * Header Template
 * 
 * Main header with sticky navigation, logo, and menu
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <?php include 'meta-tags.php'; ?>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/animations.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/responsive.css">
    
    <!-- Dark Mode CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/dark-mode.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo SITE_URL; ?>/assets/images/favicon.ico" type="image/x-icon">
    
    <!-- Google Analytics -->
    <?php if (GOOGLE_ANALYTICS_ID): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOGLE_ANALYTICS_ID; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo GOOGLE_ANALYTICS_ID; ?>');
    </script>
    <?php endif; ?>
    
    <!-- Facebook Pixel -->
    <?php if (FACEBOOK_PIXEL_ID): ?>
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}
        (window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo FACEBOOK_PIXEL_ID; ?>');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=<?php echo FACEBOOK_PIXEL_ID; ?>&ev=PageView&noscript=1"
    /></noscript>
    <?php endif; ?>
</head>
<body>

<!-- Skip to main content (Accessibility) -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<!-- Cookie Consent Banner -->
<div id="cookie-consent" class="cookie-banner">
    <div class="container">
        <p>We use cookies to enhance your experience. By continuing to browse, you agree to our <a href="<?php echo SITE_URL; ?>/privacy-policy">Privacy Policy</a>.</p>
        <button id="accept-cookies" class="btn btn-sm btn-primary">Accept</button>
        <button id="decline-cookies" class="btn btn-sm btn-outline-secondary">Decline</button>
    </div>
</div>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top" id="navbar">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
            <img src="<?php echo SITE_URL; ?>/assets/images/logo.png" alt="Deeprank Solutions" class="logo">
            <span class="brand-name">Deeprank Solutions</span>
        </a>
        
        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/careers">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL; ?>/contact">Contact</a>
                </li>
                
                <!-- Dark Mode Toggle -->
                <li class="nav-item">
                    <button id="dark-mode-toggle" class="btn btn-link nav-link" title="Toggle Dark Mode">
                        <i class="fas fa-moon"></i>
                    </button>
                </li>
                
                <!-- CTA Button -->
                <li class="nav-item">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-primary ms-2">Get Started</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- WhatsApp Floating Button -->
<?php 
    $whatsapp_number = getSetting('whatsapp_number') ?? '+919876543210';
    $whatsapp_number = preg_replace('/[^0-9+]/', '', $whatsapp_number);
?>
<a href="https://wa.me/<?php echo $whatsapp_number; ?>" class="whatsapp-float" title="Chat on WhatsApp" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Main Content -->
<main id="main-content">
