# CodeOps_Forum

This assignment slash task is done by seven awesome dickheads.
The assignment was to make a forum which have a simple gui.
First thing first:


We managed to make a decent forum, where users can create posts and comment.
Users will either be a visitor or a logged in users who can post and comment on various categories.
Visitors can either post or comment. The Forum was made with security in mind (nææt).
The group choose the mvc model,(Model, view, controller) and a simple local DB. We do have some additional features for Admin. Admin can modify, delete and, which normal users can't.   



Installation Guide UNIX/LINUX  
---------
Prerequisites: 32-bit or 64-bit machine and IQ over 130 like Anders.
Higher or lower IQ then 130 will complicated the task, so be aware of this before starting

Download  from the original page :  https://www.apachefriends.org/index.html
1. Choose Download  for LINUX, if you have linux distro.
2. When you click download it will prompt the  file to download and it will
save it on the choosen folder(usually the download folder).
3. Change over to the directory where Xampp file was downloaded. (Example cd Downloads)
4. Make the file to be executable by running this command:
 chmod +x xampp-linux-x64-7.2.9-0-installer.run﻿
5. Now run the Installation command sudo ./xampp-linux-x64-7.2.9-0-installer.run
  you might be prompted to enter your password. Just type your password bruh--
6. A window will pop up with Xampp logo. Just follow the steps by clicking next
   three times and then finish.
7. After clicking finish on the installation window close the terminal.
8. Re-open a new terminal. got to this path: by typing these commands:
    cd /opt/lammp/ and enter : sudo ./manager-linux-x64.run or you can simply type:
    sudo cd /opt/lammp/lammp start. Both works well. You might be prompted to type your
    password.
9.  Click "manage servers" and you should see the mysql, apache and proftd. And
    they should be running, otherwise you should start all. NB! If you have a apache
    server running, you should stop it first with this command: "service apache2 stop"
10.  Now you can open your web browser and type either localhost/somefolder or
      127.0.0.1/somefolder.
11. Go to where you want to clone: example cd /opt/lampp/htdocs
12. You should now clone this repo: git clone https://github.com/zohaib194/CodeOps_Forum.git
13. Now revisit your web browser and type in: localhost/CodeOps_Forum. Our forum should appear now without DB.
14. Make sure to upload DB. Go to localhost/phpmyadmin. Click databases.
15. write in the name of database: CodeOps_database and click create.
16. click on the newly created database CodeOps_database
17. Now click import and then browse
18. Including Database by going to this path:  /opt/lampp/htdocs/database-files and upload the only file up.   
and click go.
19. Now go back

Installation guide Windows       
--------
Prerequisites: 32-bit or 64-bit machine and IQ over 130 like Anders.
Higher or lower IQ then 130 will complicated the task, so be aware of this before starting

Download  from the original page https://www.apachefriends.org/index.html
1. Choose Download  for Windows.
2. Double click the file to run the installer.
3. Click the OK button on the warning to continue
4. Click "Next" on the next three windows and leave everything to default.
5. clear the "Learn more about bitnami for XAMPP" and click next
6. Windows firell has blocked som features of apache http. A window
   will pop asking to give access, click "Allow access"
7. Click the finish button.
8. choose language
9. click save.
10. If you are having any issues with download XAMPP. Follow this slick guide with gui pictures: https://pureinfotech.com/install-xampp-windows-10/
11. Open XAMPP click on the XAMPP on your desktop and click "Start" on apache and mysql.
12. Now you can open your web browser and type either localhost/somefolder or
      127.0.0.1/somefolder
13. Go to where you want to clone: example C:\xampp\htdocs
14. You should now clone this repo: git clone https://github.com/zohaib194/CodeOps_Forum.git
15. Now revisit your web browser and type in: localhost/CodeOps_Forum. Our forum should appear now without DB.
16. Make sure to upload DB. Go to localhost/phpmyadmin. Click databases.
17.  Now click import and then browse
18. Go to where you saved the  then htdocs/database-files and upload the only file with a .sql extension. path: C:\xampp\htdocs\CodeOps_Forum\datafiles
19.




Authors
------
Zoihab B  
Anders B  
Jostein VH  
Daniel S  
Abdi  M  
Yobe  N  



Acknowledgements
--------
Hats off for RUNE hjelsvold. We managed to use some of his code from the course Database...  
Google/Stackoveflow for saving us from time to time(or basically all day all night).  
