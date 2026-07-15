<?php
/**
 * Services Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'Services - Deeprank Solutions';
$page_description = 'Explore our comprehensive digital services including SEO, web development, mobile apps, and software solutions.';
$page_keywords = 'services, SEO, web development, digital marketing, software development';
$page_url = SITE_URL . '/services';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Our Services</h1>
        <p class="lead text-muted">Comprehensive digital solutions tailored to your business needs</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            $db->prepare('SELECT * FROM services WHERE status = ? ORDER BY sort_order');
            $db->bind(['active']);
            $db->execute();
            $services = $db->getAll();
            
            foreach ($services as $service):
            ?>
            <div class="col-md-6" data-aos="fade-up" id="<?php echo $service['slug']; ?>">
                <div class="service-detail card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <i class="<?php echo $service['icon']; ?> fa-3x text-primary me-4"></i>
                            <div>
                                <h5 class="card-title mb-0"><?php echo escapeOutput($service['name']); ?></h5>
                                <?php if ($service['price']): ?>
                                <small class="text-muted">Starting from <?php echo formatPrice($service['price']); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="card-text mb-4"><?php echo escapeOutput($service['description']); ?></p>
                        <a href="<?php echo SITE_URL; ?>/contact?service=<?php echo $service['slug']; ?>" class="btn btn-primary">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Didn't find what you need?</h2>
        <p class="lead mb-4">Contact us for custom solutions tailored to your specific requirements</p>
        <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-light btn-lg">Contact Us</a>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
