<?php
/**
 * Terms & Conditions Page
 */
require_once 'includes/config.php';

$page_title = 'Terms & Conditions - Deeprank Solutions';
$page_description = 'Read our terms and conditions for using Deeprank Solutions services.';
include 'includes/header.php';
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Terms & Conditions</h1>
                <p class="text-muted mb-4">Last Updated: <?php echo date('F d, Y'); ?></p>
                
                <h3 class="mt-5 mb-3">1. Agreement to Terms</h3>
                <p>By accessing and using Deeprank Solutions website and services, you accept and agree to be bound by the terms and provision of this agreement.</p>
                
                <h3 class="mt-5 mb-3">2. Use License</h3>
                <p>Permission is granted to temporarily download one copy of the materials (information or software) on Deeprank Solutions website for personal, non-commercial transitory viewing only.</p>
                
                <h3 class="mt-5 mb-3">3. Disclaimer</h3>
                <p>The materials on Deeprank Solutions website are provided on an 'as is' basis. Deeprank Solutions makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
                
                <h3 class="mt-5 mb-3">4. Limitations</h3>
                <p>In no event shall Deeprank Solutions or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Deeprank Solutions website.</p>
                
                <h3 class="mt-5 mb-3">5. Accuracy of Materials</h3>
                <p>The materials appearing on Deeprank Solutions website could include technical, typographical, or photographic errors. Deeprank Solutions does not warrant that any of the materials on its website are accurate, complete, or current.</p>
                
                <h3 class="mt-5 mb-3">6. Modifications</h3>
                <p>Deeprank Solutions may revise these terms of use for its website at any time without notice. By using this website, you are agreeing to be bound by the then current version of these terms of use.</p>
                
                <h3 class="mt-5 mb-3">7. Governing Law</h3>
                <p>These terms and conditions are governed by and construed in accordance with the laws of India, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
                
                <h3 class="mt-5 mb-3">8. Contact Information</h3>
                <p>If you have any questions about these terms and conditions, please contact us at <?php echo getSetting('site_email'); ?>.</p>
            </div>
        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
