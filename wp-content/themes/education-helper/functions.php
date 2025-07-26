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
    echo '<p>Welcome to the Education Helper theme! Use the <strong>Content Manager</strong> in the admin menu to easily update your website content.</p>';
    echo '<p><a href="' . admin_url('admin.php?page=content-manager') . '" class="button button-primary">Manage Content</a></p>';
}

// ==============================================
// CUSTOM CONTENT MANAGEMENT SYSTEM
// ==============================================

// Add "Content" menu to admin toolbar
function education_helper_admin_toolbar($wp_admin_bar) {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    $wp_admin_bar->add_node(array(
        'id' => 'content_manager',
        'title' => '<span class="ab-icon dashicons dashicons-edit-page"></span>Content',
        'href' => admin_url('admin.php?page=content-manager'),
        'meta' => array(
            'title' => 'Manage Website Content'
        )
    ));
}
add_action('admin_bar_menu', 'education_helper_admin_toolbar', 100);

// Add admin menu page for content management
function education_helper_content_manager_menu() {
    add_menu_page(
        'Content Manager',
        'Content Manager',
        'manage_options',
        'content-manager',
        'education_helper_content_manager_page',
        'dashicons-edit-page',
        25
    );
}
add_action('admin_menu', 'education_helper_content_manager_menu');

// Handle AJAX requests for saving content
function education_helper_save_content() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'content_manager_nonce')) {
        wp_die('Security check failed');
    }
    
    if (!current_user_can('manage_options')) {
        wp_die('Insufficient permissions');
    }
    
    $section = sanitize_text_field($_POST['section']);
    $content_data = $_POST['content_data'];
    
    // Sanitize all content data
    $sanitized_data = array();
    foreach ($content_data as $key => $value) {
        if (strpos($key, '_image') !== false) {
            $sanitized_data[$key] = esc_url_raw($value);
        } else {
            $sanitized_data[$key] = wp_kses_post($value);
        }
    }
    
    // Save content to WordPress options
    update_option("eh_content_{$section}", $sanitized_data);
    
    wp_send_json_success('Content saved successfully!');
}
add_action('wp_ajax_save_content', 'education_helper_save_content');

// Get content with defaults
function education_helper_get_content($section, $key, $default = '') {
    $content = get_option("eh_content_{$section}", array());
    return isset($content[$key]) ? $content[$key] : $default;
}

// Content Manager Admin Page
function education_helper_content_manager_page() {
    // Enqueue WordPress media uploader
    wp_enqueue_media();
    ?>
    <div class="wrap">
        <h1><span class="dashicons dashicons-edit-page"></span> Content Manager</h1>
        <p>Easily manage all text and images on your website. Changes are saved automatically and applied immediately.</p>
        
        <div id="content-manager-tabs">
            <nav class="nav-tab-wrapper">
                <a href="#homepage" class="nav-tab nav-tab-active">Homepage</a>
                <a href="#about" class="nav-tab">About</a>
                <a href="#services" class="nav-tab">Services</a>
                <a href="#contact" class="nav-tab">Contact</a>
            </nav>
            
            <div id="homepage" class="tab-content active">
                <?php education_helper_homepage_content_form(); ?>
            </div>
            
            <div id="about" class="tab-content">
                <?php education_helper_about_content_form(); ?>
            </div>
            
            <div id="services" class="tab-content">
                <?php education_helper_services_content_form(); ?>
            </div>
            
            <div id="contact" class="tab-content">
                <?php education_helper_contact_content_form(); ?>
            </div>
        </div>
    </div>
    
    <style>
        .nav-tab-wrapper { margin-bottom: 20px; }
        .tab-content { display: none; background: white; padding: 20px; border: 1px solid #ccd0d4; }
        .tab-content.active { display: block; }
        .content-section { background: #f9f9f9; padding: 20px; margin: 20px 0; border-radius: 5px; }
        .content-section h3 { margin-top: 0; color: #333; }
        .form-table th { width: 150px; }
        .large-text { width: 100%; }
        .success-message { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 10px 0; }
        .error-message { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin: 10px 0; }
        .save-button { background: #0073aa; color: white; padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; }
        .save-button:hover { background: #005a87; }
        
        /* Image Upload Styles */
        .image-upload-container { border: 1px solid #ddd; padding: 15px; border-radius: 5px; background: #fafafa; }
        .image-preview img { display: block; margin-bottom: 10px; }
        .upload-image-button, .remove-image-button { margin-right: 10px; }
        .upload-image-button .dashicons, .remove-image-button .dashicons { font-size: 16px; width: 16px; height: 16px; }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // Tab switching
        $('.nav-tab').click(function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            
            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            
            $('.tab-content').removeClass('active');
            $(target).addClass('active');
        });
        
        // WordPress Media Uploader
        var mediaUploader;
        
        $('.upload-image-button').click(function(e) {
            e.preventDefault();
            var button = $(this);
            var target = button.data('target');
            var container = button.closest('.image-upload-container');
            var urlInput = container.find('input[name="' + target + '"]');
            var preview = container.find('.image-preview');
            
            // If the media frame already exists, reopen it
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            
            // Create a new media frame
            mediaUploader = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            
            // When an image is selected in the media frame
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                var imageUrl = attachment.url;
                
                // Update the input field
                urlInput.val(imageUrl);
                
                // Update the preview
                preview.html(
                    '<img src="' + imageUrl + '" alt="Image Preview" style="max-width: 300px; max-height: 200px; border-radius: 5px; border: 1px solid #ddd;">' +
                    '<p><small>Current image</small></p>'
                );
                
                // Show remove button if not already present
                if (!container.find('.remove-image-button').is(':visible')) {
                    container.find('.remove-image-button').show();
                }
                
                // Add remove button if it doesn't exist
                if (container.find('.remove-image-button').length === 0) {
                    button.after(
                        '<button type="button" class="button remove-image-button" data-target="' + target + '" style="margin-left: 10px;">' +
                        '<span class="dashicons dashicons-trash" style="vertical-align: middle;"></span>' +
                        'Remove Image' +
                        '</button>'
                    );
                }
            });
            
            // Open the media frame
            mediaUploader.open();
        });
        
        // Remove image functionality
        $(document).on('click', '.remove-image-button', function(e) {
            e.preventDefault();
            var button = $(this);
            var target = button.data('target');
            var container = button.closest('.image-upload-container');
            var urlInput = container.find('input[name="' + target + '"]');
            var preview = container.find('.image-preview');
            
            // Clear the input
            urlInput.val('');
            
            // Update preview to show placeholder
            preview.html(
                '<div style="width: 300px; height: 200px; background: #f0f0f0; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; border-radius: 5px;">' +
                '<span style="color: #666;">No image selected</span>' +
                '</div>'
            );
            
            // Hide remove button
            button.hide();
        });
        
        // Update preview when URL is manually entered
        $('.image-url-input').on('input', function() {
            var input = $(this);
            var container = input.closest('.image-upload-container');
            var preview = container.find('.image-preview');
            var removeButton = container.find('.remove-image-button');
            var imageUrl = input.val().trim();
            
            if (imageUrl && imageUrl.match(/\.(jpeg|jpg|gif|png|webp)$/i)) {
                // Valid image URL
                preview.html(
                    '<img src="' + imageUrl + '" alt="Image Preview" style="max-width: 300px; max-height: 200px; border-radius: 5px; border: 1px solid #ddd;">' +
                    '<p><small>Current image</small></p>'
                );
                removeButton.show();
            } else if (imageUrl === '') {
                // Empty URL
                preview.html(
                    '<div style="width: 300px; height: 200px; background: #f0f0f0; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; border-radius: 5px;">' +
                    '<span style="color: #666;">No image selected</span>' +
                    '</div>'
                );
                removeButton.hide();
            }
        });
        
        // Save content via AJAX
        $('.save-content').click(function() {
            var section = $(this).data('section');
            var form = $('#' + section + '-form');
            var button = $(this);
            var originalText = button.text();
            
            button.text('Saving...').prop('disabled', true);
            
            var formData = {
                action: 'save_content',
                section: section,
                nonce: '<?php echo wp_create_nonce('content_manager_nonce'); ?>',
                content_data: {}
            };
            
            // Collect form data
            form.find('input, textarea').each(function() {
                formData.content_data[$(this).attr('name')] = $(this).val();
            });
            
            $.post(ajaxurl, formData, function(response) {
                if (response.success) {
                    form.before('<div class="success-message">' + response.data + '</div>');
                    setTimeout(function() {
                        $('.success-message').fadeOut();
                    }, 3000);
                } else {
                    form.before('<div class="error-message">Error saving content. Please try again.</div>');
                }
                
                button.text(originalText).prop('disabled', false);
            });
        });
    });
    </script>
    <?php
}

// Homepage Content Form
function education_helper_homepage_content_form() {
    ?>
    <form id="homepage-form">
        <div class="content-section">
            <h3>Hero Section</h3>
            <table class="form-table">
                <tr>
                    <th><label for="hero_title">Hero Title</label></th>
                    <td><input type="text" name="hero_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('homepage', 'hero_title', 'Empowering Education for Everyone')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="hero_subtitle">Hero Subtitle</label></th>
                    <td><textarea name="hero_subtitle" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('homepage', 'hero_subtitle', 'We provide comprehensive educational support and resources to help students achieve their academic goals.')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="hero_button_text">Button Text</label></th>
                    <td><input type="text" name="hero_button_text" class="large-text" value="<?php echo esc_attr(education_helper_get_content('homepage', 'hero_button_text', 'Get Started Today')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="hero_button_link">Button Link</label></th>
                    <td><input type="url" name="hero_button_link" class="large-text" value="<?php echo esc_attr(education_helper_get_content('homepage', 'hero_button_link', '#services')); ?>"></td>
                </tr>
            </table>
        </div>
        
        <div class="content-section">
            <h3>Services Section</h3>
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <h4>Service <?php echo $i; ?></h4>
                <table class="form-table">
                    <tr>
                        <th><label for="service_<?php echo $i; ?>_title">Title</label></th>
                        <td><input type="text" name="service_<?php echo $i; ?>_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('homepage', "service_{$i}_title", "Educational Support")); ?>"></td>
                    </tr>
                    <tr>
                        <th><label for="service_<?php echo $i; ?>_description">Description</label></th>
                        <td><textarea name="service_<?php echo $i; ?>_description" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('homepage', "service_{$i}_description", "Comprehensive support for students at all levels.")); ?></textarea></td>
                    </tr>
                    <tr>
                        <th><label for="service_<?php echo $i; ?>_icon">Icon Class</label></th>
                        <td><input type="text" name="service_<?php echo $i; ?>_icon" class="large-text" value="<?php echo esc_attr(education_helper_get_content('homepage', "service_{$i}_icon", 'fas fa-graduation-cap')); ?>" placeholder="e.g., fas fa-graduation-cap"></td>
                    </tr>
                </table>
            <?php endfor; ?>
        </div>
        
        <div class="content-section">
            <h3>About Section (on Homepage)</h3>
            <table class="form-table">
                <tr>
                    <th><label for="about_title">Section Title</label></th>
                    <td><input type="text" name="about_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('homepage', 'about_title', 'About Our Mission')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="about_text">About Text</label></th>
                    <td><textarea name="about_text" class="large-text" rows="5"><?php echo esc_textarea(education_helper_get_content('homepage', 'about_text', 'At Education Helper, we believe that every student deserves access to quality educational support and resources.')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="about_image">About Image</label></th>
                    <td>
                        <div class="image-upload-container">
                            <?php 
                            $current_image = education_helper_get_content('homepage', 'about_image', '');
                            ?>
                            
                            <!-- Image Preview -->
                            <div class="image-preview" style="margin-bottom: 15px;">
                                <?php if ($current_image) : ?>
                                    <img src="<?php echo esc_url($current_image); ?>" alt="About Image Preview" style="max-width: 300px; max-height: 200px; border-radius: 5px; border: 1px solid #ddd;">
                                    <p><small>Current image</small></p>
                                <?php else : ?>
                                    <div style="width: 300px; height: 200px; background: #f0f0f0; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                        <span style="color: #666;">No image selected</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Upload Button -->
                            <div style="margin-bottom: 15px;">
                                <button type="button" class="button upload-image-button" data-target="about_image">
                                    <span class="dashicons dashicons-upload" style="vertical-align: middle;"></span>
                                    Choose Image
                                </button>
                                <?php if ($current_image) : ?>
                                    <button type="button" class="button remove-image-button" data-target="about_image" style="margin-left: 10px;">
                                        <span class="dashicons dashicons-trash" style="vertical-align: middle;"></span>
                                        Remove Image
                                    </button>
                                <?php endif; ?>
                            </div>
                            
                            <!-- URL Input (Alternative) -->
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Or enter image URL:</label>
                                <input type="url" name="about_image" class="large-text image-url-input" value="<?php echo esc_attr($current_image); ?>" placeholder="https://example.com/image.jpg">
                                <p class="description">You can either upload an image using the button above, or paste an image URL here.</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <button type="button" class="save-button save-content" data-section="homepage">Save Homepage Content</button>
    </form>
    <?php
}

// About Content Form
function education_helper_about_content_form() {
    ?>
    <form id="about-form">
        <div class="content-section">
            <h3>Page Header</h3>
            <table class="form-table">
                <tr>
                    <th><label for="header_title">Page Title</label></th>
                    <td><input type="text" name="header_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('about', 'header_title', 'About Education Helper')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="header_subtitle">Page Subtitle</label></th>
                    <td><input type="text" name="header_subtitle" class="large-text" value="<?php echo esc_attr(education_helper_get_content('about', 'header_subtitle', 'Dedicated to empowering students through quality education support')); ?>"></td>
                </tr>
            </table>
        </div>
        
        <div class="content-section">
            <h3>Our Story Section</h3>
            <table class="form-table">
                <tr>
                    <th><label for="story_title">Section Title</label></th>
                    <td><input type="text" name="story_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('about', 'story_title', 'Our Story')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="story_text">Story Text</label></th>
                    <td><textarea name="story_text" class="large-text" rows="8"><?php echo esc_textarea(education_helper_get_content('about', 'story_text', 'Founded in 2020, Education Helper was born from a simple belief: every student deserves the opportunity to succeed academically, regardless of their background or circumstances.')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="story_image">Story Image</label></th>
                    <td>
                        <div class="image-upload-container">
                            <?php 
                            $story_image = education_helper_get_content('about', 'story_image', '');
                            ?>
                            
                            <!-- Image Preview -->
                            <div class="image-preview" style="margin-bottom: 15px;">
                                <?php if ($story_image) : ?>
                                    <img src="<?php echo esc_url($story_image); ?>" alt="Story Image Preview" style="max-width: 300px; max-height: 200px; border-radius: 5px; border: 1px solid #ddd;">
                                    <p><small>Current image</small></p>
                                <?php else : ?>
                                    <div style="width: 300px; height: 200px; background: #f0f0f0; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                                        <span style="color: #666;">No image selected</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Upload Button -->
                            <div style="margin-bottom: 15px;">
                                <button type="button" class="button upload-image-button" data-target="story_image">
                                    <span class="dashicons dashicons-upload" style="vertical-align: middle;"></span>
                                    Choose Image
                                </button>
                                <?php if ($story_image) : ?>
                                    <button type="button" class="button remove-image-button" data-target="story_image" style="margin-left: 10px;">
                                        <span class="dashicons dashicons-trash" style="vertical-align: middle;"></span>
                                        Remove Image
                                    </button>
                                <?php endif; ?>
                            </div>
                            
                            <!-- URL Input (Alternative) -->
                            <div>
                                <label style="display: block; font-weight: bold; margin-bottom: 5px;">Or enter image URL:</label>
                                <input type="url" name="story_image" class="large-text image-url-input" value="<?php echo esc_attr($story_image); ?>" placeholder="https://example.com/story-image.jpg">
                                <p class="description">You can either upload an image using the button above, or paste an image URL here.</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="content-section">
            <h3>Values Section</h3>
            <table class="form-table">
                <tr>
                    <th><label for="values_title">Section Title</label></th>
                    <td><input type="text" name="values_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('about', 'values_title', 'Our Values')); ?>"></td>
                </tr>
                <?php for ($i = 1; $i <= 3; $i++) : ?>
                    <tr><td colspan="2"><h4>Value <?php echo $i; ?></h4></td></tr>
                    <tr>
                        <th><label for="value_<?php echo $i; ?>_title">Value Title</label></th>
                        <td><input type="text" name="value_<?php echo $i; ?>_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('about', "value_{$i}_title", "Value {$i}")); ?>"></td>
                    </tr>
                    <tr>
                        <th><label for="value_<?php echo $i; ?>_description">Description</label></th>
                        <td><textarea name="value_<?php echo $i; ?>_description" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('about', "value_{$i}_description", "Description for value {$i}.")); ?></textarea></td>
                    </tr>
                    <tr>
                        <th><label for="value_<?php echo $i; ?>_icon">Icon Class</label></th>
                        <td><input type="text" name="value_<?php echo $i; ?>_icon" class="large-text" value="<?php echo esc_attr(education_helper_get_content('about', "value_{$i}_icon", 'fas fa-heart')); ?>" placeholder="e.g., fas fa-heart"></td>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>
        
        <button type="button" class="save-button save-content" data-section="about">Save About Content</button>
    </form>
    <?php
}

// Services Content Form  
function education_helper_services_content_form() {
    ?>
    <form id="services-form">
        <div class="content-section">
            <h3>Page Header</h3>
            <table class="form-table">
                <tr>
                    <th><label for="header_title">Page Title</label></th>
                    <td><input type="text" name="header_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('services', 'header_title', 'Our Services')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="header_subtitle">Page Subtitle</label></th>
                    <td><input type="text" name="header_subtitle" class="large-text" value="<?php echo esc_attr(education_helper_get_content('services', 'header_subtitle', 'Comprehensive educational support tailored to your needs')); ?>"></td>
                </tr>
            </table>
        </div>
        
        <div class="content-section">
            <h3>Featured Services</h3>
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <h4>Service <?php echo $i; ?></h4>
                <table class="form-table">
                    <tr>
                        <th><label for="featured_service_<?php echo $i; ?>_title">Title</label></th>
                        <td><input type="text" name="featured_service_<?php echo $i; ?>_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('services', "featured_service_{$i}_title", "Service {$i}")); ?>"></td>
                    </tr>
                    <tr>
                        <th><label for="featured_service_<?php echo $i; ?>_description">Description</label></th>
                        <td><textarea name="featured_service_<?php echo $i; ?>_description" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('services', "featured_service_{$i}_description", "Description for service {$i}.")); ?></textarea></td>
                    </tr>
                    <tr>
                        <th><label for="featured_service_<?php echo $i; ?>_icon">Icon Class</label></th>
                        <td><input type="text" name="featured_service_<?php echo $i; ?>_icon" class="large-text" value="<?php echo esc_attr(education_helper_get_content('services', "featured_service_{$i}_icon", 'fas fa-chalkboard-teacher')); ?>" placeholder="e.g., fas fa-chalkboard-teacher"></td>
                    </tr>
                    <tr>
                        <th><label for="featured_service_<?php echo $i; ?>_price">Price</label></th>
                        <td><input type="text" name="featured_service_<?php echo $i; ?>_price" class="large-text" value="<?php echo esc_attr(education_helper_get_content('services', "featured_service_{$i}_price", "Starting at $40/hour")); ?>"></td>
                    </tr>
                </table>
            <?php endfor; ?>
        </div>
        
        <button type="button" class="save-button save-content" data-section="services">Save Services Content</button>
    </form>
    <?php
}

// Contact Content Form
function education_helper_contact_content_form() {
    ?>
    <form id="contact-form">
        <div class="content-section">
            <h3>Page Header</h3>
            <table class="form-table">
                <tr>
                    <th><label for="header_title">Page Title</label></th>
                    <td><input type="text" name="header_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('contact', 'header_title', 'Contact Us')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="header_subtitle">Page Subtitle</label></th>
                    <td><input type="text" name="header_subtitle" class="large-text" value="<?php echo esc_attr(education_helper_get_content('contact', 'header_subtitle', 'Get in touch with our education specialists')); ?>"></td>
                </tr>
            </table>
        </div>
        
        <div class="content-section">
            <h3>Contact Information</h3>
            <table class="form-table">
                <tr>
                    <th><label for="contact_phone">Phone Number</label></th>
                    <td><input type="text" name="contact_phone" class="large-text" value="<?php echo esc_attr(education_helper_get_content('contact', 'contact_phone', '+1 (555) 123-4567')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="contact_email">Email Address</label></th>
                    <td><input type="email" name="contact_email" class="large-text" value="<?php echo esc_attr(education_helper_get_content('contact', 'contact_email', 'info@educationhelper.com')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="contact_address">Address</label></th>
                    <td><textarea name="contact_address" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('contact', 'contact_address', '123 Education Street, Learning City, LC 12345')); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="office_hours">Office Hours</label></th>
                    <td><textarea name="office_hours" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('contact', 'office_hours', 'Monday - Friday: 9:00 AM - 6:00 PM\nSaturday: 10:00 AM - 4:00 PM\nSunday: Closed')); ?></textarea></td>
                </tr>
            </table>
        </div>
        
        <div class="content-section">
            <h3>Contact Form Section</h3>
            <table class="form-table">
                <tr>
                    <th><label for="form_title">Form Title</label></th>
                    <td><input type="text" name="form_title" class="large-text" value="<?php echo esc_attr(education_helper_get_content('contact', 'form_title', 'Send us a Message')); ?>"></td>
                </tr>
                <tr>
                    <th><label for="form_description">Form Description</label></th>
                    <td><textarea name="form_description" class="large-text" rows="3"><?php echo esc_textarea(education_helper_get_content('contact', 'form_description', 'Have a question or need more information? Fill out the form below and we\'ll get back to you as soon as possible.')); ?></textarea></td>
                </tr>
            </table>
        </div>
        
        <button type="button" class="save-button save-content" data-section="contact">Save Contact Content</button>
    </form>
    <?php
}

// Include admin helper functions
require_once get_template_directory() . '/admin-helper.php';
?>
