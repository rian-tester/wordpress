<?php
/**
 * Education Helper Theme Functions
 * 
 * This file contains all the theme functionality and admin customization options
 */

// Theme setup
function education_helper_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'education-helper'),
    ));
}
add_action('after_setup_theme', 'education_helper_setup');

// Enqueue styles and scripts
function education_helper_scripts() {
    wp_enqueue_style('education-helper-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_enqueue_script('education-helper-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'education_helper_scripts');

// Custom theme options for admin
function education_helper_customize_register($wp_customize) {
    
    // Homepage Settings Section
    $wp_customize->add_section('homepage_settings', array(
        'title' => __('Homepage Settings', 'education-helper'),
        'priority' => 30,
    ));
    
    // Hero Section
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Empowering Education for Everyone',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'education-helper'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'We provide comprehensive educational support and resources to help students achieve their academic goals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'education-helper'),
        'section' => 'homepage_settings',
        'type' => 'textarea',
    ));
    
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'Get Started Today',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Hero Button Text', 'education-helper'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_button_link', array(
        'default' => '#services',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('hero_button_link', array(
        'label' => __('Hero Button Link', 'education-helper'),
        'section' => 'homepage_settings',
        'type' => 'url',
    ));
    
    // Services Section
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("service_{$i}_icon", array(
            'default' => 'fas fa-graduation-cap',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("service_{$i}_icon", array(
            'label' => __("Service {$i} Icon (Font Awesome class)", 'education-helper'),
            'section' => 'homepage_settings',
            'type' => 'text',
        ));
        
        $wp_customize->add_setting("service_{$i}_title", array(
            'default' => "Service {$i}",
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control("service_{$i}_title", array(
            'label' => __("Service {$i} Title", 'education-helper'),
            'section' => 'homepage_settings',
            'type' => 'text',
        ));
        
        $wp_customize->add_setting("service_{$i}_description", array(
            'default' => "Description for service {$i}",
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        
        $wp_customize->add_control("service_{$i}_description", array(
            'label' => __("Service {$i} Description", 'education-helper'),
            'section' => 'homepage_settings',
            'type' => 'textarea',
        ));
    }
    
    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title' => __('Contact Information', 'education-helper'),
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone Number', 'education-helper'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@educationhelper.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email Address', 'education-helper'),
        'section' => 'contact_info',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => '123 Education Street, Learning City, LC 12345',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Address', 'education-helper'),
        'section' => 'contact_info',
        'type' => 'textarea',
    ));
    
    // Color Settings
    $wp_customize->add_section('color_settings', array(
        'title' => __('Theme Colors', 'education-helper'),
        'priority' => 40,
    ));
    
    $wp_customize->add_setting('primary_color', array(
        'default' => '#667eea',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'education-helper'),
        'section' => 'color_settings',
    )));
    
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#ff6b6b',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Secondary Color', 'education-helper'),
        'section' => 'color_settings',
    )));
}
add_action('customize_register', 'education_helper_customize_register');

// Output custom CSS for theme colors
function education_helper_customize_css() {
    $primary_color = get_theme_mod('primary_color', '#667eea');
    $secondary_color = get_theme_mod('secondary_color', '#ff6b6b');
    
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr($primary_color); ?>;
            --secondary-color: <?php echo esc_attr($secondary_color); ?>;
        }
        
        .site-header {
            background: linear-gradient(135deg, <?php echo esc_attr($primary_color); ?> 0%, #764ba2 100%);
        }
        
        .cta-button {
            background: <?php echo esc_attr($secondary_color); ?>;
        }
        
        .service-icon {
            color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .submit-button {
            background: <?php echo esc_attr($primary_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'education_helper_customize_css');

// Create default pages on theme activation
function education_helper_create_pages() {
    $pages = array(
        'Home' => array(
            'content' => '[homepage_content]',
            'template' => 'page-home.php'
        ),
        'About' => array(
            'content' => 'Learn more about our mission to support education and help students succeed.',
            'template' => 'page-about.php'
        ),
        'Services' => array(
            'content' => 'Discover our comprehensive range of educational support services.',
            'template' => 'page-services.php'
        ),
        'Contact' => array(
            'content' => 'Get in touch with us for any questions or to learn more about our services.',
            'template' => 'page-contact.php'
        )
    );
    
    foreach ($pages as $title => $page_data) {
        $page_check = get_page_by_title($title);
        if (!$page_check) {
            $page_id = wp_insert_post(array(
                'post_title' => $title,
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
            ));
            
            if ($title === 'Home') {
                update_option('page_on_front', $page_id);
                update_option('show_on_front', 'page');
            }
        }
    }
}

// Simple admin menu cleanup
function education_helper_admin_menu() {
    // Remove unnecessary menu items for non-technical admins
    if (!current_user_can('manage_options')) {
        remove_menu_page('tools.php');
        remove_menu_page('edit-comments.php');
    }
}
add_action('admin_menu', 'education_helper_admin_menu');

// Add custom admin dashboard widget
function education_helper_dashboard_widget() {
    wp_add_dashboard_widget(
        'education_helper_widget',
        'Education Helper Theme',
        'education_helper_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'education_helper_dashboard_widget');

function education_helper_dashboard_widget_content() {
    echo '<p>Welcome to your Education Helper website! Use the <a href="' . admin_url('customize.php') . '">Customizer</a> to easily modify your site content and colors.</p>';
    echo '<ul>';
    echo '<li><a href="' . admin_url('customize.php?autofocus[section]=homepage_settings') . '">Edit Homepage Content</a></li>';
    echo '<li><a href="' . admin_url('customize.php?autofocus[section]=contact_info') . '">Update Contact Information</a></li>';
    echo '<li><a href="' . admin_url('customize.php?autofocus[section]=color_settings') . '">Change Theme Colors</a></li>';
    echo '</ul>';
}

// Include admin helper functions
require_once get_template_directory() . '/admin-helper.php';
?>
