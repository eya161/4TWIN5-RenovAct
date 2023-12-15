# Dorm Reservation system and Classes Mangement
## MicroMasters Team
Team Members:
Eya Araari - Actuality Management (MySQL Database)
Amine Ben Rjab -  Department Management (MySQL Database)
Skander Chouk - Room Management (MySQL Database)
Amani Thameur - University Management  (H2 Database)
Emna Abbessi - Bloc Management  (H2 Database)
Manar Gnichi - Dorm Management  (H2 Database)
Ahmed Ben Abid - Class Management  (MySQL Database)
## Project Overview
The project aims to develop a modular and scalable Dorm Reservation system and Classes mangement. The system comprises several services, each responsible for specific functionalities such as room reservation, room management, bloc management, dorm management, class management, department management, university management, actuality management and reservation of room management.

## Tasks
1. Actuality Management (Eya) - First MicroService:
Implementation of actuality management in a service using MySQL.
Development of features for adding with sending mail with content to whom you want to send, viewing, modifying, deleting actuality and searshing for actuality by their category.
Configuration of the service to interact efficiently with MySQL in the port 8085.
2. Department Management (Amine) - Second MicroService:
Implementation of department management in a service using MySQL.
Development of features for adding, viewing, modifying and deleting actuality.
Configuration of the service to interact efficiently with MySQL in the port 8082.
3. Room Management (Skander) - Third MicroService:
Implementation of room information management in a service using MySQL.
Development of features for adding, viewing, modifying, and deleting rooms.
Configuration of the service to interact efficiently with MySQL in the port 8083.
4. University Management (Amani) - Fourth MicroService:
Implementation of uiversity management in a service using H2.
Development of CRUD functionalities for universities.
Configuration of the service to interact efficiently with H2 in the port 8089.
5. Bloc Management (Emna) - Fifth MicroService:
Implementation of bloc management in a service using H2.
Development of CRUD functionalities for blocs.
Configuration of the service to interact efficiently with H2 in the port 8088.
6. Dorm Management (Manar) - sixth MicroService:
Implementation of dorm management in a service using H2.
Development of CRUD functionalities for dorms.
Configuration of the service to interact efficiently with H2 in the port 8084.
7. Class Management (Ahmed) - seventh MicroService:
Implementation of class management in a service using MySQL.
Development of CRUD functionalities for classes.
Configuration of the service to interact efficiently with MySQL in the port 8086.
9. Reservation Management (Team Effort) - eighth MicroService:
Implementation of a service reservation management using MongoDB for reservtion room.
Development of the service to provide CRUD functionnalities.
Configuration of the service to interact efficiently with MongoDB in the port 5000.

## Task Distribution
Eya: Actuality Management(Service one) - MySQL Database
Amine: Department Management (Service two) - MySQL Database
Skander: Room Management (Service three) - MySQL Database
Amani: University Management (Service four) - (H2 Database)
Emna: Bloc Management (Service five) - (H2 Database)
Manar: Dorm Management  (Service six) - (H2 Database)
Ahmed: Class Management  (Service seven) - MySQL Database
Team Effort: Reservation Management (Service eight) - MongoDB

API Gateway and Eureka
Deployment
All services are deployed in Docker container named 4TWIN5/RenovAct.

All the project is stocked in git.