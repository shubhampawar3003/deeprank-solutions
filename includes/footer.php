<?php
/**
 * Footer Template
 * 
 * Main footer with links, contact info, and newsletter subscription
 * 
 * @author Deeprank Solutions
 * @version 1.0.0
 */
?>
</main>

<!-- Footer -->
<footer class="footer bg-dark text-white mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-md-3">
                <h5 class="mb-4">
                    <img src="<?php echo SITE_URL; ?>/assets/images/logo-white.png" alt="Deeprank" style="max-height: 40px;">
                </h5>
                <p class="text-muted">We are a leading digital agency providing comprehensive digital solutions.</p>
                <div class="social-links mt-3">
                    <?php 
                    $social_links = getSetting('social_links') ?? [];
                    if (!empty($social_links)): 
                    ?>
                        <?php if (isset($social_links['facebook'])): ?>
                        <a href="<?php echo $social_links['facebook']; ?>" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <?php endif; ?>
                        
                        <?php if (isset($social_links['twitter'])): ?>
                        <a href="<?php echo $social_links['twitter']; ?>" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        
                        <?php if (isset($social_links['linkedin'])): ?>
                        <a href="<?php echo $social_links['linkedin']; ?>" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                        
                        <?php if (isset($social_links['instagram'])): ?>
                        <a href="<?php echo $social_links['instagram']; ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-md-3">
                <h5 class="mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo SITE_URL; ?>/about" class="text-muted">About Us</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services" class="text-muted">Services</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/portfolio" class="text-muted">Portfolio</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/blog" class="text-muted">Blog</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/careers" class="text-muted">Careers</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div class="col-md-3">
                <h5 class="mb-4">Services</h5>
                <ul class="list-unstyled">
                    <li><a href="<?php echo SITE_URL; ?>/services" class="text-muted">SEO & Marketing</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services" class="text-muted">Web Development</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services" class="text-muted">Mobile Apps</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services" class="text-muted">CRM Solutions</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/services" class="text-muted">Cloud Services</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="col-md-3">
                <h5 class="mb-4">Contact Us</h5>
                <p class="text-muted">
                    <i class="fas fa-map-marker-alt"></i> 
                    <?php echo getSetting('address') ?? 'Your Address'; ?>
                </p>
                <p class="text-muted">
                    <i class="fas fa-phone"></i> 
                    <a href="tel:<?php echo getSetting('phone_primary'); ?>" class="text-muted">
                        <?php echo getSetting('phone_primary'); ?>
                    </a>
                </p>
                <p class="text-muted">
                    <i class="fas fa-envelope"></i> 
                    <a href="mailto:<?php echo getSetting('site_email'); ?>" class="text-muted">
                        <?php echo getSetting('site_email'); ?>
                    </a>
                </p>
            </div>
        </div>
        
        <hr class="bg-secondary my-4">
        
        <!-- Newsletter Subscription -->
        <div class="row">
            <div class="col-md-6">
                <h5 class="mb-3">Subscribe to Newsletter</h5>
                <form id="newsletter-form" class="d-flex">
                    <input type="email" class="form-control" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary ms-2">Subscribe</button>
                </form>
            </div>
            
            <!-- Footer Bottom -->
            <div class="col-md-6 text-md-end">
                <ul class="list-unstyled list-inline">
                    <li class="list-inline-item">
                        <a href="<?php echo SITE_URL; ?>/privacy-policy" class="text-muted">Privacy Policy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo SITE_URL; ?>/terms-conditions" class="text-muted">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="bg-darker py-3">
        <div class="container text-center text-muted">
            <p class="mb-0">&copy; <?php echo date('Y'); ?> Deeprank Solutions. All rights reserved. | Designed & Developed with <i class="fas fa-heart text-danger"></i> by Deeprank Team</p>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scroll-to-top" class="btn btn-primary" title="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="<?php echo SITE_URL; ?>/assets/js/bootstrap.bundle.min.js"></script>

<!-- AOS (Animate On Scroll) -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!-- Custom JS -->
<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/animations.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/dark-mode.js"></script>
<script src="<?php echo SITE_URL; ?>/assets/js/form-validation.js"></script>

</body>
</html>
