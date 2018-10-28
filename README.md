sf_plastic project
==================
This project is the second phase of an original one. It works like a proof of concept or prototype.

Please, focus on the code for prototype purpose:
* controllers/Formulas.php : original example controller for grocerycrud module. It must be cleaned to focus on our own prototype code.
* views/formulas.php : clean view
* config/database.php : setup the db
* plastic_sf.sql : DB, contains examples tables for grocery crud module and a formulas specific table for the prototype

This  prototype uses Grocery CRUD.

IMPORTANT TIPS
--------------
How to test Material check without the qrcode reader:

* Input in the Material Check pop up window textfield a JSON string following this format:
{"material_name":"原料A","material_id":"1","amount":"1500"}

If you want to generate a QR code you can follow next steps:

* Go to this web site: https://www.qr-code-generator.com/
* Go to Text tab
* Input the JSON string as described before:
{"material_name":"原料A","material_id":"1","amount":"1500"}
* Press Create button

Another important tip refer to scale output to be put into a file in the server. To do that you can use a Chrome extension for REST API test and develop or run a cURL command following this format:

curl -X PUT -d weight=1200 http://server_ip:port/scale/put_output (ex. curl -X PUT -d weight=1500 http://sf_plastic.test:8888/scale/put_output)
