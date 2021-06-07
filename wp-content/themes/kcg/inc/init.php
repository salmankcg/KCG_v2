<?php 
require KCG_THEMEROOT_DIR . '/inc/template-tags.php';
require KCG_THEMEROOT_DIR . '/inc/template-functions.php';
//require KCG_THEMEROOT_DIR . '/inc/custom-post.php';
require KCG_THEMEROOT_DIR . '/inc/helper.php';
require KCG_THEMEROOT_DIR . '/inc/classes/comment_walker.php';
require KCG_THEMEROOT_DIR . '/inc/classes/main-nav-walker.php';
//require KCG_THEMEROOT_DIR . '/inc/classes/team-metabox.php';
require KCG_THEMEROOT_DIR . '/inc/theme_enqueue.php';
require KCG_THEMEROOT_DIR . '/inc/admin_enqueue.php';
require KCG_THEMEROOT_DIR . '/inc/widgets/kcg-navbar.php';
require KCG_THEMEROOT_DIR . '/inc/widgets/kcg-navbar-mobile.php';
require KCG_THEMEROOT_DIR . '/inc/posttypes/class-post-types.php';
require KCG_THEMEROOT_DIR . '/inc/posttypes/posttypes.php';
require KCG_THEMEROOT_DIR . '/inc/metabox/metabox.php';
require KCG_THEMEROOT_DIR . '/inc/metabox/portfolio-meta.php';
require KCG_THEMEROOT_DIR . '/inc/metabox/journal-meta.php';
require KCG_THEMEROOT_DIR . '/inc/metabox/team-meta.php';
require KCG_THEMEROOT_DIR . '/inc/portfolio-helper.php';
require KCG_THEMEROOT_DIR . '/inc/journal-helper.php';
require KCG_THEMEROOT_DIR . '/inc/metabox/testimonial-meta.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require KCG_THEMEROOT_DIR . '/inc/jetpack.php';
}