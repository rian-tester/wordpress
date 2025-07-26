<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<section class="page-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 3rem 0; text-align: center;">
    <div class="container">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem;"><?php echo esc_html(education_helper_get_content('contact', 'header_title', 'Contact Us')); ?></h1>
        <p style="font-size: 1.2rem;"><?php echo esc_html(education_helper_get_content('contact', 'header_subtitle', 'Get in touch with our education specialists')); ?></p>
    </div>
</section>

<section class="contact-section" style="padding: 4rem 0; background: white;">
    <div class="container">
        <div class="contact-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start;">
            
            <!-- Contact Form -->
            <div class="contact-form" style="background: #f8f9fa; padding: 2rem; border-radius: 10px;">
                <h3 style="margin-bottom: 1.5rem; color: #333; font-size: 1.5rem;">Send us a Message</h3>
                
                <?php 
                // Simple contact form (you can replace this with Contact Form 7 or similar plugin)
                if (isset($_POST['submit_contact'])) {
                    $name = sanitize_text_field($_POST['contact_name']);
                    $email = sanitize_email($_POST['contact_email']);
                    $subject = sanitize_text_field($_POST['contact_subject']);
                    $message = sanitize_textarea_field($_POST['contact_message']);
                    
                    $to = education_helper_get_content('contact', 'contact_email', 'info@educationhelper.com');
                    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: ' . $email);
                    
                    $email_subject = 'Website Contact: ' . $subject;
                    $email_message = '<h3>New Contact Form Submission</h3>';
                    $email_message .= '<p><strong>Name:</strong> ' . $name . '</p>';
                    $email_message .= '<p><strong>Email:</strong> ' . $email . '</p>';
                    $email_message .= '<p><strong>Subject:</strong> ' . $subject . '</p>';
                    $email_message .= '<p><strong>Message:</strong></p><p>' . nl2br($message) . '</p>';
                    
                    if (wp_mail($to, $email_subject, $email_message, $headers)) {
                        echo '<div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">Thank you for your message! We\'ll get back to you soon.</div>';
                    } else {
                        echo '<div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">Sorry, there was an error sending your message. Please try again.</div>';
                    }
                }
                ?>
                
                <form method="post" action="">
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="contact_name" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: #333;">Name *</label>
                        <input type="text" id="contact_name" name="contact_name" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="contact_email" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: #333;">Email *</label>
                        <input type="email" id="contact_email" name="contact_email" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="contact_subject" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: #333;">Subject *</label>
                        <select id="contact_subject" name="contact_subject" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                            <option value="">Select a subject</option>
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Tutoring Services">Tutoring Services</option>
                            <option value="Test Preparation">Test Preparation</option>
                            <option value="Group Sessions">Group Sessions</option>
                            <option value="Special Needs Support">Special Needs Support</option>
                            <option value="Pricing Information">Pricing Information</option>
                            <option value="Schedule Consultation">Schedule Consultation</option>
                        </select>
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="contact_message" style="display: block; margin-bottom: 0.5rem; font-weight: bold; color: #333;">Message *</label>
                        <textarea id="contact_message" name="contact_message" rows="5" required style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; resize: vertical;"></textarea>
                    </div>
                    
                    <button type="submit" name="submit_contact" class="submit-button" style="background: #667eea; color: white; padding: 1rem 2rem; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem; transition: background 0.3s;">
                        Send Message
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="contact-info">
                <h3 style="margin-bottom: 1.5rem; color: #333; font-size: 1.5rem;">Get in Touch</h3>
                
                <div style="margin-bottom: 2rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                        <i class="fas fa-phone" style="color: #667eea; font-size: 1.2rem; margin-right: 1rem; width: 20px;"></i>
                        <div>
                            <strong>Phone:</strong><br>
                            <?php echo esc_html(education_helper_get_content('contact', 'contact_phone', '+1 (555) 123-4567')); ?>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                        <i class="fas fa-envelope" style="color: #667eea; font-size: 1.2rem; margin-right: 1rem; width: 20px;"></i>
                        <div>
                            <strong>Email:</strong><br>
                            <a href="mailto:<?php echo esc_attr(education_helper_get_content('contact', 'contact_email', 'info@educationhelper.com')); ?>" style="color: #667eea; text-decoration: none;">
                                <?php echo esc_html(education_helper_get_content('contact', 'contact_email', 'info@educationhelper.com')); ?>
                            </a>
                        </div>
                    </div>
                    
                    <div style="display: flex; align-items: flex-start; margin-bottom: 1rem;">
                        <i class="fas fa-map-marker-alt" style="color: #667eea; font-size: 1.2rem; margin-right: 1rem; width: 20px; margin-top: 0.2rem;"></i>
                        <div>
                            <strong>Address:</strong><br>
                            <?php echo nl2br(esc_html(education_helper_get_content('contact', 'contact_address', '123 Education Street, Learning City, LC 12345'))); ?>
                        </div>
                    </div>
                </div>
                
                <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem;">
                    <h4 style="color: #333; margin-bottom: 1rem;">Office Hours</h4>
                    <ul style="list-style: none; line-height: 1.8; color: #555;">
                        <li><strong>Monday - Friday:</strong> 9:00 AM - 7:00 PM</li>
                        <li><strong>Saturday:</strong> 10:00 AM - 4:00 PM</li>
                        <li><strong>Sunday:</strong> Closed</li>
                    </ul>
                </div>
                
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.5rem; border-radius: 10px;">
                    <h4 style="margin-bottom: 1rem;">Quick Response</h4>
                    <p style="margin-bottom: 1rem; opacity: 0.9; line-height: 1.6;">We typically respond to all inquiries within 24 hours. For urgent matters, please call us directly.</p>
                    <p style="font-size: 0.9rem; opacity: 0.8;">Free consultations available!</p>
                </div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div style="margin-top: 4rem; background: #f8f9fa; padding: 3rem; border-radius: 15px;">
            <h3 style="text-align: center; margin-bottom: 2rem; color: #333; font-size: 2rem;">Frequently Asked Questions</h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <div>
                    <h4 style="color: #667eea; margin-bottom: 0.5rem;">How do I schedule a session?</h4>
                    <p style="color: #555; line-height: 1.6;">Simply contact us through this form, phone, or email. We'll discuss your needs and schedule a convenient time for your first session.</p>
                </div>
                
                <div>
                    <h4 style="color: #667eea; margin-bottom: 0.5rem;">Do you offer online tutoring?</h4>
                    <p style="color: #555; line-height: 1.6;">Yes! We provide both in-person and online tutoring sessions using interactive tools and video conferencing.</p>
                </div>
                
                <div>
                    <h4 style="color: #667eea; margin-bottom: 0.5rem;">What subjects do you cover?</h4>
                    <p style="color: #555; line-height: 1.6;">We cover all major subjects from elementary through high school, including Math, Science, English, History, and test preparation.</p>
                </div>
                
                <div>
                    <h4 style="color: #667eea; margin-bottom: 0.5rem;">Is there a free consultation?</h4>
                    <p style="color: #555; line-height: 1.6;">Yes! We offer a free 30-minute consultation to discuss your student's needs and determine the best approach.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
