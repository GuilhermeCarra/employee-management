
# PHP BASIC APPLICATION TO MANAGE AN EMPLOYEES LIST


## Application main points

1. Login and logout with a json file as user storage
2. Controlled user session set to 10 minutes
3. Show data from a JSON in a JS Grid
4. Pagination of the data configured by the grid
5. Employees CRUD Create Read Delete and Update with a json file as employees storage
6. Employee page  with employee detail
7. External web service to get employees images
8. Employee avatar through web service images


### File structure
This file structure has a specific purpose.

````
assets/
css/
resources/
src/
 /library
````

* Assets contains images and plain HTML files.
* Css just CSS files.
* Resources folder contains users.json and employees.json
* Src folder contains PHP files which contain HTML or JS
* Src/library folder contains PHP files that contain just PHP


```
index.php // which is the entry point of the application. The login view
employeeController.php // file which has JUST the php code to handle employees request
employeeManager.php // this file contains a list of methods that manipulate employees entries

loginController.php // file that handle all HTTP request of login things
loginManager.php // this file contains a list of methods that handle login validation and log out

sessionHelper.php // code to check if the user session has expired (10 minutes per session).
```

## External libraries

All them must be installed with the npm here you have a package.json take a look please.

* [Bootstrap](https://getbootstrap.com/)
* [Bootstrap icons](https://icons.getbootstrap.com/)
* [JSGrid](http://js-grid.com/)

## Images Web Service for Employees avatars

For employees avatars this application uses [this images api](https://uifaces.co/).


This web service in the version free that is which we are going to use has limitations. It is **5 requests** per minute or **30 requests** in one hour.

[Read the doc!](https://uifaces.co/api-docs)
