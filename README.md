Task Management Application

This project is an application to manage tasks. Users can:
	•	View a list of tasks.
	•	Add new tasks.
	•	Edit tasks.
	•	Delete tasks.
	•	Mark tasks as completed or in-progress.

Features

Authentication: Users can sign up, log in, and log out.
Task Management:
	•	Create tasks with a title and description , status and due date.
	•	View tasks with their title, description, status and due date.
	•	Edit tasks.
	•	Delete tasks
Task Status: 
      • Tasks can be marked as "in-progress" or "completed".
Pagination:
      • Tasks are paginated to avoid displaying too many tasks on one page.
Validation 
      •  Proper validation is in place to ensure that the task's title and description are not empty.


Installation and Setup

1 - Download the ZIP file or clone the repository.
 2- Navigate to the Project Directory: cd task-manager
 3 - Install Dependencies : composer install 
4 - Create the .env File: Copy the .env.example file and rename it to .env
 5- Generate the Application Key: php artisan key:generate 
6 - Create a Database locally
7 - Run database migrations : php artisan migrate
8 - Seed the Database : php artisan db:seed
9 - Start the Application: php artisan serve 
10 - Open your browser and access the application  -  http://127.0.0.1:8000

Configuration

1 - Update .env with Database Credentials


How the Application Works
Authentication
	•	Users need to log in to access tasks.
	•	New users can sign up.

Task Management
	•	Task Management: Users can create, view, update, and delete tasks. Tasks can also be marked as "in-progress" or "completed".
	•	Users can see the in-progress tasks, completed tasks, users with in-progress tasks, and overdue tasks
	•	User Management: User can view, create, edit, and delete users


