There are five tables
tbl_users   : This table saves all the details of the users like username, password,name phone etc.
tbl_pizzas  : This table saves all the details of the pizzas like pizza name, size, price etc.
tbl_toppings: This table saves all the details of the toppings like topping name and price.
tbl_order   : This table has one row for each of the order placed in the system with user id of the user who ordered and the timings.
tbl_orderitems: This table contains multiple rows for each order with one row for each of the items that was ordered.

There are two sections, one for user and one for home respectively.
All the user related files are in the base folder and all the admin related files are in the admin folder.

There is file called DataAccessLayer.php for both the user panel and the admin panel. It has the database connection details and the functions to save and retrive data from the database. All the other php pages call the functions inside this file to access the database. 

There are header and footer files for both the admin and user panels which contains the menu and title etc.
There are two diffent header and footer files one for menu before login and one for menu after login.

app-login-header.php   : User panel header before login
app-login-footer.php   : User panel footer before login
app-header.php         : User panel header after login
app-footer.php         : User panel footer after login
admin-login-header.php : Admin panel header before login
admin-login-footer.php : Admin panel footer before login
admin-header.php       : Admin panel header after login
admin-footer.php       : Admin panel footer after login

A new user can be added by using the register.php in the user panel or the add-user.php page in the admin panel.
Both these pages call the addUser function in the data access layer to add the new user details to the database.

There is login page in both the user and admin panel which call the userLogin and adminLogin function in the data access layer, and in case of successful login sets the session with the user id. All the other inner secured pages check for the session variable and if it is null then sends the user to login page.


There is logout page in both the user and admin panel which destroys the session so that the logged out user cannot access the inner secured pages.

There is a page to view the user details in both user and admin panel as my-account.php and view-user.php which call getUserDetails function in DataAccessLayer to get the user details using user id.

There is a page to edit user details in both user and admin panel as edit-account.php and edit-user.php which call editUserDetails function in DataAccessLayer to edit the user details in the database.

There is a page to create order called order-online.php in user panel. It calls the addOrder and addOrderItem function in DataAccessLayer to insert the order and all the ordered items in the database.

There is page to see all past orders called my-orders.php in the user panel. It calls the getUserOrders function in DataAccessLayer to get the list of all the orders made by the user using his user id. User can see the details of each of the order by clicking View Order and it will call getOrderItems function in DataAccessLayer to get all the ordered items using the order id of the order.

There are pages to add pizzas and toppings in the admin panel which calls the addPizza and addTopping functions in the DataAccessLayer to insert the new item details into the databaase.

There are pages which lists all the pizzas and toppings in the admin panel which calls the getPizzas and getToppoings functions in the DataAccessLayer to get all the pizzas and toppings in the DataAccessLayer. User can view the details of each of the items by clicking the view pizza or view topping. This will call the getPizzaDetails and getToppingDetails in the DataAccessLayer to get the details of pizza or the topping from the database. User can click on the edit pizza or edit topping button to edit the item details. This will call the editPizzaDetails and editToppingDetails function in the DataAccessLayer to edit the details of the pizza or the topping in the database. The user can also delete the item by clicking Delete and this will call the deletePizza and the deleteTopping function in the data access layer to delete the same from database.

There is page to list all the users in the admin panel. It calls the getUsers function in the DataAccessLayer to get all the users present in the database. Admin can enable or disable the users by clicking the Enable or Disable button which will call the enableUser or the disableUser function in the DataAccessLayer and change the status of the user in the database.

These is page to list all the current order and the past orders in admin panel. It calls the getCurrentOrders and getPastOrders function in the DataAccessLayer to get all the current and past orders from the database. Admin can see the details of each of the order by clicking View Order and it will call getOrderItems function in DataAccessLayer to get all the ordered items using the order id of the order. Current orders page has option to change status of order from order to prepared and from prepared to delivered. It calls the updateOrderPrepared and updateOrderDelivered in the DataAccessLayer to change the status of the order in the database.

There are three reports available in the admin panel to see Most Ordered Items, Most Ordered Days and Average Order Processing Time. These call getMostOrderedItems, getMostOrderedDays and getAvgTime functions in the DataAccessLayer to retrieve the metrics from previous orders present in the database.