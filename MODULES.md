# Admin Modules Documentation

This document outlines the complete CRUD (Create, Read, Update, Delete) operations for the admin modules implemented in this Laravel application.

## Table of Contents
- [Directors Module](#directors-module)
- [Products Module](#products-module)
- [Login Logs Module](#login-logs-module)
- [Access Control](#access-control)

## Directors Module

### Overview
The Directors module manages director profiles with optional message content. Directors can have a name, designation, image, and an optional message that displays on the frontend.

### Database Structure
- **Table**: `directors`
- **Fields**:
  - `id` (Primary Key)
  - `name` (String, nullable)
  - `designation` (String, nullable)
  - `image` (String, nullable)
  - `message` (Text, nullable) - Added for optional director messages
  - `status` (Enum: '0','1' - 0=disabled, 1=enabled)
  - `timestamps`

### CRUD Operations

#### Create
- **Route**: `POST /admin/store-director`
- **Controller**: `DirectorController@stroeProfile`
- **View**: `backend/director/add_director.blade.php`
- **Validation**:
  - `name`: required, string, max:255
  - `designation`: required, string, max:255
  - `image`: nullable, image file (jpg,jpeg,png,gif), max:2048KB
  - `message`: nullable, string
  - `status`: required, in:0,1

#### Read/List
- **Route**: `GET /admin/list-director`
- **Controller**: `DirectorController@listProfile`
- **View**: `backend/director/list_director.blade.php`
- **Features**:
  - DataTable with server-side processing
  - Status badges
  - Edit/Delete actions

#### Update
- **Route**: `POST /admin/edit-store-director/{id}`
- **Controller**: `DirectorController@editStoreProfile`
- **View**: `backend/director/edit_director.blade.php`
- **Features**:
  - Pre-populated form with existing data
  - Image replacement capability
  - TinyMCE editor for message field

#### Delete
- **Route**: `GET /admin/delete-director/{id}`
- **Controller**: `DirectorController@deleteProfile`
- **Features**:
  - Confirmation prompt
  - Image file deletion from storage

### Frontend Integration
- Directors are displayed on `/directors` route
- Messages are shown when present
- Status controls visibility

## Products Module

### Overview
The Products module manages product catalog with multiple images, pricing, and categorization. Supports related products and detailed descriptions.

### Database Structure

#### Products Table
- **Table**: `products`
- **Fields**:
  - `id` (Primary Key)
  - `name` (String) - Renamed from `title`
  - `price` (Decimal, 10,2, nullable)
  - `pack_size` (String, nullable)
  - `short_description` (Text, nullable)
  - `long_description` (Text, nullable)
  - `related_products` (JSON, nullable) - Array of related product IDs
  - `status` (Enum: '0','1')
  - `timestamps`

#### Product Images Table
- **Table**: `product_images`
- **Fields**:
  - `id` (Primary Key)
  - `product_id` (Foreign Key)
  - `image_path` (String)
  - `is_primary` (Boolean, default false)
  - `sort_order` (Integer, default 0)
  - `timestamps`

### CRUD Operations

#### Create
- **Route**: `POST /admin/store-product`
- **Controller**: `ProductController@storeProduct`
- **View**: `backend/product/add_product.blade.php`
- **Validation**:
  - `name`: required, string, max:255
  - `price`: nullable, numeric, min:0
  - `pack_size`: nullable, string
  - `short_description`: nullable, string
  - `long_description`: nullable, string
  - `images[]`: nullable, array of image files
  - `related_products`: nullable, array
  - `status`: required, in:0,1

#### Read/List
- **Route**: `GET /admin/list-product`
- **Controller**: `ProductController@listProduct`
- **View**: `backend/product/list_product.blade.php`
- **Features**:
  - DataTable display
  - Image thumbnails
  - Status management
  - Edit/Delete actions

#### Update
- **Route**: `POST /admin/edit-store-product/{id}`
- **Controller**: `ProductController@editStoreProduct`
- **View**: `backend/product/edit_product.blade.php`
- **Features**:
  - Existing data pre-population
  - Image management (add new, delete existing)
  - Primary image selection
  - Related products multi-select

#### Delete
- **Routes**:
  - `GET /admin/delete-product/{id}` - Delete product
  - `GET /admin/delete-product-image/{id}` - Delete individual image
- **Controller**: `ProductController@deleteProduct`, `ProductController@deleteProductImage`
- **Features**:
  - Cascade deletion of images
  - File system cleanup

### Image Management
- Multiple HD images per product
- Primary image designation
- Sort order for display
- Automatic thumbnail generation (if configured)

## Login Logs Module

### Overview
The Login Logs module tracks user authentication attempts with geolocation data. Includes advanced filtering and export capabilities.

### Database Structure
- **Table**: `login_logs`
- **Fields**:
  - `id` (Primary Key)
  - `user_id` (Foreign Key, nullable)
  - `username` (String, nullable)
  - `ip_address` (String)
  - `location` (String, nullable) - Geolocation data
  - `status` (Enum: 'success', 'fail')
  - `user_agent` (Text, nullable)
  - `timestamps`

### CRUD Operations

#### Read/List (Primary Operation)
- **Route**: `GET /admin/login-logs`
- **Controller**: `LoginLogController@index`
- **View**: `backend/login_log/list_login_logs.blade.php`
- **Features**:
  - DataTable with server-side processing
  - Advanced filtering:
    - Date range (defaults to today)
    - Username/Email search
    - IP/Location search
    - Status filter
  - Real-time data updates
  - Responsive design

#### Data Endpoint
- **Route**: `GET /admin/login-logs-data`
- **Controller**: `LoginLogController@getData`
- **Features**:
  - AJAX data source for DataTable
  - Optimized queries with relationships
  - Formatted output (badges, timestamps)

#### Export Functionality
- **Route**: `GET /admin/login-logs-export`
- **Controller**: `LoginLogController@export`
- **Formats**: CSV, Excel (CSV with Excel headers)
- **Features**:
  - Respects current filters
  - Includes all relevant columns
  - Proper headers and formatting
  - Download as attachment

### Automatic Logging
- **Event**: `LogLoginAttempt`
- **Listener**: Registered in `EventServiceProvider`
- **Trigger**: On every login attempt (success/fail)
- **Features**:
  - Duplicate prevention (same IP, user, status within 5 minutes)
  - Geolocation fetching via IP
  - User agent capture

## Access Control

### Middleware
- **AdminMiddleware**: Ensures only admin users can access admin routes
- **Applied to**: All `/admin/*` routes except login
- **Checks**:
  - User authentication
  - Admin role verification

### User Roles
- **Database Field**: `users.role` (enum: 'user', 'admin')
- **Admin Check**: `User::isAdmin()` method
- **Default Role**: 'user'

### Security Features
- Role-based access control
- Authentication required for admin areas
- 403 Forbidden for unauthorized access
- Proper session management

## API Endpoints Summary

### Directors
- `GET /admin/add-director` - Add form
- `POST /admin/store-director` - Create
- `GET /admin/list-director` - List
- `GET /admin/edit-director/{id}` - Edit form
- `POST /admin/edit-store-director/{id}` - Update
- `GET /admin/delete-director/{id}` - Delete

### Products
- `GET /admin/add-product` - Add form
- `POST /admin/store-product` - Create
- `GET /admin/list-product` - List
- `GET /admin/edit-product/{id}` - Edit form
- `POST /admin/edit-store-product/{id}` - Update
- `GET /admin/delete-product/{id}` - Delete
- `GET /admin/delete-product-image/{id}` - Delete image

### Login Logs
- `GET /admin/login-logs` - Main view
- `GET /admin/login-logs-data` - DataTable data
- `GET /admin/login-logs-export` - Export data

## Frontend Routes
- `GET /directors` - Public directors page
- `GET /projects` - Public projects listing (if implemented)

## Notes
- All modules use Laravel's built-in validation
- Image uploads are stored in `public/uploads/`
- DataTables provide responsive, searchable tables
- Export functionality respects current filters
- Login logging is automatic and duplicate-safe
- Admin middleware ensures security</content>
</xai:function_call">Write file to MODULES.md