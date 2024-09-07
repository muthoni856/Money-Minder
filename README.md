# Money Minder
Overview
This project is an Expense Tracker application built using CodeIgniter 4 with an HMVC (Hierarchical Model View Controller) structure. The system allows users to manage their expenses, generate reports, and provides an admin interface for user management.

## Project Structure
**app/Controllers/**: Contains all the controllers responsible for handling user requests and business logic.

**ExpenseTrackerController.php**: Manages expense operations such as viewing, creating, and deleting expenses.

**LoginController.php**: Handles user authentication and session management.

**AdminController.php**: Manages admin functionalities, including viewing and deleting users.
app/Models/: Contains models that interact with the database.

**ExpenseModel.php**: Defines the database schema and validation rules for expenses.
UserModel.php: Defines the database schema and validation rules for users.
app/Views/: Contains view files for displaying data to the user.

**expense_tracker.php**: View for managing and viewing expenses.
login.php: Login page view.
admin_view.php: Admin interface for viewing and deleting users.
app/Database/Seeds/: Contains database seeders for populating the database with initial data.

**UserSeeder.php**: Seeds the database with sample users, including admins.

**app/Config/Routes.php**: Defines the routing for the application.

## Assumptions
- **User Roles**: Users with email domains ending in .moneyminder.com are automatically assigned the 'admin' role.
- **Authentication**: User authentication is handled via username and password. Passwords are hashed for security.
- **Database**: The database schema includes tables for users and expenses. Users can view and manage their own expenses, while admins can view and delete any users.

# Installation
**1. Clone the Repository**
```bash 
git clone https://github.com/muthoni856/Money-Minder.git
cd your-project-directory
```
**2. Install Dependancies**
Install the necessary PHP dependencies using Composer:
```bash
composer install
```
**3. Configure the Environment**

Copy the sample environment file and update the database configuration:
```bash
cp .env.example .env
```

**4.Migrate the Database**

Run the migrations to set up the database schema:
```bash
php spark migrate
```
**5. Seed the Database**

Seed the database with sample users:
```bash
php spark db:seed UserSeeders
```

Seed the database with sample expenses:
```bash
php spark db:seed ExpenseSeeder
```
### Running the Application
Start the local development server:
```bash
php spark serve
```
Visit http://localhost:8080 in your web browser to access the application.

## Routes
- **/**: Homepage (user dashboard).
- **/ login**: Login page.
- **/ admin**: Admin interface for managing users.
- **/ expense/report**: Expense report page showing graphical representation of expenses.

## Usage
- User Management
    - Users with the .moneyminder.com domain are automatically assigned admin privileges.
    - Admins can view all users and their details and delete users if necessary.
- Expense Management
    - Users can add, edit, view, and delete their expenses.
    - Expense reports are generated with graphical representations using Chart.js.

## Contributing
Contributions are welcome. Please submit a pull request or open an issue if you find any bugs or have suggestions for improvement.

## License

 This project is licensed under the MIT License. See the LICENSE file for details.   


# Codeigniter4 Starter

[![Official Website](https://img.shields.io/badge/Official_Website-Visit-yellow)](https://simpletine.com)  
[![YouTube Channel](https://img.shields.io/badge/YouTube_Channel-Subscribe-FF0000)](https://www.youtube.com/channel/UCRuDf31rPyyC2PUbsMG0vZw) 
 
### Prerequisites
1. PHP 7.4 or above
2. Composer required
2. CodeIgniter 4.4.8

### Installation Guide
For the guideline, see the [documentation](/INSTALLING.md) 

---

# MoneyMinder
>>>>>>> 9c7aa0685a3eacb2bf0e6d216544ee5598419f35
