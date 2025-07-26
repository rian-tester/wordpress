<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="header-content">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'fallback_cb' => 'education_helper_fallback_menu',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<?php
// Fallback menu if no menu is set
function education_helper_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about') . '">About</a></li>';
    echo '<li><a href="' . home_url('/services') . '">Services</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Contact</a></li>';
    echo '</ul>';
}
?>
