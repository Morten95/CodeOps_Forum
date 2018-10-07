# CodeOps_Forum

The assignment was to make a forum which has a simple GUI.

We have made a forum in which users can create topics and post replies to these topics and as well write comments.
Users will either be a visitor or logged in as a user. Visitors can only see the forum but are not able to post or comment. The Forum was made with security in mind.
The group choose the mvc model,(Model, view, controller) and a simple local DB. We do have some additional features for Admin. Admin can delete posts, topics and comments.  



Installation Guide UNIX/LINUX  
---------
Prerequisites: 32-bit or 64-bit machine

Download  XAMPP from the page :  https://www.apachefriends.org/index.html
1. Choose Download  for LINUX.
2. When you click download it will prompt the file to download and it will
save it on the choosen folder(usually the download folder).
3. Change over to the directory where xampp file was downloaded. (Example `cd Downloads`)
4. Make the file executable by running this command:
 `chmod +x xampp-linux-x64-7.2.9-0-installer.run`
5. Now run the Installation command `sudo ./xampp-linux-x64-7.2.9-0-installer.run`
  you might be prompted to enter your password.
6. A window will pop up with xampp logo. Just follow the steps by clicking next
   three times and then finish.
7. After clicking finish on the installation window close the terminal.
8. Re-open a new terminal. got to this path: by typing these commands:
    `cd /opt/lampp/` and enter: `sudo ./manager-linux-x64.run` or you can simply type:
    `sudo cd /opt/lampp/lampp start`. Both works well. You might be prompted to type your
    password here as well.
9.  Click "manage servers" and you should see the mysql, apache and proftd. And they should be running, otherwise you should start all. NB! If you have a apache server running, you should stop it first with this command: `service apache2 stop`
10.  Now you can open your web browser and type either `localhost/somefolder` or
      `127.0.0.1/somefolder`.
11. Go to where you want to clone: `cd /opt/lampp/htdocs`
12. You should now clone this repo: `git clone https://github.com/zohaib194/CodeOps_Forum.git`
13. Now revisit your web browser and type in: `localhost/CodeOps_Forum`. Our forum should appear now without a database.
14. Make sure to upload database. Go to `localhost/phpmyadmin`. Click databases.
15. Write in the name of the database: `CodeOps_database` and click create.
16. Click on the newly created database CodeOps_database
17. Now click import and then browse
18. Include database by going to this path:  `/opt/lampp/htdocs/database-files` and upload the only file up.   
and click go.
19. Now you can go to your webbrowser and write `localhost/CodeOps_Forum`, and the forum should appear with a database.


Installation Guide Windows       
---------
Prerequisites: 32-bit or 64-bit machine

Download  XAMPP from the ´https://www.apachefriends.org/index.html´

1. Choose Download  for Windows.
2. Double click the file to run the installer.
3. Click the OK button on the warning to continue
4. Click `Next` on the next three windows and leave everything to default.
5. clear the "Learn more about bitnami for XAMPP" and click next
6. Windows firewall has blocked some features of apache http. A window
   will pop asking to give access, click `Allow access`
7. Click the finish button.
8. Choose language
9. Click save.
10. If you are having any issues with download XAMPP. Follow this guide: `https://pureinfotech.com/install-xampp-windows-10/`
11. Open XAMPP click on XAMPP on your desktop and click "Start" on apache and mysql.
12. Now you can open your web browser and type either `localhost/somefolder` or
      `127.0.0.1/somefolder`
13. Go to where you want to clone: `C:\xampp\htdocs`
14. You should now clone this repo: `git clone https://github.com/zohaib194/CodeOps_Forum.git`
15. Now revisit your web browser and type in: `localhost/CodeOps_Forum`. Our forum should appear now without DB.
16. Make sure to upload DB. Go to `localhost/phpmyadmin`. Click databases.
17.  Now click import and then browse
18. Go to where you saved the database then `htdocs/database-files` and upload the only file with a .sql extension. path: `C:\xampp\htdocs\CodeOps_Forum\datafiles`
19. Go to `localhost/CodeOps_Forum`, and the forum will appear.




Authors
------
  Zohaib Butt  
  Anders Bjørklund Jensen     
  Jostein VH  
  Daniel EKS    
  Abdi M  
  Yobe Najar  
  Morten Bjerke



Acknowledgements
--------
Google/Stackoveflow for saving us from time to time(or basically all day all night).  
