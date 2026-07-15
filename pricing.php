<?php
/**
 * Pricing Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'Pricing - Deeprank Solutions';
$page_description = 'Check our transparent and flexible pricing plans for digital services.';
$page_keywords = 'pricing, plans, packages, cost';
$page_url = SITE_URL . '/pricing';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Simple & Transparent Pricing</h1>
        <p class="lead text-muted">Choose the perfect plan for your business</p>
    </div>
</section>

<!-- Pricing Table -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            $pricing_plans = [
                [
                    'name' => 'Starter',
                    'price' => 499,
                    'features' => [
                        'Up to 5 Projects',
                        'Email Support',
                        'Monthly Reports',
                        'Basic Analytics'
                    ]
                ],
                [
                    'name' => 'Professional',
                    'price' => 999,
                    'features' => [
                        'Unlimited Projects',
                        'Priority Support',
                        'Daily Reports',
                        'Advanced Analytics',
                        'Dedicated Account Manager'
                    ],
                    'popular' => true
                ],
                [
                    'name' => 'Enterprise',
                    'price' => 2499,
                    'features' => [
                        'Dedicated Team',
                        '24/7 Support',
                        'Real-time Reports',
                        'Custom Analytics',
                        'API Access',
                        'Custom Solutions'
                    ]
                ]
            ];
            
            foreach ($pricing_plans as $index => $plan):
            ?>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="pricing-card card h-100 border-0 shadow-sm <?php echo isset($plan['popular']) ? 'border-primary border-3' : ''; ?>">
                    <?php if (isset($plan['popular'])): ?>
                    <div class="badge bg-primary position-absolute top-0 start-50 translate-middle-x">POPULAR</div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title mb-4"><?php echo $plan['name']; ?></h5>
                        <div class="pricing-value mb-4">
                            <span class="h1 fw-bold">₹<?php echo number_format($plan['price']); ?></span>
                            <span class="text-muted">/month</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <?php foreach ($plan['features'] as $feature): ?>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><?php echo $feature; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-primary w-100">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">Frequently Asked Questions</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Can I upgrade or downgrade my plan?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Is there a setup fee?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                No, there are no hidden setup fees. You only pay the monthly subscription amount.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Do you offer refunds?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a 30-day money-back guarantee if you're not satisfied with our services.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
