<?php
/*
Template Name: Homepage
*/
get_header(); ?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo esc_html(get_theme_mod('hero_title', 'Empowering Education for Everyone')); ?></h1>
            <p><?php echo esc_html(get_theme_mod('hero_subtitle', 'We provide comprehensive educational support and resources to help students achieve their academic goals.')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('hero_button_link', '#services')); ?>" class="cta-button">
                <?php echo esc_html(get_theme_mod('hero_button_text', 'Get Started Today')); ?>
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <div class="services-grid">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="<?php echo esc_attr(get_theme_mod("service_{$i}_icon", 'fas fa-graduation-cap')); ?>"></i>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod("service_{$i}_title", "Educational Support")); ?></h3>
                    <p><?php echo esc_html(get_theme_mod("service_{$i}_description", "Comprehensive support for students at all levels.")); ?></p>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <h2 class="section-title">About Our Mission</h2>
        <div class="about-content">
            <div class="about-text">
                <p>At Education Helper, we believe that every student deserves access to quality educational support and resources. Our mission is to bridge the gap between academic challenges and student success.</p>
                <p>We provide personalized tutoring, study resources, and educational guidance to help students achieve their full potential. Our experienced team is dedicated to making learning accessible, engaging, and effective for everyone.</p>
                <p>Whether you're struggling with specific subjects, preparing for exams, or looking to enhance your study skills, we're here to support your educational journey every step of the way.</p>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/about-placeholder.jpg" alt="Education Support" style="width: 100%; max-width: 500px; height: 300px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                    <span style="padding: 20px; text-align: center;">Your About Image<br>Goes Here</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
