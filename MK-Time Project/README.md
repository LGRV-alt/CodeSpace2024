# MK Time - Project

MKTIME is a prestigious retailer based in Scotland, specialising in the sale of high-quality Swiss watches. With a reputation for excellence and a commitment to providing customers with a curated selection of luxury timepieces, MKTIME aims to expand its reach through the development of a sophisticated eCommerce web application.

## User Pages

### Login

Users can create accounts and the information is stored in the MySQL database which is then checked when logging in to ensure the user account exists.
![User Login Screenshot](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/User-Login.png)

### Homepage

The homepage shows the full product range that has been entered onto the site, the user can click on any product to show more information or add the product to their cart.
![User Home Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Home-Page.png)

### Search Function

Within the nav bar there is a search function includes, this takes an input and checks it against products titles and descriptions. Once entered the page will redirect to a new page displaying any products that matched the search.
![User Search Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Search-Page.png)

### Individual Product

When clicking to view a product the user is redirected to a new page rendered based on a products ID from the database. From here the user can see more detailed information about the product and add it to their cart.
![Product Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Product-Page.png)

### Cart Page

The user can navigate to the cart from the nav bar where the number value changes based on the amount of items placed within the cart. From here the user would be able to check out their order, or empty the cart if they have changed their mind.
![Cart Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Cart-Page.png)

### Checkout

Once the order is complete the user can click the checkout button, this stores the order number and total in the database and asigns all the items in the order a place in the order_content table in the database
![Checkout Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/checkout.png)

## Admin Pages

### Homepage

Once logged in the admin has a similar homepage with some slight changes to show the are logged in as the admin, such as - Navbar has extra functions that can be carried out to maintain the current stock and the information stored within the database. The title also shows they are logged in as the admin.
![Admin mainpage](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Admin-Main.png)

### Create

The admin can create new items from the page rather than using the database tools.
![Admin mainpage](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Admin-Create.png)

### Product

When on the product page the admin can delete and update the records
![Admin Product Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Admin-Product.png)

### Update Product

The products can be updated from the website, the current information is passed as a placeholder when on the update page, this allows the user to see the old information.
![Admin Product Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/Admin-Update.png)

## MySQL database

## Overview of tables

This shows the database data when a simple order has been added to a cart and checked out
![Database Page](https://github.com/LGRV-alt/CodeSpace2024/blob/main/MK-Time%20Project/Images/database.png)
