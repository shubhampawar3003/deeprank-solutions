<?php
/**
 * Single Blog Post Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();

// Get blog post
$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$blog_id) {
    redirect(SITE_URL . '/blog');
}

$db->prepare('SELECT * FROM blogs WHERE id = ? AND status = ?');
$db->bind([$blog_id, 'published']);
$db->execute();
$blog = $db->getRow();

if (!$blog) {
    redirect(SITE_URL . '/blog');
}

// Update views
$db->prepare('UPDATE blogs SET views = views + 1 WHERE id = ?');
$db->bind([$blog_id]);
$db->execute();

// SEO Meta
$page_title = $blog['meta_title'] ?? $blog['title'];
$page_description = $blog['meta_description'] ?? truncateText($blog['excerpt'], 160);
$page_keywords = $blog['meta_keywords'] ?? '';
$page_url = SITE_URL . '/blog-single?id=' . $blog_id;
$page_image = SITE_URL . '/assets/images/blog-placeholder.jpg';

include 'includes/header.php';
?>

<!-- Blog Header -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <small class="text-muted"><?php echo formatDate($blog['published_at']); ?> • <?php echo getReadingTime($blog['content']); ?> min read</small>
                <h1 class="display-4 fw-bold mt-3"><?php echo escapeOutput($blog['title']); ?></h1>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="blog-content">
                    <img src="<?php echo SITE_URL; ?>/assets/images/blog-placeholder.jpg" alt="<?php echo escapeOutput($blog['title']); ?>" class="img-fluid mb-5 rounded-lg">
                    <div class="blog-body">
                        <?php echo $blog['content']; ?>
                    </div>
                </article>
                
                <!-- Share Buttons -->
                <div class="mt-5 pt-5 border-top">
                    <h5 class="mb-4">Share this article:</h5>
                    <div class="d-flex gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($page_url); ?>" class="btn btn-outline-primary" target="_blank">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($page_url); ?>&text=<?php echo urlencode($page_title); ?>" class="btn btn-outline-info" target="_blank">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($page_url); ?>" class="btn btn-outline-secondary" target="_blank">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
