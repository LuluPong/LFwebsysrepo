Lab 6

___________________________________
Individual Lab
___________________________________

/For this lab we created a calculator web application using PHP/

Creating the interfaces and classes wasn't to difficult; however, I ran into SEVERAL issues trying to pass form data to my php file. I used GET and POST and was unseccessful with BOTH methods. 

**I was able to resolve the above issue by adding the name attribute to most of the child tags within the form tag.**

Once I was able to do this, creating the functions and testing them went smoothly. I added a few basic designs such using Bootsrap CSS. I embedded the form within a card and used form and input groups to change the styles of the input boxes. I added a generic gradient using regular CSS so that the page would not be all white. My biggest issue with styling was centering the PHP echo output. I tried using p tags and bootstrap properties within these tags but that did not work. My final result is an akwardly placed answer for the user's calculation. I wanted to utilize AJAX to run the php script on the same page but had some difficulty implementing it. I tried using an empty action attribute for the form but found no success there. 

In terms of validation, I set the typable input tags types to numbers so that text could not be included. I did have a quite a few issues checking for empty variables in my php code. I tried using isset, empty, and ! to check for empty vaariables but none of them returned the output that I wanted. 
