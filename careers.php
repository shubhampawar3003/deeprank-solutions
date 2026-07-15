<?php
/**
 * Careers Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'Careers - Deeprank Solutions';
$page_description = 'Join our team at Deeprank Solutions. We are hiring talented developers, designers, and marketers.';
$page_keywords = 'careers, jobs, hiring, employment';
$page_url = SITE_URL . '/careers';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Join Our Team</h1>
        <p class="lead text-muted">Exciting career opportunities at Deeprank Solutions</p>
    </div>
</section>

<!-- Open Positions -->
<section class="py-5">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">Open Positions</h2>
        <div class="row">
            <?php
            $db->prepare('SELECT * FROM careers WHERE status = ? ORDER BY created_at DESC');
            $db->bind(['open']);
            $db->execute();
            $careers = $db->getAll();
            
            if (!empty($careers)):
                foreach ($careers as $career):
            ?>
            <div class="col-md-6 mb-4" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo escapeOutput($career['position_title']); ?></h5>
                        <div class="d-flex gap-2 mb-3">
                            <span class="badge bg-primary"><?php echo $career['employment_type']; ?></span>
                            <span class="badge bg-secondary"><?php echo $career['location']; ?></span>
                        </div>
                        <p class="card-text text-muted"><?php echo escapeOutput($career['description']); ?></p>
                        <h6 class="mt-3">Requirements:</h6>
                        <p class="card-text small text-muted"><?php echo escapeOutput($career['requirements']); ?></p>
                        <a href="<?php echo SITE_URL; ?>/careers?apply=<?php echo $career['slug']; ?>" class="btn btn-primary">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
            <?php 
                endforeach;
            else:
            ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No open positions at the moment. Check back soon!</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Why Join Us -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="display-5 fw-bold text-center mb-5">Why Join Deeprank?</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="text-center">
                    <i class="fas fa-briefcase fa-3x text-primary mb-3"></i>
                    <h5>Career Growth</h5>
                    <p class="text-muted">Continuous learning and professional development opportunities</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5>Great Team</h5>
                    <p class="text-muted">Work with talented professionals who are passionate about excellence</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <i class="fas fa-star fa-3x text-primary mb-3"></i>
                    <h5>Best Benefits</h5>
                    <p class="text-muted">Competitive salaries, health insurance, and flexible work arrangements</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
