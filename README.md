Final-Year-Project
==================

University dissertation of Ali Zia, code and report.

This project was about revamping an ecommerce website for my current employer, and includes an admin and customer-facing interface.

The project was built using CodeIgniter, along with jQuery and Twitter Bootstrap to provide a better UI. I'm planning to move it to work with Laravel, which is a framework I've started to learn, and adding my own customizations to Bootstrap to better represent the company.

Have a read through my dissertation report, where I go through the process of proposing my project, gather requirements, stating my approach, carrying it through, and testing. Hope you enjoy!

The highlights for me in this project:

Using the MVC structural pattern to lay out the code
Carrying out a requirements elicitation phase and following through with it (i.e. building something the client asked for/needs)
Black box testing the application as much as possible. A table is present in the appendix showing the tested functionality, expected results and actual results.
Working with the active records pattern to query the database. Editing a record in the database was a bit of a hassle as I created a generic product attributes table to hold unique product details for different categories (see edit_* functions in app/models/admin_model if your interested). The database needs to be modified to allow inserts/updates to be more modular instead of having to add new attributes in the code manually.
To provide a better user experience for the administrator, I made an AJAX function that queries the database to check if a product already exists, and if it does then inform the user so they won't be troubled with a form reload/error. The life cycle for the function is from app/views/add_page -> app/controllers/admin/checkAvailability -> app/models/admin_model/checkTitleAvailability, and then reverse order :).
Working with various built in classes and helpers in CodeIgniter. Even though the framework is getting a bit outdated, it is still in my opinion the best for beginners for getting started with OOPHP. I used many classes and helpers offered by CI throughout the application (form validation, uri, file uploader, input, cart, session, pagination and security).
