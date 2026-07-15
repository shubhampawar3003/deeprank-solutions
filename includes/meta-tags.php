<?php
/**
 * Meta Tags Generator
 * 
 * Generates dynamic SEO meta tags, Open Graph, Twitter Cards, and Schema.org
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */

// Get page variables (should be set in each page)
$page_title = $page_title ?? getSetting('site_title') ?? SITE_NAME;
$page_description = $page_description ?? getSetting('site_description') ?? 'Premium digital agency solutions';
$page_keywords = $page_keywords ?? getSetting('site_keywords') ?? '';
$page_image = $page_image ?? SITE_URL . '/assets/images/og-image.jpg';
$page_url = $page_url ?? SITE_URL;
$page_type = $page_type ?? 'website';

?>
<!-- Title -->
<title><?php echo escapeOutput($page_title); ?> - Deeprank Solutions</title>

<!-- Meta Description -->
<meta name="description" content="<?php echo escapeOutput($page_description); ?>">

<!-- Meta Keywords -->
<?php if (!empty($page_keywords)): ?>
<meta name="keywords" content="<?php echo escapeOutput($page_keywords); ?>">
<?php endif; ?>

<!-- Author -->
<meta name="author" content="Deeprank Solutions">

<!-- Robots -->
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">

<!-- Canonical URL -->
<link rel="canonical" href="<?php echo escapeOutput($page_url); ?>">

<!-- Alternate Versions -->
<link rel="alternate" hreflang="en" href="<?php echo escapeOutput($page_url); ?>">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="<?php echo escapeOutput($page_title); ?>">
<meta property="og:description" content="<?php echo escapeOutput($page_description); ?>">
<meta property="og:image" content="<?php echo escapeOutput($page_image); ?>">
<meta property="og:url" content="<?php echo escapeOutput($page_url); ?>">
<meta property="og:type" content="<?php echo escapeOutput($page_type); ?>">
<meta property="og:site_name" content="Deeprank Solutions">
<meta property="og:locale" content="en_IN">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo getSetting('twitter_handle') ?? '@deepranksol'; ?>">
<meta name="twitter:title" content="<?php echo escapeOutput($page_title); ?>">
<meta name="twitter:description" content="<?php echo escapeOutput($page_description); ?>">
<meta name="twitter:image" content="<?php echo escapeOutput($page_image); ?>">

<!-- Additional Meta Tags -->
<meta name="theme-color" content="#0066ff">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Deeprank Solutions">

<!-- DNS Prefetch -->
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link rel="dns-prefetch" href="//connect.facebook.net">

<!-- Preconnect -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<!-- Prefetch -->
<link rel="prefetch" href="<?php echo SITE_URL; ?>/assets/images/">
