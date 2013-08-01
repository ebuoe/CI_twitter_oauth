CI_twitter_oauth
================

TwitterOauth client developed by abraham williams , ported to Codeigniter by nwadiugwu chukwuebuka
----------------------------------------------------------------------------------------------------

Basic Intructions
=================

Copy the necessary folders to their locations :

1. <a href="https://github.com/abraham/twitteroauth">download</a> the twitteroauth folder and copy to the root location of your application .i.e. where the application and system folders are located
3. copy the twitteroauth folder and the images folder and place them in the root folder
2. copy the config.php in the ci_twitter_oauth root folder and place it in the twitteroauth folder.
3. obtain consumer secret code and comsumer key from twitter and update your config file
4. copy the files in the controller folder to your own controller folder. 
5.copy the files in the libraries folder to your own application/libraries folder , do the same for views

that is all , to test the app , load the application http://yourhost/your_root_folder/index


*all files prefixed with ci_twitter are core files , the rest are basically for testing*



Extended Intructions
=====================
if you have different applications you want to use the api for .. just open the index view file and 
copy  the javascript function in the <head></head> section paste it on the view file you want to use 

and also 

 copy the onclick="ci_twitter()" trigger in the image markup and paste it on the object taht is suppose to fire the event
 
 
 
 for further questions contact me @ nc.ebuka@gmail.com / @ebuoe .. twitter handle 
 
 
 #THE END
