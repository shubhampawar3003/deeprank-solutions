<?php
/**
 * Portfolio Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'Portfolio - Deeprank Solutions';
$page_description = 'View our latest projects and portfolio work across various industries and technologies.';
$page_keywords = 'portfolio, projects, case studies, web development';
$page_url = SITE_URL . '/portfolio';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Our Portfolio</h1>
        <p class="lead text-muted">Showcasing our best work and successful projects</p>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            $db->prepare('SELECT * FROM portfolio WHERE status = ? ORDER BY sort_order');
            $db->bind(['active']);
            $db->execute();
            $portfolios = $db->getAll();
            
            foreach ($portfolios as $portfolio):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up" id="<?php echo $portfolio['slug']; ?>">
                <div class="portfolio-card position-relative overflow-hidden rounded-lg" style="height: 300px;">
                    <img src="<?php echo SITE_URL; ?>/assets/images/portfolio-placeholder.jpg" alt="<?php echo escapeOutput($portfolio['title']); ?>" class="img-fluid w-100 h-100 object-fit-cover">
                    <div class="portfolio-overlay d-flex align-items-center justify-content-center">
                        <div class="text-center text-white">
                            <h5 class="mb-3"><?php echo escapeOutput($portfolio['title']); ?></h5>
                            <p class="mb-3 small"><?php echo escapeOutput($portfolio['short_description']); ?></p>
                            <small class="text-muted d-block mb-3">Tech: <?php echo escapeOutput($portfolio['technology_used']); ?></small>
                            <?php if ($portfolio['project_url']): ?>
                            <a href="<?php echo $portfolio['project_url']; ?>" class="btn btn-light btn-sm" target="_blank">
                                View Project
                            </a>
                            <?php endif; ?>
                        </div>
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
