# Deploying Education Helper WordPress Site to Netlify

This guide will help you deploy your WordPress Education Helper site to Netlify using different approaches.

## Method 1: Static Site Generation (Recommended for Netlify)

### Step 1: Install Simply Static Plugin

1. In your WordPress admin, go to Plugins → Add New
2. Search for "Simply Static"
3. Install and activate the plugin

### Step 2: Configure Simply Static

1. Go to Simply Static → Settings
2. Configure these settings:
   - **Delivery Method**: ZIP Archive
   - **URLs to Include**: Leave default (entire site)
   - **Additional URLs**: Add any custom URLs if needed
   - **Additional Files**: Leave empty

### Step 3: Generate Static Site

1. Go to Simply Static → Generate
2. Click "Generate Static Site"
3. Wait for the generation to complete
4. Download the ZIP file

### Step 4: Prepare for Netlify

1. Extract the ZIP file to a folder
2. Create a `_redirects` file in the root directory:
```
# Handle form submissions
/contact /contact.html 200

# Redirect WordPress admin attempts
/wp-admin/* https://your-wordpress-site.com/wp-admin/:splat 301!
```

3. Create a `netlify.toml` file in the root directory:
```toml
[build]
  publish = "."

[build.environment]
  NODE_VERSION = "16"

[[redirects]]
  from = "/contact"
  to = "/contact.html"
  status = 200

# Form handling
[[redirects]]
  from = "/api/contact"
  to = "/.netlify/functions/contact"
  status = 200
```

### Step 5: Set Up Netlify Forms

Replace the contact form in your HTML with Netlify's form handling:

```html
<form name="contact" method="POST" data-netlify="true" data-netlify-honeypot="bot-field">
  <input type="hidden" name="form-name" value="contact" />
  <p class="hidden">
    <label>Don't fill this out: <input name="bot-field" /></label>
  </p>
  <!-- Your existing form fields -->
</form>
```

### Step 6: Deploy to Netlify

#### Using Netlify CLI:

1. Install Netlify CLI:
```bash
npm install -g netlify-cli
```

2. Login to Netlify:
```bash
netlify login
```

3. Initialize the site:
```bash
netlify init
```

4. Deploy:
```bash
netlify deploy --prod
```

#### Using Netlify Web Interface:

1. Go to https://netlify.com
2. Drag and drop your extracted folder to the deploy area
3. Your site will be deployed instantly

### Step 7: Configure Custom Domain (Optional)

1. In Netlify dashboard, go to Site Settings → Domain Management
2. Add your custom domain
3. Configure DNS settings with your domain provider

## Method 2: Headless WordPress with Static Site Generator

### Using Gatsby (Advanced)

1. Set up WordPress as headless CMS
2. Install WPGraphQL plugin in WordPress
3. Create new Gatsby project
4. Configure Gatsby to fetch from WordPress
5. Deploy Gatsby build to Netlify

### Using Next.js (Advanced)

1. Set up WordPress REST API
2. Create Next.js application
3. Configure static generation with WordPress data
4. Deploy to Netlify

## Method 3: WordPress Hosting + Netlify for Assets

If you prefer to keep WordPress hosting separate:

1. Host WordPress on traditional hosting (WP Engine, SiteGround, etc.)
2. Use Netlify for static assets and CDN
3. Configure WordPress to use Netlify for images/assets

## Updating Your Site

### For Static Sites:
1. Make changes in WordPress
2. Regenerate static site with Simply Static
3. Redeploy to Netlify

### Automated Updates:
- Set up webhooks between WordPress and Netlify
- Use GitHub Actions to automate the build process
- Configure automatic deployments on content changes

## Environment Variables

If using dynamic features, set these in Netlify:

```
WORDPRESS_API_URL=https://your-wordpress-site.com/wp-json/wp/v2
CONTACT_EMAIL=your-email@domain.com
```

## Performance Optimization

1. **Image Optimization**: Use Netlify's image transformation
2. **Caching**: Configure browser caching headers
3. **Compression**: Enable Gzip compression
4. **CDN**: Leverage Netlify's global CDN

## Troubleshooting

### Common Issues:

1. **Forms not working**: Ensure `data-netlify="true"` is added
2. **CSS/JS not loading**: Check file paths in generated HTML
3. **Images missing**: Verify image paths in static generation
4. **404 errors**: Configure redirects properly

### Contact Form Issues:

If contact forms aren't working:
1. Check Netlify form settings in dashboard
2. Verify form HTML attributes
3. Test form submission
4. Check Netlify Functions logs

## Cost Considerations

- **Netlify Free Tier**: 100GB bandwidth/month, 300 build minutes
- **Netlify Pro**: $19/month for more features and bandwidth
- **WordPress Hosting**: Keep existing hosting for admin/content management

## Security Benefits

- **Static Site Security**: No server-side vulnerabilities
- **WordPress Protection**: Admin area can be behind firewall
- **SSL Certificate**: Free Let's Encrypt SSL via Netlify
- **DDoS Protection**: Built-in protection via Netlify CDN

## Support Resources

- [Netlify Documentation](https://docs.netlify.com/)
- [Simply Static Plugin](https://wordpress.org/plugins/simply-static/)
- [WordPress REST API](https://developer.wordpress.org/rest-api/)
- [Netlify Forms](https://docs.netlify.com/forms/setup/)

Remember: Static site deployment means your WordPress admin remains on your original hosting, but the public site is served from Netlify's fast CDN.
