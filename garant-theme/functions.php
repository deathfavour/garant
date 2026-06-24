<?php
/**
 * Garant Marine Group — Theme Functions
 */

// ── Theme setup ──────────────────────────────────────────────
function garant_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    register_nav_menus( [ 'primary' => __( 'Primary Menu', 'garant' ) ] );
}
add_action( 'after_setup_theme', 'garant_setup' );

// ── Enqueue scripts & styles ─────────────────────────────────
function garant_enqueue() {
    wp_enqueue_style( 'material-symbols',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0',
        [], null );

    wp_enqueue_style( 'garant-style', get_stylesheet_uri(), [ 'material-symbols' ], '1.0.0' );

    wp_enqueue_script( 'garant-main',
        get_template_directory_uri() . '/js/main.js',
        [], '1.0.0', true );

    // reCAPTCHA v3 — add RECAPTCHA_SITE_KEY to wp-config.php
    if ( defined( 'RECAPTCHA_SITE_KEY' ) && RECAPTCHA_SITE_KEY ) {
        wp_enqueue_script( 'recaptcha',
            'https://www.google.com/recaptcha/api.js?render=' . RECAPTCHA_SITE_KEY,
            [], null, true );
        wp_add_inline_script( 'recaptcha', garant_recaptcha_inline() );
    }

    // Pass AJAX URL to JS
    wp_localize_script( 'garant-main', 'garantData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'homeUrl' => home_url( '/' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'garant_enqueue' );

function garant_recaptcha_inline() {
    if ( ! defined( 'RECAPTCHA_SITE_KEY' ) ) return '';
    $key = esc_js( RECAPTCHA_SITE_KEY );
    return "
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('form[data-garant-form]').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      var f = this;
      if (f.querySelector('[name=\"g-recaptcha-response\"]')) return;
      e.preventDefault();
      grecaptcha.ready(function() {
        grecaptcha.execute('{$key}', {action:'submit'}).then(function(token) {
          var inp = document.createElement('input');
          inp.type = 'hidden'; inp.name = 'g-recaptcha-response'; inp.value = token;
          f.appendChild(inp); f.submit();
        });
      });
    });
  });
});";
}

// ── SEO — Open Graph + Twitter + JSON-LD ─────────────────────
function garant_seo_head() {
    $title       = wp_get_document_title();
    $description = get_bloginfo( 'description' );
    $url         = ( is_singular() ) ? get_permalink() : home_url( add_query_arg( [] ) );
    $image       = get_template_directory_uri() . '/pictures/home1.png';

    if ( is_singular() && has_post_thumbnail() ) {
        $image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
    }

    // Per-page descriptions
    if ( is_page( 'for-seafarers' ) ) {
        $description = 'Career opportunities for seafarers — employment assistance, career development, CV registration and consulting from Garant Marine Group LLC.';
    } elseif ( is_page( 'for-clients' ) ) {
        $description = 'Professional crew recruitment and full crew management for shipowners. LNG, LPG and tanker crew supply specialists.';
    } elseif ( is_page( 'about-us' ) ) {
        $description = 'Building long-term partnerships and reliable maritime solutions. Learn about our story, mission and values.';
    } elseif ( is_page( 'contact' ) ) {
        $description = 'Get in touch with Garant Marine Group LLC. We are here to support you with reliable crewing solutions.';
    }

    echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
    echo '<meta property="og:type"        content="website" />' . "\n";
    echo '<meta property="og:url"         content="' . esc_url( $url ) . '" />' . "\n";
    echo '<meta property="og:title"       content="' . esc_attr( $title ) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
    echo '<meta property="og:image"       content="' . esc_url( $image ) . '" />' . "\n";
    echo '<meta property="og:site_name"   content="Garant Marine Group LLC" />' . "\n";
    echo '<meta name="twitter:card"        content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title"       content="' . esc_attr( $title ) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr( $description ) . '" />' . "\n";
    echo '<meta name="twitter:image"       content="' . esc_url( $image ) . '" />' . "\n";
    echo '<link rel="canonical" href="' . esc_url( $url ) . '" />' . "\n";
}
add_action( 'wp_head', 'garant_seo_head', 1 );

// ── JSON-LD Structured Data ───────────────────────────────────
function garant_structured_data() {
    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'Organization',
        'name'     => 'Garant Marine Group LLC',
        'url'      => home_url( '/' ),
        'logo'     => get_template_directory_uri() . '/pictures/logo white.png',
        'telephone' => '+359888285528',
        'email'     => 'info@garantmarinegroup.com',
        'address'   => [
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Varna',
            'addressCountry'  => 'BG',
        ],
        'sameAs' => [
            'https://www.linkedin.com/in/garant-marine-group-5961413b5',
            'https://t.me/Garan_Marine_Group_LLC',
            'https://wa.me/message/TAAPY7XJJZE2J1',
        ],
    ];
    echo '<script type="application/ld+json">'
        . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
        . '</script>' . "\n";
}
add_action( 'wp_head', 'garant_structured_data' );

// ── Form processing (init hook) ───────────────────────────────
function garant_process_forms() {
    if ( empty( $_POST['garant_action'] ) ) return;

    $action = sanitize_key( $_POST['garant_action'] );

    // Verify nonce
    if ( ! wp_verify_nonce( $_POST['_wpnonce'] ?? '', 'garant_form_' . $action ) ) {
        wp_safe_redirect( add_query_arg( 'form_error', '1', wp_get_referer() ) );
        exit;
    }

    // Verify reCAPTCHA if configured
    if ( defined( 'RECAPTCHA_SECRET_KEY' ) && ! empty( $_POST['g-recaptcha-response'] ) ) {
        $verify = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify', [
            'body' => [
                'secret'   => RECAPTCHA_SECRET_KEY,
                'response' => sanitize_text_field( $_POST['g-recaptcha-response'] ),
            ],
        ] );
        $result = json_decode( wp_remote_retrieve_body( $verify ), true );
        if ( empty( $result['success'] ) || ( $result['score'] ?? 1 ) < 0.5 ) {
            wp_safe_redirect( add_query_arg( 'form_error', '2', wp_get_referer() ) );
            exit;
        }
    }

    $to      = get_option( 'admin_email' );
    $sent    = false;

    switch ( $action ) {

        case 'seafarers':
            $name        = sanitize_text_field( $_POST['name'] ?? '' );
            $phone       = sanitize_text_field( $_POST['phone'] ?? '' );
            $rank        = sanitize_text_field( $_POST['rank'] ?? '' );
            $email       = sanitize_email( $_POST['email'] ?? '' );
            $dob         = sanitize_text_field( $_POST['dob'] ?? '' );
            $nationality = sanitize_text_field( $_POST['nationality'] ?? '' );
            $info        = sanitize_textarea_field( $_POST['info'] ?? '' );

            if ( ! $name || ! $email ) break;

            $subject = "Seafarer Application — $name";
            $body    = "New application from For Seafarers page:\n\n"
                . "Name: $name\nPhone: $phone\nRank: $rank\nEmail: $email\n"
                . "DOB: $dob\nNationality: $nationality\n\nAdditional Info:\n$info";

            // Handle CV upload
            if ( ! empty( $_FILES['cv']['name'] ) ) {
                require_once ABSPATH . 'wp-admin/includes/file.php';
                $upload = wp_handle_upload( $_FILES['cv'], [ 'test_form' => false ] );
                if ( isset( $upload['url'] ) ) {
                    $body .= "\n\nCV: " . $upload['url'];
                }
            }

            $sent = wp_mail( $to, $subject, $body,
                [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $name <$email>" ] );
            break;

        case 'clients':
            $company = sanitize_text_field( $_POST['company'] ?? '' );
            $contact = sanitize_text_field( $_POST['contact'] ?? '' );
            $email   = sanitize_email( $_POST['email'] ?? '' );
            $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
            $vessel  = sanitize_text_field( $_POST['vessel'] ?? '' );
            $country = sanitize_text_field( $_POST['country'] ?? '' );
            $msg     = sanitize_textarea_field( $_POST['message'] ?? '' );

            if ( ! $company || ! $email ) break;

            $subject = "Client Inquiry — $company";
            $body    = "New inquiry from For Clients page:\n\n"
                . "Company: $company\nContact: $contact\nEmail: $email\nPhone: $phone\n"
                . "Vessel Type: $vessel\nCountry: $country\n\nMessage:\n$msg";

            $sent = wp_mail( $to, $subject, $body,
                [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $contact <$email>" ] );
            break;

        case 'contact':
            $name    = sanitize_text_field( $_POST['name'] ?? '' );
            $email   = sanitize_email( $_POST['email'] ?? '' );
            $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
            $subject = sanitize_text_field( $_POST['subject'] ?? 'Website Contact' );
            $msg     = sanitize_textarea_field( $_POST['message'] ?? '' );

            if ( ! $name || ! $email ) break;

            $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$msg";
            $sent = wp_mail( $to, $subject, $body,
                [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $name <$email>" ] );
            break;

        case 'home':
            $name  = sanitize_text_field( $_POST['name'] ?? '' );
            $firm  = sanitize_text_field( $_POST['firm'] ?? '' );
            $email = sanitize_email( $_POST['email'] ?? '' );
            $msg   = sanitize_textarea_field( $_POST['message'] ?? '' );

            if ( ! $name || ! $email ) break;

            $subject = "Website Inquiry — $name" . ( $firm ? " ($firm)" : '' );
            $body    = "Name: $name\nFirm: $firm\nEmail: $email\n\nMessage:\n$msg";
            $sent    = wp_mail( $to, $subject, $body,
                [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $name <$email>" ] );
            break;
    }

    $param = $sent ? 'form_sent' : 'form_error';
    wp_safe_redirect( add_query_arg( $param, '1', wp_get_referer() ) );
    exit;
}
add_action( 'init', 'garant_process_forms' );

// ── Helper: form nonce field ──────────────────────────────────
function garant_nonce( $action ) {
    wp_nonce_field( 'garant_form_' . $action );
    echo '<input type="hidden" name="garant_action" value="' . esc_attr( $action ) . '" />' . "\n";
}

// ── Helper: form feedback messages ───────────────────────────
function garant_form_messages() {
    if ( ! empty( $_GET['form_sent'] ) ) {
        echo '<div class="form-success">Thank you! Your message has been sent. We will get back to you shortly.</div>';
    } elseif ( ! empty( $_GET['form_error'] ) ) {
        echo '<div class="form-error">Something went wrong. Please try again or contact us directly at info@garantmarinegroup.com</div>';
    }
}

// ── Remove default WP meta that conflicts with SEO ──────────
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
