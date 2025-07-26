<?php
/*
Template Name: About Page
*/
get_header(); ?>

<section class="page-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 3rem 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">About Education Helper</h1>
        <p style="font-size: 1.2rem;">Dedicated to empowering students through quality education support</p>
    </div>
</section>

<section class="about-detailed" style="padding: 4rem 0; background: white;">
    <div class="container">
        <div class="about-content">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; margin-bottom: 3rem;">
                <div>
                    <h2 style="color: #333; margin-bottom: 1.5rem; font-size: 2rem;">Our Story</h2>
                    <p style="line-height: 1.8; margin-bottom: 1rem;">Founded in 2020, Education Helper was born from a simple belief: every student deserves the opportunity to succeed academically, regardless of their background or circumstances.</p>
                    <p style="line-height: 1.8; margin-bottom: 1rem;">Our founders, experienced educators with over 20 years in the field, recognized the growing need for personalized, accessible educational support that goes beyond traditional classroom learning.</p>
                    <p style="line-height: 1.8;">Today, we've helped over 1,000 students achieve their academic goals through our comprehensive support programs.</p>
                </div>
                <div style="text-align: center;">
                    <div style="width: 100%; height: 300px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                        Our Story Image<br>Placeholder
                    </div>
                </div>
            </div>
            
            <div style="background: #f8f9fa; padding: 3rem; border-radius: 10px; margin-bottom: 3rem;">
                <h2 style="text-align: center; color: #333; margin-bottom: 2rem; font-size: 2rem;">Our Values</h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                    <div style="text-align: center;">
                        <div style="font-size: 3rem; color: #667eea; margin-bottom: 1rem;">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 style="margin-bottom: 1rem; color: #333;">Compassion</h3>
                        <p>We understand that every student's journey is unique and approach each individual with empathy and care.</p>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 3rem; color: #667eea; margin-bottom: 1rem;">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 style="margin-bottom: 1rem; color: #333;">Excellence</h3>
                        <p>We strive for the highest standards in our educational support and continuously improve our methods.</p>
                    </div>
                    <div style="text-align: center;">
                        <div style="font-size: 3rem; color: #667eea; margin-bottom: 1rem;">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 style="margin-bottom: 1rem; color: #333;">Community</h3>
                        <p>We believe in building a supportive community where students, families, and educators work together.</p>
                    </div>
                </div>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
                <div style="text-align: center;">
                    <div style="width: 100%; height: 300px; background: linear-gradient(45deg, #ff6b6b, #ffa500); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                        Team Image<br>Placeholder
                    </div>
                </div>
                <div>
                    <h2 style="color: #333; margin-bottom: 1.5rem; font-size: 2rem;">Our Team</h2>
                    <p style="line-height: 1.8; margin-bottom: 1rem;">Our diverse team consists of certified teachers, subject matter experts, and educational specialists who are passionate about helping students succeed.</p>
                    <p style="line-height: 1.8; margin-bottom: 1rem;">Each team member brings unique expertise and experience, allowing us to provide comprehensive support across all academic subjects and grade levels.</p>
                    <p style="line-height: 1.8;">We're not just educators – we're mentors, motivators, and advocates for every student we serve.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
