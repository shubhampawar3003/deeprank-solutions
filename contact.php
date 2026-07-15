<?php
/**
 * Contact Us Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'Contact Us - Deeprank Solutions';
$page_description = 'Get in touch with Deeprank Solutions. We are here to help your business succeed.';
$page_keywords = 'contact us, get in touch, support';
$page_url = SITE_URL . '/contact';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Get In Touch</h1>
        <p class="lead text-muted">We'd love to hear from you. Let's discuss your project!</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="contact-info mb-4">
                    <h5 class="mb-3">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        Address
                    </h5>
                    <p class="text-muted"><?php echo getSetting('address') ?? 'Your Address'; ?></p>
                </div>
                
                <div class="contact-info mb-4">
                    <h5 class="mb-3">
                        <i class="fas fa-phone text-primary me-2"></i>
                        Phone
                    </h5>
                    <p class="text-muted">
                        <a href="tel:<?php echo getSetting('phone_primary'); ?>" class="text-decoration-none">
                            <?php echo getSetting('phone_primary'); ?>
                        </a>
                    </p>
                </div>
                
                <div class="contact-info mb-4">
                    <h5 class="mb-3">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        Email
                    </h5>
                    <p class="text-muted">
                        <a href="mailto:<?php echo getSetting('site_email'); ?>" class="text-decoration-none">
                            <?php echo getSetting('site_email'); ?>
                        </a>
                    </p>
                </div>
                
                <div class="contact-info">
                    <h5 class="mb-3">
                        <i class="fas fa-clock text-primary me-2"></i>
                        Business Hours
                    </h5>
                    <p class="text-muted">
                        Monday - Friday: 9:00 AM - 6:00 PM<br>
                        Saturday: 10:00 AM - 4:00 PM<br>
                        Sunday: Closed
                    </p>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-8">
                <form id="contact-form" class="contact-form" method="POST" action="<?php echo SITE_URL; ?>/api/contact.php">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="company" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company" name="company">
                        </div>
                        <div class="col-md-6">
                            <label for="service" class="form-label">Service Interested *</label>
                            <select class="form-select" id="service" name="service" required>
                                <option selected>-- Select a service --</option>
                                <?php
                                $db->prepare('SELECT id, name FROM services WHERE status = ? ORDER BY name');
                                $db->bind(['active']);
                                $db->execute();
                                $services = $db->getAll();
                                foreach ($services as $service):
                                ?>
                                <option value="<?php echo $service['id']; ?>"><?php echo escapeOutput($service['name']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="budget" class="form-label">Budget *</label>
                            <select class="form-select" id="budget" name="budget" required>
                                <option selected>-- Select budget range --</option>
                                <option value="below-25k">Below ₹25,000</option>
                                <option value="25k-50k">₹25,000 - ₹50,000</option>
                                <option value="50k-100k">₹50,000 - ₹100,000</option>
                                <option value="100k-500k">₹100,000 - ₹500,000</option>
                                <option value="above-500k">Above ₹500,000</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <?php if (RECAPTCHA_ENABLED): ?>
                        <div class="col-12">
                            <div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY; ?>"></div>
                        </div>
                        <?php endif; ?>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5">
    <div class="container-fluid">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.5714755742167!2d77.20900107346198!3d28.6139387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2cccccccccd%3A0x5cd39ab34db7d6f1!2sDelhi%2C%20India!5e0!3m2!1sen!2sin!4v1000000000000" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
