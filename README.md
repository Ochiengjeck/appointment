
# Open Source lecturer Appointment Booking System using PHP

This initiative facilitates online appointment requests for clients seeking to book sessions with lecturers. This appointment booking system will organize the schedules of each lecturer's appointments, which will be submitted as a request by the clients. The system comprises three key roles: administrator, lecturer, and client. The system admin will populate the list of lecturers along with their specialties and details. Clients can browse the appointment system website to find a lecturer that matches their needs. They can review the lecturers' weekly schedules, enabling them to select a suitable day and time for their appointment. Subsequently, they can submit their appointment request. After that, lecturers can view all their appointments and the requests from clients regarding their availability.


## Features

### Admin
  
- Admin can add lecturers, edit lecturers, delete lecturers    
- Schedule new lecturers sessions, remove sessions   
- View clients details    
- View booking of clients    
    
    
 
 
### lecturers

- View their Appointment
- View their scheduled sessions
- View details of clients
- Delete account    
- Eedit account settings
    

    
### Clients(Clients, Parents, Guardians etc)
  
  - Make appointment online
  - Create accounts themslves
  - View their old booking
  - Delete account
  - Edit account settings    

    
| Admin Dashboard | lecturer Dashboard | client Dashboard |
| -------| -------| -------|
| Email: `admin@appointment.com` | Email: `lecturer@appointment.com` |   Email: `client@appointment.com` | 
| Password: `123` |  Password: `123` |  Password: `123` |


 
  
-----------------------------------------------


# GET STARTED

1. Open your XAMPP Control Panel and start Apache and MySQL.
2. Extract the downloaded source code zip file.
3. Copy the extracted source code folder and paste it into the XAMPP's "htdocs" directory.
4. Browse the PHPMyAdmin in a browser. i.e. http://localhost/phpmyadmin
5. Create a new database naming `appointment`.
6. Import the provided SQL file. The file is known as SQL_Database.sql located inside the source code root folder.
7. Browse the lecturer's Appointment Systsem in a browser. i.e. http://localhost/appointment/.


## Screenshots

![](https://github.com/Ochiengjeck/appointment/blob/main/screenshots/appointment.jpeg)

# The Project was developed using the following:

Apache Version: 	`2.4.39`

PHP Version: 		`7.3.5`

Server Software: 	`Apache/2.4.39 (Win64) PHP/7.3.5`

MySQL Version: 		`5.7.26`
