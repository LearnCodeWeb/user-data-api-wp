# Get Data From API WP Plugin
This is test plugin which is used to fetch data from other endpoint and display in WP plugin.

# Composer & Manual Installation

1) You can install this plugin using composer use below command to install it.

`composer require learncodeweb/user-data-api-wp:dev-main`

2) There are two manual process listed below.

1. Zip upload directly
    
    a) Download the source  code from GitHub.    
    b) Go to the WP admin panel and find menu Plugin.    
    c) Click on Add New you will see the Upload Plugin on Top.    
    d) Click on the Upload Plugin and Choose the Zip file that you downloaded form GitHub and upload.
    e) After uploading activate the plugin and done.

2. You can install this plugin manually
    
    a) Download the source code from GitHub.
    b) Extract the files in any local folder.
    c) The inside folder of downloaded zip will be user-data-api-wp-main.
    d) Rename the inside folder user-data-api-wp-main to user-data-api-wp. [You just need to remove the last -main].
    e) Copy and paste folder into the plugins DIR the complete path of Plugin Dir is wp-content->Plugins->PASTE YOUR PLUGIN.


# The User API
This Plugin is depend on the other end point API data. For the set up you need to download the example code of User Data API. In this example you didn’t find the edit screen rest of the CURD Operations are available.

### SET UP
To setup on you localhost or Live Server you need to perform some actions listed below.

 1) Create a user table with the help of below Query.

```
CREATE TABLE tb_users (
  userid int(11) NOT NULL,
  username varchar(64) NOT NULL,
  email varchar(128) NOT NULL,
  status enum('active','inactive') NOT NULL,
  created timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
INSERT INTO tb_users (userid, username, email, status, created) VALUES
(1, 'Zaid Bin Khalid', 'zaid_bin_khalid@hotmail.co.uk', 'active', '2021-04-25 04:57:09'),
(2, 'Ahmad Khalid', 'ahmad@gmail.com', 'inactive', '2021-04-25 09:09:10'),
(3, 'Zohaib Khalid', 'zohaid@gmail.com', 'inactive', '2021-04-25 09:09:10');

ALTER TABLE tb_users
  ADD PRIMARY KEY (`userid`);
  
ALTER TABLE tb_users
  MODIFY userid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;
)
```

**User Data API Download link below.**
https://bitbucket.org/zaidbinkhalid/userapi/src/master/

In this example, the Database name is test after creating this table open the API files and change the connection.php file.
In this file you can define your database credentials, change the below mentioned variables as per your need.

```
// specify your own database credentials
private $host = "localhost";
private $db_name = "test";
private $username = "root";
private $password = "";
```

After that you need to change the .htdocs file. In this case I have a folder userapi which is mentioned in .htdocs you can change it as per you need.

```
RewriteEngine On
RewriteBase /userapi/
ErrorDocument 500 "{500 Internal Server Error}"
ErrorDocument 404 "{404 Page not found!}"
ErrorDocument 401 "{401 Unauthorized}"
ErrorDocument 403 "{403 Forbidden}"

RewriteRule ^users/([^/]*)$ /userapi/api.php?str=$1 [NC,L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
#removing space from url 
RewriteRule ^([^\s%20]*)(?:\s|%20)+(.*)$ $1$2 [L,R]
```

After, all the setup you can check your plugin that show users data form the mentioned database table.
**Remember:**
** This plugin is depend on other end point data. For that you need to download the running example form here. Or you can use your API end point to display data in the plugin.

This plugin is just for the test purpose if you want to use this you can that you.
