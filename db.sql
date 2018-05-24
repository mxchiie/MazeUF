CREATE DATABASE lan;
USE lan;

CREATE TABLE users(
	user_id int(8) PRIMARY KEY AUTO_INCREMENT,
	user_mail varchar(64) UNIQUE,
	user_nickname varchar(32) UNIQUE,
	user_real_name varchar(64),
	user_birthdate varchar(32),
	user_password varchar(32)
);

CREATE TABLE lans(
	lan_id int(8) PRIMARY KEY AUTO_INCREMENT,
	lan_name varchar(64),
	lan_place varchar(64),
	lan_address varchar(64),
	lan_start_date varchar(32),
	lan_end_date varchar(32)
);

CREATE TABLE tables(
	table_id int(8) PRIMARY KEY AUTO_INCREMENT,
	table_lan_id int(8),
	table_price int(8),
	FOREIGN KEY (table_lan_id) REFERENCES lans(lan_id)
);

CREATE TABLE chairs(
	chair_id int(8) PRIMARY KEY AUTO_INCREMENT,
	chair_table_id int(8),
	chair_status enum("BOOKED","NOT BOOKED") DEFAULT "NOT BOOKED",
	FOREIGN KEY (chair_table_id) REFERENCES tables(table_id)
);

CREATE TABLE bookings(
	booking_id int(8) PRIMARY KEY AUTO_INCREMENT,
	booking_user_id int(8),
	booking_chair_id int(8),
	booking_status enum("BETALD","EJ BETALD") DEFAULT "EJ BETALD",
	FOREIGN KEY (booking_chair_id) REFERENCES chairs(chair_id),
	FOREIGN KEY (booking_user_id) REFERENCES users(user_id)
);

CREATE TABLE news(
	news_id int(8) PRIMARY KEY AUTO_INCREMENT,
	news_lan int(8),
	news_user varchar(10),
	news_title varchar(10),
	news_date timestamp DEFAULT CURRENT_TIMESTAMP,
	news_content text(800),
	FOREIGN KEY (news_lan) REFERENCES lans(lan_id)
);