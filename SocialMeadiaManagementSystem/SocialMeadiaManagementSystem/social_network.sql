create database social_network;
use social_network;
CREATE TABLE users(
  f_name VARCHAR(20) NOT NULL,
  l_name VARCHAR(20),
  user_id INT NOT NULL auto_increment,
  describe_user VARCHAR(255),
  user_pass VARCHAR(255),
  user_email VARCHAR(25) NOT NULL,
  user_country CHAR(100),
  Ph_no CHAR(10) NOT NULL,
  Pass_word VARCHAR(20) NOT NULL,
  Address VARCHAR(20),
  user_birthday DATE NOT NULL,
  user_cover VARCHAR(255),
  user_image VARCHAR(255),
  user_reg_date timestamp,
  status CHAR(100),
  posts CHAR(100),
  recovery_account VARCHAR(255),
  user_gender CHAR(10),
  PRIMARY KEY(User_ID)
);
use social_network;
select *  from users;