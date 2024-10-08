# PHP E-commerce Project

## Author
- **Name:** Md. Mizanur Rahman
- **Email:** mizancse2018@gmail.com

## License
This open-source project aims to help developers gain practical knowledge in PHP, particularly in building e-commerce applications.

## Purpose
The purpose of this project is to enhance skills through a practical e-commerce application, incorporating features such as product management, user authentication, and order handling.

## Database Information
- **Database Name:** php_ecommerce
- **Note:** You can create the required tables by running `db/migration.php` or by importing the provided SQL file (`php_ecommerce.sql`).
- **Admin Credentials:**
  - Username: `mizan`
  - Password: `1234`
- **Customer Credentials:**
  - Username: `sun`
  - Password: `1234`

## Getting Started
1. Clone or download the project files.
2. Set up a local development environment (e.g., XAMPP, WAMP).
3. Import `php_ecommerce.sql` into your MySQL database or execute `db/migration.php` to create the necessary tables.
4. Configure `db/config.php` with your database credentials.
5. Access the admin panel by navigating to `adminPanel/signin.php`.
6. Access the frontend by navigating to `index.php`.

## Features
- **Admin Panel:** Manage brands, categories, products, and user accounts.
- **Frontend:** View products, add to cart, and proceed with checkout.
- **SSLCommerz Integration:** Secure payment gateway for processing orders.

## Configuration

1. **SSLCommerz URL Configuration**  
   To ensure SSLCommerz integration works properly, you must update the following URL paths to reflect your local environment:

   - In `ssl/orderTransaction.php`, update the URL to match your project path:
     ```php
     $url = "http://localhost:8080/my-projects/backend/php/php-ecommerce/adminPanel/userCodeUpdate.php?code={$code}";
     ```
     Replace the above URL with the path to your own project directory.

   - In `ssl/config/config.php`, update the `PROJECT_PATH` constant:
     ```php
     define('PROJECT_PATH', 'http://localhost:8080/my-projects/backend/php/php-ecommerce/'); 
     ```
     Replace this value with your actual project path on your local machine.

## Dependencies
- jQuery for AJAX operations
- Bootstrap for responsive design
- SSLCommerz for payment gateway integration

## Contributing
Contributions are welcome! Fork the repository, make changes, and submit a pull request.

## Support
For any questions or support, please contact the author at mizancse2018@gmail.com.
