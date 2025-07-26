# WordPress Education Helper Template Project

A custom WordPress template project featuring the **Education Helper** theme, designed for educational organizations with easy admin customization options.

## 🚀 Quick Start

This project uses Docker for easy local development setup. Follow these steps to get started:

### Prerequisites

Before you begin, make sure you have the following installed on your system:

1. **Docker Desktop** - [Download here](https://www.docker.com/products/docker-desktop/)
   - Make sure Docker Desktop is running before proceeding
   - Verify installation by running `docker --version` in your terminal

2. **Git Bash** (for Windows users) - [Download here](https://git-scm.com/downloads)
   - Provides a Unix-like terminal experience on Windows
   - Includes Git version control system

### Installation Steps

1. **Clone or download this repository** to your local machine

2. **Open your terminal** (Git Bash recommended for Windows)

3. **Navigate to the project directory**:
   ```bash
   cd path/to/your/project/wordpress
   ```

4. **Start the Docker containers**:
   ```bash
   docker-compose up -d
   ```
   
   This command will:
   - Download the necessary Docker images
   - Set up WordPress with MySQL database
   - Start the containers in detached mode (background)

5. **Wait for the containers to fully start** (usually takes 1-2 minutes)

6. **Access your WordPress site**:
   - Open your browser and go to: `http://localhost` or `http://localhost:8080`
   - The site should load with the Education Helper theme active

## 🔐 Admin Access

The WordPress admin area is already configured with the following credentials:

- **Admin URL**: `http://localhost/wp-admin`
- **Username**: `fitra`
- **Password**: `12345678`

### First Login Steps:
1. Go to `http://localhost/wp-admin`
2. Enter the credentials above
3. You'll have full admin access to customize the Education Helper theme
4. **🎯 Access the Content Manager**: Click the "Content" button in the admin toolbar for easy content editing

## 📝 Content Manager System

The Education Helper theme includes a powerful **Content Manager** that makes it easy for non-technical users to update website content without coding knowledge.

### 🌟 Key Features

- **One-Click Access**: Available via the "Content" button in the WordPress admin toolbar
- **Tabbed Interface**: Organized sections for Homepage, About, Services, and Contact pages
- **Real-Time Editing**: Changes are saved instantly using AJAX technology
- **Image Management**: Dual upload system supporting both file uploads and URL inputs
- **Live Preview**: See image changes immediately with preview functionality
- **User-Friendly**: Designed for content managers without technical backgrounds

### 🎯 How to Use the Content Manager

#### Accessing the Content Manager
1. **Login to WordPress Admin** (`http://localhost/wp-admin`)
2. **Look for the "Content" button** in the top admin toolbar (black bar)
3. **Click "Content"** to open the Content Manager interface

#### Editing Page Content

**Homepage Tab**:
- **Hero Section**: Update main banner text, subtitle, and call-to-action button
- **Services Section**: Modify service titles, descriptions, and Font Awesome icons
- **About Section**: Change about text and upload images

**About Tab**:
- **Page Header**: Edit page title and subtitle
- **Our Story**: Update company story text and upload story images
- **Values Section**: Customize company values with titles, descriptions, and icons

**Services Tab**:
- **Page Header**: Modify services page title and subtitle
- **Featured Services**: Update service details, pricing, and icons

**Contact Tab**:
- **Page Header**: Edit contact page title and subtitle
- **Contact Information**: Update phone, email, address, and office hours
- **Contact Form**: Customize form title and description

#### 🖼️ Image Upload System

The Content Manager features a dual image upload system for maximum flexibility:

**Method 1: WordPress Media Library Upload**
1. Click the **"Choose Image"** button (📤 icon)
2. Select **"Upload Files"** or choose from **"Media Library"**
3. Upload your image or select an existing one
4. Click **"Choose Image"** to confirm
5. The image preview updates automatically

**Method 2: URL Input**
1. Paste an image URL in the **"Or enter image URL"** field
2. The preview updates automatically for valid image URLs
3. Supports common formats: JPG, PNG, GIF, WebP

**Image Management Features**:
- **Live Preview**: See images immediately after selection
- **Remove Function**: Click "Remove Image" (🗑️ icon) to clear images
- **Placeholder Display**: Shows dashed border when no image is selected
- **URL Validation**: Automatically detects valid image URLs

#### 💾 Saving Changes
- Click the **"Save [Page] Content"** button at the bottom of each tab
- Changes are saved instantly via AJAX (no page reload required)
- Success messages confirm when content is saved
- Changes appear immediately on the front-end website

### 🎨 Icon Customization

The theme uses **Font Awesome icons** for visual elements:

**Common Icon Examples**:
- `fas fa-graduation-cap` - Education/graduation cap
- `fas fa-book` - Book
- `fas fa-chalkboard-teacher` - Teacher/classroom
- `fas fa-users` - Group of people
- `fas fa-star` - Star
- `fas fa-heart` - Heart
- `fas fa-lightbulb` - Light bulb/ideas

**How to Change Icons**:
1. Visit [Font Awesome Icons](https://fontawesome.com/icons) 
2. Find the icon you want to use
3. Copy the icon class (e.g., `fas fa-graduation-cap`)
4. Paste it in the "Icon Class" field in the Content Manager
5. Save the changes

### 🔧 Technical Features

**For Developers**:
- **AJAX-Powered**: No page reloads required for content updates
- **WordPress Options API**: Content stored in WordPress options table
- **Security**: Nonce verification and user capability checks
- **Data Sanitization**: All inputs properly sanitized for security
- **Media Integration**: Full WordPress Media Library integration
- **Responsive Design**: Admin interface works on all device sizes

## 🎨 About the Education Helper Theme

This project includes a custom WordPress theme called **Education Helper** with the following features:

- **Custom Page Templates**:
  - Home page template
  - About page template
  - Services page template
  - Contact page template

- **Built-in Content Management System**:
  - ✨ **NEW: Advanced Content Manager** - Easy-to-use interface for non-technical users
  - Real-time content editing with AJAX save functionality
  - Dual image upload system (WordPress Media Library + URL input)
  - Live image previews with upload/remove capabilities
  - Tabbed interface for organized content management

- **Admin Customization Options**:
  - Custom Content Manager accessible via admin toolbar
  - WordPress Customizer integration
  - Custom styling options with color picker
  - Responsive design optimization

- **Built-in Functionality**:
  - Theme support for post thumbnails
  - Custom navigation menus
  - Logo and background customization
  - Widget-ready areas
  - Font Awesome icon integration

## 📁 Project Structure

```
wordpress/
├── wp-content/
│   ├── themes/
│   │   └── education-helper/          # Custom theme files
│   │       ├── functions.php          # 🆕 Content Manager system
│   │       ├── page-home.php          # Homepage template
│   │       ├── page-about.php         # About page template
│   │       ├── page-services.php      # Services page template
│   │       ├── page-contact.php       # Contact page template
│   │       ├── style.css              # Theme styles
│   │       └── admin-helper.php       # Admin functionality
│   └── plugins/                       # WordPress plugins
├── docker-compose.yml                 # Docker configuration
├── wp-config.php                      # WordPress configuration
├── .gitignore                         # 🆕 Git ignore rules
└── README.md                          # This documentation
```

## 🛠️ Development

### Useful Docker Commands

- **Start containers**: `docker-compose up -d`
- **Stop containers**: `docker-compose down`
- **View container logs**: `docker-compose logs`
- **Rebuild containers**: `docker-compose up -d --build`

### Accessing the Database

If you need to access the MySQL database directly:
- **Host**: `localhost`
- **Port**: `3306` (or check your docker-compose.yml)
- **Database**: Check your `wp-config.php` for database name
- **Username/Password**: Check your `wp-config.php` or docker-compose.yml

### Making Theme Changes

1. Navigate to `wp-content/themes/education-helper/`
2. Edit the theme files as needed
3. Changes will be reflected immediately (no container restart needed)
4. **For Content Changes**: Use the Content Manager for easier editing
5. **For Code Changes**: Edit PHP templates and CSS files directly

### Content Manager Development

The Content Manager is built with:
- **PHP Functions**: Located in `functions.php` (lines 280-920+)
- **AJAX Handlers**: WordPress AJAX for real-time saving
- **JavaScript**: jQuery for media uploader and form handling
- **CSS**: Inline styles for admin interface design

**Key Functions**:
- `education_helper_content_manager_page()` - Main admin interface
- `education_helper_save_content()` - AJAX save handler
- `education_helper_get_content()` - Content retrieval function
- `education_helper_*_content_form()` - Individual page forms

## 🔧 Troubleshooting

### Common Issues:

1. **Port already in use**:
   - Stop other web servers running on port 80/8080
   - Or modify the port in `docker-compose.yml`

2. **Docker containers won't start**:
   - Make sure Docker Desktop is running
   - Check if you have sufficient disk space
   - Try: `docker-compose down` then `docker-compose up -d`

3. **Database connection errors**:
   - Wait a few more minutes for MySQL to fully initialize
   - Check container logs: `docker-compose logs mysql`

4. **Permission issues** (Linux/Mac):
   - You might need to adjust file permissions
   - Run: `sudo chown -R $USER:$USER .`

5. **Content Manager Issues**:
   - **Can't see "Content" button**: Make sure you're logged in as admin
   - **Images not uploading**: Check file permissions in `wp-content/uploads/`
   - **AJAX save fails**: Check browser console for JavaScript errors
   - **Changes not appearing**: Clear any caching plugins or browser cache

6. **Image Upload Problems**:
   - **File upload errors**: Ensure WordPress has write permissions to uploads directory
   - **Media Library won't open**: Check that `wp_enqueue_media()` is working
   - **URL images not showing**: Verify image URLs are direct links to image files

### Content Manager Troubleshooting

**Issue**: Content Manager shows blank or loading
- **Solution**: Check that `functions.php` is not corrupted
- **Check**: Browser console for JavaScript errors
- **Verify**: Admin user has `manage_options` capability

**Issue**: Images won't upload via Media Library
- **Solution**: Ensure proper file permissions on `wp-content/uploads/`
- **Check**: PHP `upload_max_filesize` and `post_max_size` settings
- **Verify**: WordPress Media Library is functioning normally

**Issue**: AJAX saves are failing
- **Solution**: Check WordPress debug logs for PHP errors
- **Verify**: Nonce security tokens are working correctly
- **Check**: Database connectivity and permissions

### Getting Help

If you encounter issues:
1. Check the [WordPress Support Forums](https://wordpress.org/support/forums/)
2. Review Docker documentation
3. Check the theme's built-in documentation

## 📝 Additional Notes

- This WordPress installation is pre-configured and ready to use
- The Education Helper theme is already activated with **Content Manager system**
- All necessary plugins are included
- Database is automatically set up via Docker
- **🆕 Content Manager**: Accessible immediately after login via admin toolbar
- **Image Management**: Supports both file uploads and URL inputs
- **Real-time Editing**: Changes save instantly without page reloads
- **User-Friendly**: Designed for non-technical content managers

### Quick Start Checklist

After setup, you can immediately:
- ✅ Access your site at `http://localhost`
- ✅ Login to admin at `http://localhost/wp-admin` (fitra/12345678)
- ✅ Click "Content" in admin toolbar to edit website content
- ✅ Upload images using WordPress Media Library or URL inputs
- ✅ Edit all page content through the tabbed interface
- ✅ See changes immediately on your website

## 🔒 Security Note

**Important**: The provided admin credentials are for development purposes only. If you plan to deploy this to production:

1. Change the admin password immediately
2. Update the `wp-config.php` with secure database credentials
3. Install security plugins
4. Follow WordPress security best practices

## 📄 License

This project uses WordPress (GPL v2 or later) and includes a custom theme. See `license.txt` for WordPress license details.

---

**Happy coding! 🚀**
