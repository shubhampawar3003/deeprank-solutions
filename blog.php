<?php
/**
 * Blog Listing Page
 */
require_once 'includes/config.php';
require_once 'includes/db-connection.php';
require_once 'includes/security.php';
require_once 'includes/functions.php';

$db = new Database();
$page_title = 'Blog - Deeprank Solutions';
$page_description = 'Read our latest blog posts on digital marketing, SEO, web development, and technology.';
$page_keywords = 'blog, articles, tutorials, digital marketing';
$page_url = SITE_URL . '/blog';

include 'includes/header.php';
?>

<!-- Hero Banner -->
<section class="py-5 bg-light">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Our Blog</h1>
        <p class="lead text-muted">Latest insights on digital marketing, web development, and technology trends</p>
    </div>
</section>

<!-- Blog Posts -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <?php
            $db->prepare('SELECT * FROM blogs WHERE status = ? ORDER BY published_at DESC');
            $db->bind(['published']);
            $db->execute();
            $blogs = $db->getAll();
            
            if (!empty($blogs)):
                foreach ($blogs as $blog):
            ?>
            <div class="col-md-6 col-lg-4" data-aos="fade-up">
                <article class="blog-card card h-100 border-0 shadow-sm">
                    <img src="<?php echo SITE_URL; ?>/assets/images/blog-placeholder.jpg" class="card-img-top" alt="<?php echo escapeOutput($blog['title']); ?>" height="250">
                    <div class="card-body">
                        <small class="text-muted"><?php echo formatDate($blog['published_at']); ?> • <?php echo getReadingTime($blog['content']); ?> min read</small>
                        <h5 class="card-title mt-2"><?php echo escapeOutput($blog['title']); ?></h5>
                        <p class="card-text text-muted"><?php echo truncateText($blog['excerpt'], 100); ?></p>
                        <a href="<?php echo SITE_URL; ?>/blog-single?id=<?php echo $blog['id']; ?>" class="btn btn-link p-0">
                            Read More →
                        </a>
                    </div>
                </article>
            </div>
            <?php 
                endforeach;
            else:
            ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted">No blog posts found.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
