# GAU E-Participation
CEN 424 Team Project

-------------

Instructions:

Run "admin.html" to see the the UI mock-up.

------------

Please setup a MySQL environment by importing sqa_v1.sql file
Change your host, port, username and password settings from /inc/config.php
In sqa_v1.sql, you will find sample student and manager data. Passwords are hashed with md5 but all the passwords are "123456".
In index.php file, (should open automatically if you have a proper PHP environment like XAMPP), The form on right is available for student data, the form on the left is available for managers.
We lack of front-end designs for this version for some places, therefore student login redirects to logged.php which gives user data on the screen, nothing special.
If you log-in using any manager's credentials, you are redirected to Admin page just because we have it ready. As soon as I receive the Manager UI, we will change it. Currently, we are redirected to admin page when we log in as any manager. In this screen, header and sidebar is seperated in different files and currently we can see the list of managers in our database and add new by clicking "Add" on top-right.
Also includes basic creation of petitions with the UI design. Login as student and click on create petition to create petitions.