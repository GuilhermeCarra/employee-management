CREATE DATABASE IF NOT EXISTS employeesv4 CHARACTER SET utf8;

USE employeesv4;

CREATE TABLE IF NOT EXISTS user 
   (
      userId int AUTO_INCREMENT PRIMARY KEY NOT NULL, 
      name varchar(50) NOT NULL, 
      password varchar(255) NOT NULL,
      email varchar(50) NOT NULL
   );

INSERT INTO user(name, password, email) VALUES
   ("admin", "$2y$10$nuh1LEwFt7Q2\/wz9\/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC","admin@assemblerschool.com");

CREATE TABLE IF NOT EXISTS employees
   (
      id int AUTO_INCREMENT PRIMARY KEY NOT NULL, 
      name varchar(50) NOT NULL, 
      lastName varchar(50), 
      age int NOT NULL,
      city varchar(50) NOT NULL,
      email varchar(50) NOT NULL,
      gender varchar(10),
      phoneNumber varchar(20) NOT NULL,
      postalCode int NOT NULL,
      state varchar(3) NOT NULL,
      streetAddress varchar(100) NOT NULL,
      img varchar(255)
   );

INSERT INTO employees(name,lastName,age,city,email,gender,phoneNumber,postalCode,state,streetAddress,img) VALUES 
   ('Rack','Lei',25,'San Jone','jackon@network.com','man','1283645645',394221,'CA','Main 126','https://images.unsplash.com/photo-1534385842125-8c9ad0bd123c?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ'),
   ('John','Doe',34,'New York','jhondoe@foo.com','man','1283645645',09889,'WA','sss 89','https://uifaces.co/our-content/donated/-Yy7ndKG.jpg'),
   ('Richardd','Desmond',30,'Salt lake city','dismond@foo.com','man','9087698765',457320,'UT','Main 90',NULL),
   ('Susanna','Smith',28,'Louisville','susanmith@baz.com','woman','224355488976',445321,'KNT','Main 43','https://m.media-amazon.com/images/M/MV5BMTY1NzA4NDgwN15BMl5BanBnXkFtZTcwOTUyODM0Nw@@._V1_UX172_CR0,0,172,256_AL_.jpg'),
   ('Brad','Simpson',40,'Atlanta','brad@foo.com','man','6854634522',394221,'GEO','st 128','https://images-na.ssl-images-amazon.com/images/M/MV5BMTM0ODU5Nzk2OV5BMl5BanBnXkFtZTcwMzI2ODgyNQ@@._V1_UY256_CR4,0,172,256_AL_.jpg'),
   ('Neil','Walker',42,'Nashville','walkerneil@baz.com','man','45372788192',90143,'TN','1',NULL),
   ('Robert','Thomson',24,'New Orleans','jackon@network.com','man','91232876454',63281,'LU','Main 126',NULL),
   ('RackG','Rack',23,'Barc','h@h.com','man','987987987',123123,'qwe','asdasd 12','https://i.imgur.com/qF2JiTo.jpg');
