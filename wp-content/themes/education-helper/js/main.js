// Main JavaScript for Education Helper Theme
document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth scrolling for internal links
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Mobile menu toggle (if needed)
    const mobileMenuToggle = document.createElement('button');
    mobileMenuToggle.innerHTML = '&#9776;';
    mobileMenuToggle.className = 'mobile-menu-toggle';
    mobileMenuToggle.style.cssText = `
        display: none;
        background: none;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
        @media (max-width: 768px) {
            display: block;
        }
    `;
    
    // Add mobile menu functionality
    const navigation = document.querySelector('.main-navigation');
    if (navigation) {
        const headerContent = document.querySelector('.header-content');
        if (headerContent && window.innerWidth <= 768) {
            headerContent.appendChild(mobileMenuToggle);
            
            mobileMenuToggle.addEventListener('click', function() {
                const navMenu = navigation.querySelector('ul');
                if (navMenu) {
                    navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
                    navMenu.style.flexDirection = 'column';
                    navMenu.style.position = 'absolute';
                    navMenu.style.top = '100%';
                    navMenu.style.left = '0';
                    navMenu.style.right = '0';
                    navMenu.style.background = 'rgba(102, 126, 234, 0.95)';
                    navMenu.style.padding = '1rem';
                    navMenu.style.zIndex = '1000';
                }
            });
        }
    }
    
    // Form validation enhancement
    const contactForm = document.querySelector('form[method="post"]');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = '#ff6b6b';
                    isValid = false;
                } else {
                    field.style.borderColor = '#ddd';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    }
    
    // Add hover effects to service cards
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.1)';
        });
    });
    
    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for scroll animations
    const animatedElements = document.querySelectorAll('.service-card, .about-content, .contact-grid');
    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
    
    // Simple loading animation for buttons
    const buttons = document.querySelectorAll('.cta-button, .submit-button');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            if (this.type === 'submit') {
                this.innerHTML = 'Sending...';
                this.disabled = true;
                
                // Re-enable after 3 seconds if form isn't submitted
                setTimeout(() => {
                    if (this.disabled) {
                        this.innerHTML = 'Send Message';
                        this.disabled = false;
                    }
                }, 3000);
            }
        });
    });
});
