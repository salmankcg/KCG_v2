<?php 

function kcg_scripts() {

	wp_enqueue_style( 'kcg-style', get_stylesheet_uri(), array(), KCG_VERSION );
	wp_enqueue_style( 'kcg-bootstrap-grid', KCG_CSS . '/bootstrap-grid.min.css', array( 'kcg-style' ), KCG_VERSION );
	wp_enqueue_style( 'kcg-main', KCG_CSS . '/main.css', array( 'kcg-style' ), KCG_VERSION );
	
	wp_enqueue_script( 'kcg-portfolio', KCG_JS . '/ajax-portfolio.js', array('jquery'), KCG_VERSION, true );
	wp_enqueue_script( 'kcg-journal', KCG_JS . '/ajax-journal.js', array('jquery'), KCG_VERSION, true );
	wp_enqueue_script( 'kcg-main', KCG_JS . '/main.js', array('jquery'), KCG_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$localized_settings = [
		'ajax_url'  => admin_url( 'admin-ajax.php' ),
		'kcg_nonce'  => wp_create_nonce('kcg-nonce'),
	];
	wp_localize_script(
		'kcg-portfolio',
		'kcgPortfolio',
		$localized_settings
	);
	$localized_settings_journal = [
		'ajax_url'  => admin_url( 'admin-ajax.php' ),
		'kcg_nonce'  => wp_create_nonce('kcg-nonce'),
	];
	wp_localize_script(
		'kcg-journal',
		'kcgJournal',
		$localized_settings_journal
	);
}
add_action( 'wp_enqueue_scripts', 'kcg_scripts' );
