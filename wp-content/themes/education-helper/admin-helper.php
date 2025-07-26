<?php
/**
 * Admin Helper Functions for Education Helper Theme
 * Provides easy-to-use admin interface for non-technical users
 */

// Add custom admin styles
function education_helper_admin_styles() {
    echo '<style>
        .education-helper-admin {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .education-helper-admin h3 {
            color: #667eea;
            margin-top: 0;
        }
        .education-helper-quick-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .education-helper-quick-link {
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .education-helper-quick-link:hover {
            background: #5a6fd8;
            color: white;
        }
        .education-helper-tip {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .education-helper-tip strong {
            color: #856404;
        }
    </style>';
}
add_action('admin_head', 'education_helper_admin_styles');

// Add custom admin page
function education_helper_admin_menu_page() {
    add_theme_page(
        'Education Helper Settings',
        'Theme Help',
        'edit_theme_options',
        'education-helper-settings',
        'education_helper_admin_page'
    );
}
add_action('admin_menu', 'education_helper_admin_menu_page');

function education_helper_admin_page() {
    ?>
    <div class="wrap">
        <h1>Education Helper Theme - Quick Setup Guide</h1>
        
        <div class="education-helper-admin">
            <h3>🎉 Welcome to Your Education Helper Website!</h3>
            <p>This guide will help you customize your website quickly and easily. No technical skills required!</p>
            
            <div class="education-helper-quick-links">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=homepage_settings'); ?>" class="education-helper-quick-link">
                    📝 Edit Homepage Content
                </a>
                <a href="<?php echo admin_url('customize.php?autofocus[section]=contact_info'); ?>" class="education-helper-quick-link">
                    📞 Update Contact Info
                </a>
                <a href="<?php echo admin_url('customize.php?autofocus[section]=color_settings'); ?>" class="education-helper-quick-link">
                    🎨 Change Colors
                </a>
                <a href="<?php echo admin_url('nav-menus.php'); ?>" class="education-helper-quick-link">
                    🔗 Edit Navigation Menu
                </a>
                <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="education-helper-quick-link">
                    🖼️ Upload Logo
                </a>
                <a href="<?php echo admin_url('edit.php?post_type=page'); ?>" class="education-helper-quick-link">
                    📄 Edit Pages
                </a>
            </div>
        </div>
        
        <div class="education-helper-admin">
            <h3>📋 Quick Setup Checklist</h3>
            <ul style="line-height: 1.8;">
                <li>✅ <strong>Upload your logo:</strong> Go to Appearance → Customize → Site Identity</li>
                <li>✅ <strong>Update contact information:</strong> Use the "Update Contact Info" button above</li>
                <li>✅ <strong>Customize homepage content:</strong> Use the "Edit Homepage Content" button above</li>
                <li>✅ <strong>Choose your colors:</strong> Use the "Change Colors" button above</li>
                <li>✅ <strong>Set up navigation menu:</strong> Use the "Edit Navigation Menu" button above</li>
                <li>✅ <strong>Edit page content:</strong> Go to Pages → Edit individual pages</li>
            </ul>
        </div>
        
        <div class="education-helper-admin">
            <h3>💡 Pro Tips for Managing Your Website</h3>
            
            <div class="education-helper-tip">
                <strong>Tip 1:</strong> Use the WordPress Customizer (Appearance → Customize) to see live previews of your changes before publishing them.
            </div>
            
            <div class="education-helper-tip">
                <strong>Tip 2:</strong> Your homepage displays three service boxes. You can customize the icon, title, and description for each one in the Homepage Settings.
            </div>
            
            <div class="education-helper-tip">
                <strong>Tip 3:</strong> For icons, use Font Awesome classes like "fas fa-graduation-cap" or "fas fa-book". Visit fontawesome.com for more icons.
            </div>
            
            <div class="education-helper-tip">
                <strong>Tip 4:</strong> The contact form on your Contact page will send emails to the address you set in Contact Information settings.
            </div>
        </div>
        
        <div class="education-helper-admin">
            <h3>🔧 Common Tasks</h3>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>How to Do It</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Change the main heading on homepage</td>
                        <td>Customize → Homepage Settings → Hero Title</td>
                    </tr>
                    <tr>
                        <td>Update phone number and email</td>
                        <td>Customize → Contact Information</td>
                    </tr>
                    <tr>
                        <td>Change website colors</td>
                        <td>Customize → Theme Colors</td>
                    </tr>
                    <tr>
                        <td>Edit About page content</td>
                        <td>Pages → All Pages → Edit "About"</td>
                    </tr>
                    <tr>
                        <td>Add/remove menu items</td>
                        <td>Appearance → Menus</td>
                    </tr>
                    <tr>
                        <td>Upload new logo</td>
                        <td>Customize → Site Identity → Logo</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="education-helper-admin">
            <h3>🆘 Need More Help?</h3>
            <p>If you need assistance with your website, here are some resources:</p>
            <ul>
                <li><a href="https://wordpress.org/support/" target="_blank">WordPress Support Forums</a></li>
                <li><a href="https://wordpress.org/support/article/first-steps-with-wordpress/" target="_blank">WordPress Getting Started Guide</a></li>
                <li><a href="https://wordpress.org/support/article/pages/" target="_blank">How to Edit Pages</a></li>
            </ul>
        </div>
    </div>
    <?php
}

// Simplify admin menu for non-technical users
function education_helper_simplify_admin() {
    // Add helpful notices
    add_action('admin_notices', function() {
        $screen = get_current_screen();
        if ($screen->id === 'themes' && isset($_GET['activated'])) {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p><strong>Education Helper Theme Activated!</strong> ';
            echo '<a href="' . admin_url('themes.php?page=education-helper-settings') . '">Click here for the quick setup guide</a> ';
            echo 'or <a href="' . admin_url('customize.php') . '">start customizing your site</a>.</p>';
            echo '</div>';
        }
    });
}
add_action('admin_init', 'education_helper_simplify_admin');

// Add quick edit links to admin bar
function education_helper_admin_bar_links($wp_admin_bar) {
    if (!is_admin() && current_user_can('customize')) {
        $wp_admin_bar->add_node(array(
            'id' => 'education-helper-customize',
            'title' => '✏️ Quick Edit',
            'href' => admin_url('customize.php'),
            'meta' => array('title' => 'Customize your website')
        ));
    }
}
add_action('admin_bar_menu', 'education_helper_admin_bar_links', 100);
?>
