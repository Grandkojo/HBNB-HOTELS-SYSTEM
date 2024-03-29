# HBNB Project

![HBNB Logo](readme_img/hbnb_logo.png)

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [Contributors](#contributors)
- [Bugs](#bugs)
- [Copyright](#copyright)
- [License](#license)

## Introduction

HBNB (HomeAway, Airbnb) Project is a web application for managing and booking rental properties. This project aims to provide a platform where users can explore, list, and book accommodations for short-term stays. <br>
- Check out our landing page: [https://grandkojo.github.io/HBNB-HOTELS-SYSTEM](https://grandkojo.github.io/HBNB-HOTELS-SYSTEM) <br>


## Features

- User authentication and authorization.
- Property listing and search functionality.
- Booking and reservation management.
- User reviews and ratings.
- Admin panel for managing listings and users.

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your-username/HBNB-HOTELS-SYSTEM.git

2. **Set up you web server:**
    - XAMMP would be preferred for this.

    - Navigating to the project directory:
    ```bash
    cd C:\xampp\htdocs\HBNB-HOTELS-SYSTEM

3. **Connect to the database:**
    - MySQL and Navicat was used for all database records. (phpmyadmin is also a good option)

    - All the configurations are in the config file:
    ```bash
    cd admin/config.php

4. **Important:**
    - The landing page: ```localhost/HBNB-HOTELS-MANAGEMENT-SYSTEM/index.php```<br><br>
    ![User landing page](readme_img/user%20landing%20page.png)<br><br>
    - The admin landing page: ```localhost/HBNB-HOTELS-MANAGEMENT-SYSTEM/admin/admin_page.php```<br><br>
    ![Admin landing page](readme_img/user%20landing%20page.png)<br><br>
    - The mail service $mailPassword is your special password for your gmail (it's allowed to send emails from your idea)
        - Create a file mailPassword.php in the root folder
    

You're good to go 🎉

## Usage

1. **User Registration:**
    - Users can register for an account to access the additional features
    
2. **Search and Booking:**
    - users can search for available properties based on their preferred location

## Project Structure

HBNB-HOTELS-MANAGEMENT-SYSTEM/<br>
|-- admin/<br>
|&emsp;   |-- modals/<br>
|&emsp;   |-- config.php<br>
|&emsp;   |-- user/<br>
|-- bootstrap/<br>
|-- hbnb_all_icons/<br>
|-- images/<br>
|-- scripts/<br>
|-- styles/<br>
|-- uploads/<br>
|-- roomTypes/<br>
|-- index.php<br>
|-- README.md<br>
|-- shared_modal.php<br>
|-- CONTRIBUTING.md<br>

## Technologies Used

- PHP (no framework)
- Navicat (tool for Database Administration (SQL))
- Bootstrap: Front-end framework for responsive web design
- Javascript: For making the app dynamic

## Contributing

Contributions are welcome 😊! 
Please follow the [contribution guidelines](CONTRIBUTING.md)

## Contributors
[Essien Ernest Kojo](https://github.com/Grandkojo)<br>
[Lynn Kamau](https://github.com/LynnKamau)

## Copyright
The logo <img src="readme_img/hbnb_logo.png" alt="HBNB logo" width="75" height="60" margin-top="15"> was from ©[ALX](https://www.alxafrica.com/)<br>
All credits due 😊.

## License

This project is licensed under the [MIT License](LICENSE).