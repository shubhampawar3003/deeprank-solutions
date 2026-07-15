<?php
/**
 * Deeprank Solutions - Homepage
 * 
 * Main homepage with hero, services, portfolio, testimonials, etc.
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */

require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

// Initialize database
$db = new Database();

// SEO Meta Tags
$page_title = 'Digital Marketing & Web Development Agency';
$page_description = 'Deeprank Solutions - Leading digital agency offering SEO, web development, mobile apps, and software solutions.';
$page_keywords = 'digital marketing, SEO, web development, PHP, Laravel, CRM, API development';
$page_url = SITE_URL;

include 'includes/header.php';
?>

<!-- Hero Banner Section -->
<section class="hero-banner" style="background: linear-gradient(135deg, #0066ff 0%, #00d4ff 100%);">
    <div class="container h-100 d-flex align-items-center">
        <div class="row w-100 align-items-center">
            <div class="col-lg-6 text-white">
                <h1 class="display-3 fw-bold mb-4 animate-fade-in-left">
                    Elevate Your Digital Presence
                </h1>
                <p class="lead mb-4 animate-fade-in-left" style="animation-delay: 0.2s;">
                    We are a team of digital experts providing comprehensive solutions in SEO, web development, digital marketing, and software solutions.
                </p>
                <div class="d-flex gap-3 animate-fade-in-left" style="animation-delay: 0.4s;">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-light btn-lg px-5">
                        <i class="fas fa-rocket"></i> Get Started
                    </a>
                    <a href="<?php echo SITE_URL; ?>/services" class="btn btn-outline-light btn-lg px-5">
                        <i class="fas fa-arrow-right"></i> Learn More
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center animate-fade-in-right">
                <img src="<?php echo SITE_URL; ?>/assets/images/hero-image.svg" alt="Digital Solutions" class="img-fluid" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Animated Counter Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <h3 class="counter" data-target="500">0</h3>
                <p class="text-muted">Projects Completed</p>
            </div>
            <div class="col-md-3">
                <h3 class="counter" data-target="200">0</h3>
                <p class="text-muted">Happy Clients</p>
            </div>
            <div class="col-md-3">
                <h3 class="counter" data-target="15">0</h3>
                <p class="text-muted">Years Experience</p>
            </div>
            <div class="col-md-3">
                <h3 class="counter" data-target="50">0</h3>
                <p class="text-muted">Team Members</p>
            </div>
        </div>
    </div>
</section>

<!-- About Company Section -->
<section class="py-5" id="about-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="<?php echo SITE_URL; ?>/assets/images/about-image.jpg" alt="About Us" class="img-fluid rounded-lg" data-aos="fade-right">
            </div>
            <div class="col-lg-6">
                <span class="badge bg-primary mb-3" data-aos="fade-up">ABOUT US</span>
                <h2 class="display-5 fw-bold mb-4" data-aos="fade-up" data-aos-delay="100">We Transform Ideas Into Digital Reality</h2>
                <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200">
                    Deeprank Solutions is a premium digital agency with 15+ years of experience in transforming businesses through innovative digital solutions.
                </p>
                <ul class="list-unstyled" data-aos="fade-up" data-aos-delay="300">
                    <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Expert team of developers and marketers</li>
                    <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Proven track record with 500+ successful projects</li>
                    <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Latest technology and best practices</li>
                    <li class="mb-3"><i class="fas fa-check text-success me-2"></i> 24/7 customer support and maintenance</li>
                </ul>
                <a href="<?php echo SITE_URL; ?>/about" class="btn btn-primary btn-lg mt-4" data-aos="fade-up" data-aos-delay="400">
                    Explore Our Story
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">WHY CHOOSE US</span>
            <h2 class="display-5 fw-bold">What Makes Us Different</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center">
                        <div class="icon-box mb-3">
                            <i class="fas fa-rocket fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-3">Fast & Reliable</h5>
                        <p class="card-text text-muted">Quick turnaround times with zero compromise on quality</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center">
                        <div class="icon-box mb-3">
                            <i class="fas fa-shield-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-3">Secure & Scalable</h5>
                        <p class="card-text text-muted">Enterprise-grade security with scalable architecture</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center">
                        <div class="icon-box mb-3">
                            <i class="fas fa-headset fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-3">Expert Support</h5>
                        <p class="card-text text-muted">Dedicated team available 24/7 for your needs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5" id="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">OUR SERVICES</span>
            <h2 class="display-5 fw-bold">Comprehensive Digital Solutions</h2>
        </div>
        <div class="row g-4">
            <?php
            // Fetch services from database
            $db->prepare('SELECT * FROM services WHERE status = ? ORDER BY sort_order LIMIT 6');
            $db->bind(['active']);
            $db->execute();
            $services = $db->getAll();
            
            foreach ($services as $index => $service):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="service-card card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body">
                        <div class="service-icon mb-3">
                            <i class="<?php echo $service['icon']; ?> fa-2x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-3"><?php echo escapeOutput($service['name']); ?></h5>
                        <p class="card-text text-muted mb-4"><?php echo escapeOutput($service['short_description']); ?></p>
                        <a href="<?php echo SITE_URL; ?>/services#<?php echo $service['slug']; ?>" class="btn btn-link p-0">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo SITE_URL; ?>/services" class="btn btn-primary btn-lg">
                View All Services
            </a>
        </div>
    </div>
</section>

<!-- Process Timeline Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Our Process</h2>
        </div>
        <div class="row">
            <div class="col-md-3 text-center mb-4">
                <div class="process-step" data-aos="fade-up">
                    <div class="process-number">1</div>
                    <h5 class="mt-3">Discovery</h5>
                    <p class="text-muted">Understanding your needs and goals</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="process-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="process-number">2</div>
                    <h5 class="mt-3">Strategy</h5>
                    <p class="text-muted">Creating the perfect roadmap</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="process-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="process-number">3</div>
                    <h5 class="mt-3">Execution</h5>
                    <p class="text-muted">Building and implementing solutions</p>
                </div>
            </div>
            <div class="col-md-3 text-center mb-4">
                <div class="process-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="process-number">4</div>
                    <h5 class="mt-3">Success</h5>
                    <p class="text-muted">Continuous support and optimization</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Showcase Section -->
<section class="py-5" id="portfolio-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">OUR PORTFOLIO</span>
            <h2 class="display-5 fw-bold">Recent Projects</h2>
        </div>
        <div class="row g-4">
            <?php
            // Fetch portfolio items
            $db->prepare('SELECT * FROM portfolio WHERE status = ? ORDER BY sort_order LIMIT 3');
            $db->bind(['active']);
            $db->execute();
            $portfolios = $db->getAll();
            
            foreach ($portfolios as $portfolio):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <div class="portfolio-card position-relative overflow-hidden rounded-lg">
                    <img src="<?php echo SITE_URL; ?>/assets/images/portfolio-placeholder.jpg" alt="<?php echo escapeOutput($portfolio['title']); ?>" class="img-fluid w-100">
                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                        <div class="text-center text-white">
                            <h5 class="mb-3"><?php echo escapeOutput($portfolio['title']); ?></h5>
                            <p class="mb-3"><?php echo escapeOutput($portfolio['short_description']); ?></p>
                            <a href="<?php echo SITE_URL; ?>/portfolio#<?php echo $portfolio['slug']; ?>" class="btn btn-light btn-sm">
                                View Project
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo SITE_URL; ?>/portfolio" class="btn btn-primary btn-lg">
                View All Projects
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">TESTIMONIALS</span>
            <h2 class="display-5 fw-bold">What Our Clients Say</h2>
        </div>
        <div class="row g-4">
            <?php
            // Fetch testimonials
            $db->prepare('SELECT * FROM testimonials WHERE status = ? ORDER BY sort_order LIMIT 3');
            $db->bind(['active']);
            $db->execute();
            $testimonials = $db->getAll();
            
            foreach ($testimonials as $testimonial):
            ?>
            <div class="col-md-4" data-aos="fade-up">
                <div class="testimonial-card card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="mb-3">
                            <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                            <i class="fas fa-star text-warning"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="card-text mb-4">"<?php echo escapeOutput($testimonial['message']); ?>"</p>
                        <div class="d-flex align-items-center">
                            <img src="<?php echo getGravatarURL($testimonial['client_name']); ?>" alt="<?php echo escapeOutput($testimonial['client_name']); ?>" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0"><?php echo escapeOutput($testimonial['client_name']); ?></h6>
                                <small class="text-muted"><?php echo escapeOutput($testimonial['client_designation']); ?> at <?php echo escapeOutput($testimonial['client_company']); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary mb-3">PRICING</span>
            <h2 class="display-5 fw-bold">Simple & Transparent Pricing</h2>
        </div>
        <div class="row g-4">
            <?php
            // Fetch pricing tiers
            $pricing_tiers = [
                ['name' => 'Starter', 'price' => 499, 'features' => ['5 Projects', 'Basic Support', 'Monthly Reports']],
                ['name' => 'Professional', 'price' => 999, 'features' => ['Unlimited Projects', 'Priority Support', 'Daily Reports']],
                ['name' => 'Enterprise', 'price' => 2499, 'features' => ['Dedicated Team', '24/7 Support', 'Custom Solutions']]
            ];
            
            foreach ($pricing_tiers as $index => $tier):
            ?>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="pricing-card card h-100 border-0 shadow-sm <?php echo $index === 1 ? 'border-primary border-3' : ''; ?>">
                    <div class="card-body">
                        <h5 class="card-title mb-3"><?php echo $tier['name']; ?></h5>
                        <div class="pricing-value mb-4">
                            <span class="h1 fw-bold">₹<?php echo $tier['price']; ?></span>
                            <span class="text-muted">/month</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <?php foreach ($tier['features'] as $feature): ?>
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

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Ready to Grow Your Business?</h2>
        <p class="lead mb-4">Let's work together to achieve your digital goals</p>
        <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-light btn-lg px-5">
            <i class="fas fa-envelope me-2"></i> Get in Touch
        </a>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
