# EduSync - System Management for Educational Institutions

![System Overview](/assets/img/Screenshot.png)

This repository contains the source code for EduSync, an integrated system management application built using PHP for educational institutions.


## Overview

Managing educational institutions efficiently requires a robust system that can handle various administrative tasks, from managing personnel to organizing events and handling academic modules. Our system management application, named EduSync, is designed to meet these needs by providing a comprehensive solution for educational institutions.

## Features

- **Teacher Management:** EduSync allows administrators to manage teacher profiles, qualifications, and schedules. With this module, schools can efficiently assign classes and manage workload distribution.

- **Principal Oversight:** The system provides tools for tracking and managing the activities and responsibilities of school principals. Principals can use EduSync to streamline decision-making processes and manage administrative tasks effectively.

- **Event Planning:** EduSync simplifies the process of planning, organizing, and managing school events. Administrators can schedule events, allocate resources, and manage participants, all within the system.

- **Leave Management:** Automate the process of leave application, approval, and tracking with EduSync. This module ensures transparency and efficiency in handling staff leaves, reducing administrative burden.

- **Role-Based Access Control (RBAC):** EduSync employs role-based access control to manage access to various system modules based on user roles. This ensures that sensitive information is accessible only to authorized personnel, enhancing data security.

- **Module Customization:** Each module in EduSync is customizable to fit the specific needs and policies of the institution. This flexibility ensures maximum utility and adaptability to diverse educational environments.

## Getting Started

These instructions will help you get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

To run EduSync you'll need the following:

- **Web Server:** Apache, Nginx, or any other web server capable of serving PHP files.
- **Database Server:** MySQL, MariaDB, or any other database server supported by PHP.
- **PHP:** Version 7.0 or higher.
- **Composer:** Dependency manager for PHP. You can install Composer from [getcomposer.org](https://getcomposer.org/).

### Installation

Follow these steps to install and run EduSync:

1. Clone the repository:
   git clone https://github.com/piyushparmar911/EduSync.git


2. Set up the database:

   - Create a new database in your preferred DBMS.
   - Import the SQL schema provided in `database.sql`.

3. Update database connection string:

   - Navigate to `Web.config` file.
   - Modify the `<connectionStrings>` section to include your database credentials.

4. Build and run the project using Visual Studio or any preferred development environment.
