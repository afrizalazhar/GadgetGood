
# Ecommerce

Ecommerce named as Gadget Good.


## Requirements:
This is an individual assignment. You are required to:
- Produce a precise textual description of the conceptual data model for your application. It may be accompanied by a graphical model as well, which often is helpful as an explanation.
- Create XML documents according to the scenario you have described. Write DTD documents which are used to validate your XML documents. Write XSLT that transforms XML documents into various presentations.
- Create a database according to the conceptual data model. The database may consist of the tables, stored procedures, views, indexes, triggers, and etc.
- Add security to your web application by implementing forms authentication and authorization.
- Demonstrate the usage of XML for communication and data exchange such as display content, reporting, connecting to other systems and etc. 
- Demonstrate database and information processing using client/server side technologies with some degree of complexity that meets the Level 3 requirements.

The e-commerce website must fulfill the following criteria; i.e. it should:
- Consist of 10 - 20 interlinked pages
- Provide quality content
- Provide appropriate navigation support
- Perform proper file organization and naming convention
- Provide suitable data validation
- Be viewable on multiple browsers and settings


## Interlinked Pages

#### Index

```http
  GET /index.php
```


#### Show product by category

```http
  GET /product_catalog.php?category=${category_id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `category_id`      | `integer` | **Required**. Id of item to fetch |

#### Detail Product

```http
  GET /detail_product.php?productID=${product_id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `product_id`      | `integer` | **Required**. Id of item to fetch |

#### Cart

```http
  GET /cart.php
```

#### User Order

```http
  GET /customer_order.php
```

#### User Profile

```http
  GET /profile.php
```

#### Iser Order

```http
  GET /customer_order.php
```

#### Admin

```http
  GET admin/index.php
```
```http
  GET admin/customer_orders.php
```
```http
  GET admin/products.php
```
```http
  GET admin/brands.php
```
```http
  GET admin/categories.php
```
```http
  GET admin/customers.php
```
## XML / DTD
XML has become one of the methods used to display data on the client, and some of the data displayed using XML are products, cart, and users. All data exchanges that use XML are stored in the XMLs folder

Each files in xmls folder has DTD for validating xml document.
For example in cart.xml
```
<?xml version="1.0"?>
<!DOCTYPE cart [ 
<!ELEMENT cart (products)>
<!ELEMENT products (product+)>
<!ELEMENT product (qty, product-id, product-category, product-brand, product-title, product-price, product-qty, product-desc, product-image, product-keywords)>
<!ELEMENT qty (#PCDATA)>
<!ELEMENT product-id (#PCDATA)>
<!ELEMENT product-category (#PCDATA)>
<!ELEMENT product-brand (#PCDATA)>
<!ELEMENT product-title (#PCDATA)>
<!ELEMENT product-price (#PCDATA)>
<!ELEMENT product-qty (#PCDATA)>
<!ELEMENT product-desc (#PCDATA)>
<!ELEMENT product-image (#PCDATA)>
<!ELEMENT product-keywords (#PCDATA)>
]>
```
## Installation
- Clone/download this project to your local web server.
- Import database in database folder to your mysql

Change data in config/constants.php with your own mysql configuration

```bash
  define('HOST', 'localhost');
  define('USER', 'mysql_user');
  define('PASSWORD', 'password');
  define('DATABASE_NAME', 'database_name');
```

Change data in config/environtment.php with your own local URL and currency (optional)

```bash
  define('BASE_URL', 'http://localhost/PROJECT_FOLDER');
  define('CURRENCY', '$');
```

#### Default USER

```bash
User:
email: user1@user.com
password: 123456789

Admin:
email: admin@admin.com
password: password
```