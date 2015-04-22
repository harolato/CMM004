# Tasker


## How to test

Pull this repo to your computer and import latest sql dump to your database.
Sql dump is located in App/ directory

Example user accounts are:
ID: 5
PWD: kakaka

ID: 10
PWD: 123456

## available actions
/Users - Main user page
/Users/create - Create new user
/Users/logout - Terminate session
/Users/login  - Login

/Projects/index/(project_id) - Project main page

/Tasks/add/(project_id) - add new task to the project
/Tasks/remove/(task_id) - remove task
/Tasks/assign/(user_id) - assign task to user
/Tasks/unassign/(allocation_id) - unassign user from task
/Tasks/signOffTask/(task_id) - Mark tas as completed
/Tasks/writeNote/(allocation_id) - write a note for task

/Pages/display/burndown/(project_id) - display burndown chart for project

