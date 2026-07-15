<?php
/**
 * About Us Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'About Us - Deeprank Solutions';
$page_description = 'Learn about Deeprank Solutions - our mission, values, team, and 15+ years of experience.';
$page_keywords = 'about us, digital agency, team, experience';
$page_url = SITE_URL . '/about';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">About Deeprank Solutions</h1>
                <p class="lead text-muted mb-4">We are a team of passionate digital experts dedicated to transforming your business through innovative technology and creative solutions.</p>
            </div>
            <div class="col-lg-6">
                <img src="<?php echo SITE_URL; ?>/assets/images/about-banner.jpg" alt="About Us" class="img-fluid rounded-lg">
            </div>
        </div>
    </div>
</section>

<!-- Company Story -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="<?php echo SITE_URL; ?>/assets/images/company-story.jpg" alt="Our Story" class="img-fluid rounded-lg">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="display-5 fw-bold mb-4">Our Journey</h2>
                <p class="mb-3">Founded in 2010, Deeprank Solutions began with a simple vision: to help businesses succeed in the digital world. What started as a small team of 5 developers has grown into a thriving agency with 50+ dedicated professionals.</p>
                <p class="mb-3">Over the years, we've completed 500+ projects for clients ranging from startups to Fortune 500 companies. Our expertise spans digital marketing, web development, mobile applications, and enterprise software solutions.</p>
                <p>Today, Deeprank Solutions is recognized as one of the leading digital agencies in Asia, with a commitment to excellence, innovation, and client success.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">Our Mission & Values</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Mission</h5>
                        <p class="card-text">To empower businesses with cutting-edge digital solutions that drive growth, innovation, and lasting success.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-heart fa-3x text-danger mb-3"></i>
                        <h5 class="card-title">Excellence</h5>
                        <p class="card-text">We are committed to delivering the highest quality solutions with attention to every detail.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-handshake fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Partnership</h5>
                        <p class="card-text">We view our clients as partners and work collaboratively to achieve shared goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">Our Team</h2>
        <div class="row g-4">
            <?php
            $db->prepare('SELECT * FROM team WHERE status = ? ORDER BY sort_order');
            $db->bind(['active']);
            $db->execute();
            $team = $db->getAll();
            
            foreach ($team as $member):
            ?>
            <div class="col-md-4" data-aos="fade-up">
                <div class="team-card card h-100 border-0 shadow-sm">
                    <img src="<?php echo getGravatarURL($member['name']); ?>" class="card-img-top" alt="<?php echo escapeOutput($member['name']); ?>" height="300">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo escapeOutput($member['name']); ?></h5>
                        <p class="text-primary fw-bold"><?php echo escapeOutput($member['designation']); ?></p>
                        <p class="card-text text-muted"><?php echo escapeOutput($member['bio']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
