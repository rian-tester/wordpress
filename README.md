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

## 🎨 About the Education Helper Theme

This project includes a custom WordPress theme called **Education Helper** with the following features:

- **Custom Page Templates**:
  - Home page template
  - About page template
  - Services page template
  - Contact page template

- **Admin Customization Options**:
  - Easy theme customization through WordPress admin
  - Custom styling options
  - Responsive design

- **Built-in Functionality**:
  - Theme support for post thumbnails
  - Custom navigation menus
  - Logo and background customization
  - Widget-ready areas

## 📁 Project Structure

```
wordpress/
├── wp-content/
│   ├── themes/
│   │   └── education-helper/     # Custom theme files
│   └── plugins/                  # WordPress plugins
├── docker-compose.yml            # Docker configuration
├── wp-config.php                 # WordPress configuration
└── README.md                     # This file
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

### Getting Help

If you encounter issues:
1. Check the [WordPress Support Forums](https://wordpress.org/support/forums/)
2. Review Docker documentation
3. Check the theme's built-in documentation

## 📝 Additional Notes

- This WordPress installation is pre-configured and ready to use
- The Education Helper theme is already activated
- All necessary plugins are included
- Database is automatically set up via Docker

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
