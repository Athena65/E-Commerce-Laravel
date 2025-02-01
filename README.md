# **E-Commerce Laravel**

This project is a feature-rich e-commerce platform built with Laravel, offering a comprehensive admin panel for efficient management.

---

## **Features**

- **User Authentication**: Secure user registration and login functionalities.
- **Product Management**: Admins can add, edit, and delete products with detailed descriptions and images.
- **Category Management**: Organize products into categories for easy navigation.
- **Shopping Cart**: Users can add products to the cart and proceed to checkout.
- **Order Management**: Track and manage customer orders efficiently.
- **Responsive Design**: Optimized for various devices to ensure a seamless user experience.

---

## **Installation**

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Athena65/E-Commerce-Laravel.git
   cd E-Commerce-Laravel
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**:
   - Duplicate the `.env.example` file and rename the copy to `.env`.
   - Set your database credentials and other environment variables in the `.env` file.

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seed Database**:
   ```bash
   php artisan migrate --seed
   ```

6. **Compile Assets**:
   ```bash
   npm run dev
   ```

7. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

---

## **Usage**

- **Access the Application**:
  - Navigate to `http://localhost:8000` in your browser.

- **Admin Panel**:
  - Access the admin panel at `http://localhost:8000/admin`.
  - Use the default admin credentials:
    - **Email**: admin@example.com
    - **Password**: password

- **User Registration**:
  - Users can register for a new account or log in with existing credentials.

- **Product Browsing**:
  - Browse products by categories, add them to the cart, and proceed to checkout.

---
## **Contributing**

We welcome contributions to enhance this project. To contribute:

1. **Fork the Repository**: Click on the 'Fork' button at the top right of this page.
2. **Clone Your Fork**:
   ```bash
   git clone https://github.com/your-username/E-Commerce-Laravel.git
   cd E-Commerce-Laravel
   ```
3. **Create a New Branch**:
   ```bash
   git checkout -b feature/your-feature-name
   ```
4. **Make Your Changes**: Implement your feature or fix.
5. **Commit Your Changes**:
   ```bash
   git commit -m 'Add some feature'
   ```
6. **Push to Your Branch**:
   ```bash
   git push origin feature/your-feature-name
   ```
7. **Open a Pull Request**: Navigate to the original repository and click on 'New Pull Request'.
