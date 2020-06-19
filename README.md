# _todolist_
      todolist_supinfo
      2PHPD PROJECT
      288134 LuBolun 288139 NingYifan 288148 ZhangRuilin 
      Technical Document
## 1.	overview
      Frame: Laravel
      Database: Mysql
      Frontend: css bootstrap
      Backend: php
## 2.  create the database
      By using the mysql,created four tables,including the user table,friend table,todolist table and homepage table.
### (1)as for the user table:we put the information like username,password,email and id of the users onto it.
### (2)for the friend table:we put the information like name and friend onto it.
### (3)for the todolist table:we put the item,static,homeid onto it.
### (4)for the homepage table:we put the name,doing,status and sharing onto it.
## 3.  function manual
### (1)the login page:
#### ①login:login with the username ,password and email ,matching with the data of the database.
#### ②regist:create you account ,which will be put into the database.
### (2)login to the homepage:
      there are many actions in the todolist including 
#### ①adding the item(list ,status ,creater ,sharer ,action)
#### ②logout:logout and return on the login page.
### (3)todolist:
#### ①adding the concrete item:
      from which we can list the all of the items(doing,done,deleted)
#### ②the friend system:
      we can look up the other users by the name or email to add friends,delete friends and share the status with your friends.
## 4. changeable theme
      we can choose from the dark and light theme whatever we like.
