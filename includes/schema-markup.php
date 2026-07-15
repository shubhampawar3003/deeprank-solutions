<?php
/**
 * Schema.org JSON-LD Markup Generator
 * 
 * Generates structured data for search engines
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */

$schema_type = $schema_type ?? 'Organization';

// Organization Schema
if ($schema_type === 'Organization' || $schema_type === 'LocalBusiness') {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => $schema_type,
        'name' => 'Deeprank Solutions',
        'url' => SITE_URL,
        'logo' => SITE_URL . '/assets/images/logo.png',
        'description' => getSetting('site_description') ?? 'Premium digital agency',
        'email' => getSetting('site_email') ?? 'info@deeprank.com',
        'telephone' => getSetting('phone_primary') ?? '+91-XXXXXXXXXX',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => getSetting('address') ?? '',
            'addressLocality' => getSetting('city') ?? '',
            'addressRegion' => getSetting('state') ?? '',
            'postalCode' => getSetting('postal_code') ?? '',
            'addressCountry' => 'IN'
        ],
        'sameAs' => array_filter([
            getSetting('social_links.facebook') ?? null,
            getSetting('social_links.twitter') ?? null,
            getSetting('social_links.linkedin') ?? null,
            getSetting('social_links.instagram') ?? null
        ])
    ];
    
    if ($schema_type === 'LocalBusiness') {
        $schema['geo'] = [
            '@type' => 'GeoCoordinates',
            'latitude' => getSetting('latitude') ?? '28.6139',
            'longitude' => getSetting('longitude') ?? '77.2090'
        ];
    }
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// Article Schema (for blog posts)
elseif ($schema_type === 'Article') {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $article_title ?? '',
        'description' => $article_description ?? '',
        'image' => $article_image ?? '',
        'datePublished' => $article_date ?? date('Y-m-d'),
        'author' => [
            '@type' => 'Person',
            'name' => 'Deeprank Solutions'
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Deeprank Solutions',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => SITE_URL . '/assets/images/logo.png'
            ]
        ]
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// Breadcrumb Schema
elseif ($schema_type === 'BreadcrumbList') {
    $breadcrumbs = $breadcrumbs ?? [];
    $items = [];
    
    foreach ($breadcrumbs as $index => $breadcrumb) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $breadcrumb['title'] ?? '',
            'item' => $breadcrumb['url'] ?? ''
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// Product/Service Schema
elseif ($schema_type === 'Service') {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service_name ?? '',
        'description' => $service_description ?? '',
        'provider' => [
            '@type' => 'Organization',
            'name' => 'Deeprank Solutions',
            'url' => SITE_URL
        ],
        'serviceType' => $service_type ?? 'Digital Services',
        'priceRange' => $service_price ?? '$$',
        'areaServed' => 'IN'
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// FAQ Schema
elseif ($schema_type === 'FAQPage') {
    $faqs = $faqs ?? [];
    $items = [];
    
    foreach ($faqs as $faq) {
        $items[] = [
            '@type' => 'Question',
            'name' => $faq['question'] ?? '',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer'] ?? ''
            ]
        ];
    }
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items
    ];
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

?>
