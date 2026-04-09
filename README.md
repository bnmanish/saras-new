# Saras - Corporate Website

A comprehensive Laravel-based corporate website for Saras, featuring a full-featured content management system, product catalog, blog, tenders management, and more.

## About The Project

Saras is a modern corporate website built with Laravel 12 that serves as the digital presence for a company. The project includes both a public-facing website and a robust admin panel for content management.

### Features

#### Public Website
- **Homepage** - Dynamic landing page with sliders and featured content
- **About Us** - Company information, awards, chairman/MD messages
- **Products Catalog** - Categorized product listings with detailed views
- **Blog** - News and updates section with categories
- **Gallery** - Image gallery with category filtering
- **Tenders** - Public tender listings and notifications
- **Milk Pricing** - Purchase and sale price charts
- **Beneficiaries** - Program beneficiaries showcase
- **Quality Assurance** - Company certifications and quality standards
- **Media Press** - News coverage and press releases
- **Directors & Team** - Leadership profiles and organizational structure
- **Contact** - Contact forms and enquiry submission
- **Newsletter** - Email subscription system
- **Dealership Enquiries** - Distributor application forms
- **Important Links & Contacts** - Quick access to external resources

#### Admin Dashboard
- **User Management** - Admin users with role-based access
- **Content Management** - Sliders, pages, additional pages
- **Product Management** - Categories, products with multiple images
- **Blog Management** - Posts with categories and tags
- **Media Management** - Gallery with categories and reordering
- **Tender Management** - Create and manage tender listings
- **Price Charts** - Milk purchase/sale price management
- **Enquiry Management** - Contact and dealership enquiries
- **Settings** - Site-wide configuration
- **Footer Management** - Dynamic footer sections and links
- **Login Logs** - Track admin login attempts with geolocation
- **Script Management** - Custom scripts injection
- **Subscriber Management** - Newsletter subscribers

## Tech Stack

- **Framework:** Laravel 12.x
- **PHP Version:** 8.2+
- **Database:** MySQL
- **Frontend:** Blade Templates, Tailwind CSS 4.0, Vite
- **JavaScript:** Vanilla JS with modern ES6+
- **Packages:**
  - [yajra/laravel-datatables-oracle](https://github.com/yajra/laravel-datatables) - Server-side DataTables
  - [laravel/tinker](https://github.com/laravel/tinker) - Interactive console

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL 5.7+ or MariaDB 10.3+
- Node.js 18+ (for asset compilation)
- NPM or Yarn

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/bnmanish/saras-new.git
cd saras-new
```

### Step 2: Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

### Step 3: Environment Setup

Copy the example environment file:

```bash
cp .env.example .env
```

Or manually create a `.env` file with the following essential configuration:

```env
APP_NAME=Saras
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=saras_new
DB_USERNAME=your_username
DB_PASSWORD=your_password

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Create Database

Create a MySQL database named `saras_new` (or use your preferred name and update `.env` accordingly):

```sql
CREATE DATABASE saras_new CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Step 6: Run Migrations

```bash
php artisan migrate
```

### Step 7: Seed Database (Optional)

Run seeders to populate initial data:

```bash
php artisan db:seed
```

### Step 8: Create Storage Link

```bash
php artisan storage:link
```

### Step 9: Build Assets

```bash
npm run build
```

### Step 10: Start the Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## Quick Setup Command

For convenience, you can use the setup script defined in `composer.json`:

```bash
composer setup
```

This will run:
- `composer install`
- Generate `.env` file
- Generate application key
- Run migrations
- Install and build npm dependencies

## Development

### Running Development Server with Hot Reload

```bash
composer dev
```

This command runs concurrently:
- PHP development server
- Queue worker
- Error logging
- Vite hot reload

### Clearing Caches

```bash
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Or use the clear-all route (development only):
# http://localhost:8000/clear-all
```

### Running Tests

```bash
composer test
```

## Project Structure

```
saras-new/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── backend/          # Admin controllers
│   │   │   └── frontend/         # Public controllers
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   ├── Models/                     # Eloquent models
│   ├── Mail/                       # Mail templates
│   └── helpers.php                # Helper functions
├── config/                        # Laravel configuration
├── database/
│   ├── migrations/                # Database migrations
│   ├── factories/                 # Model factories
│   └── seeders/                   # Database seeders
├── public/
│   ├── assets/
│   │   ├── backend/              # Admin assets (CSS, JS)
│   │   └── frontend/              # Frontend assets
│   └── uploads/                   # Uploaded files
├── resources/
│   ├── views/
│   │   ├── backend/              # Admin views
│   │   ├── frontend/             # Public views
│   │   ├── components/          # Blade components
│   │   └── mail_template/        # Email templates
│   └── css/                      # Stylesheets
├── routes/
│   └── web.php                   # Web routes
└── storage/
    └── app/                      # Application storage
```

## Admin Access

After seeding, you can access the admin panel at:

- **URL:** `http://localhost:8000/admin/login`
- **Default Credentials:**
  - Email: `admin@admin.com`
  - Password: `password`

**Note:** Change these credentials immediately after first login!

## Contributing

We welcome contributions from the community! Whether you find a bug, have a feature request, or want to improve the codebase, your contributions are valued.

### How to Contribute

1. **Fork the Repository**
   Click the "Fork" button on the repository page to create your own copy.

2. **Clone Your Fork**
   ```bash
   git clone https://github.com/your-username/saras-new.git
   cd saras-new
   ```

3. **Create a Feature Branch**
   ```bash
   git checkout -b feature/your-feature-name
   # or
   git checkout -b fix/your-bug-fix
   ```

4. **Make Your Changes**
   - Write clean, well-documented code
   - Follow the existing code style
   - Add comments for complex logic
   - Update tests if applicable

5. **Commit Your Changes**
   ```bash
   git add .
   git commit -m "Add: Brief description of your changes"
   ```

6. **Push to Your Fork**
   ```bash
   git push origin feature/your-feature-name
   ```

7. **Create a Pull Request**
   - Go to the original repository
   - Click "New Pull Request"
   - Select your branch
   - Provide a clear description of your changes
   - Link any related issues

### Contribution Ideas

We welcome contributions in various areas:

- **Bug Fixes** - Help us identify and fix issues
- **New Features** - Add functionality to improve the site
- **UI/UX Improvements** - Enhance the user interface and experience
- **Performance Optimization** - Improve loading times and efficiency
- **Security Enhancements** - Strengthen the application's security
- **Documentation** - Improve code documentation and README
- **Testing** - Write tests to improve code coverage
- **Accessibility** - Improve WCAG compliance
- **Internationalization** - Add multi-language support
- **SEO Improvements** - Optimize for search engines

### Code Style Guidelines

- Follow PSR-12 coding standards
- Use meaningful variable and function names
- Keep functions small and focused
- Write comments for complex logic
- Use Laravel's built-in features and conventions

### Pull Request Guidelines

- One feature or fix per pull request
- Include clear descriptions of changes
- Reference related issues when applicable
- Ensure all tests pass
- Update documentation if needed

## Reporting Issues

If you find a bug or have a suggestion:

1. Search existing issues first
2. Create a detailed issue report including:
   - Clear title and description
   - Steps to reproduce
   - Expected vs actual behavior
   - Screenshots if applicable
   - Environment details

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support, questions, or discussions:

- Create an issue on GitHub
- Email: support@example.com

## Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
- [DataTables](https://datatables.net/) - Table plug-in for jQuery

---

**Happy coding! We look forward to your contributions.**
