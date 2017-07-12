#PACKAGE TITLE
XMLDigest

#Framework Used
Laravel 5.4

#LOCATION
packages/eonxml/xmldigest
 
#Dependencies
Check the package composer.json and as of now it relies on the Laravel framework core

#Assumptions
1. edit the .env file according to your server credentials
2. The file XML file looks the same with the test provided file
3. APP_URL is set correctly depending on your server esle localhost:8000 as per Laravel


#USAGE
1. clone the repo to your server
2. create a database with a name matching the .env settings else name it eon_xml
3. On CLI cd to the project root and run the artisan command 'php artisan vendor:publish' to make sure that the migrations will be successfull
4. run migrations 'php artisan migrate' and the table required for the package will be created
5. Once all is done navigate to the home page of your app
6. Now click the XML Parser Reader link on the Top left of the nav bar
7. a new interface of the package will be loaded
8. select your xml file with the format given on the coding test
9. select and upload




