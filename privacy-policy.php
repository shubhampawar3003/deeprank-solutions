<?php
/**
 * Privacy Policy Page
 */
require_once 'includes/config.php';

$page_title = 'Privacy Policy - Deeprank Solutions';
$page_description = 'Read our privacy policy to understand how we protect your data and privacy.';
include 'includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Privacy Policy</h1>
                <p class="text-muted mb-4">Last Updated: <?php echo date('F d, Y'); ?></p>
                
                <h3 class="mt-5 mb-3">1. Information We Collect</h3>
                <p>We collect information you provide directly to us, such as when you fill out a form, make a purchase, or contact us. This may include your name, email address, phone number, company name, and project details.</p>
                
                <h3 class="mt-5 mb-3">2. How We Use Your Information</h3>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Provide, maintain, and improve our services</li>
                    <li>Process your requests and respond to your inquiries</li>
                    <li>Send you marketing communications (with your consent)</li>
                    <li>Monitor and analyze trends and usage</li>
                    <li>Comply with legal obligations</li>
                </ul>
                
                <h3 class="mt-5 mb-3">3. Data Security</h3>
                <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>
                
                <h3 class="mt-5 mb-3">4. Third-Party Services</h3>
                <p>We may use third-party services for analytics, payment processing, and other business functions. These third parties have their own privacy policies.</p>
                
                <h3 class="mt-5 mb-3">5. Cookies</h3>
                <p>We use cookies to enhance your browsing experience. You can control cookie settings through your browser preferences.</p>
                
                <h3 class="mt-5 mb-3">6. Your Rights</h3>
                <p>You have the right to access, correct, or delete your personal information. Contact us at <?php echo getSetting('site_email'); ?> to exercise these rights.</p>
                
                <h3 class="mt-5 mb-3">7. Contact Us</h3>
                <p>If you have questions about this privacy policy, please contact us at <?php echo getSetting('site_email'); ?>.</p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
