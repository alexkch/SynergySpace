-- -*- mode:sql -*-

DROP SCHEMA IF EXISTS synergy CASCADE;
CREATE SCHEMA synergy;
SET search_path TO synergy;


CREATE TABLE users (
  username varchar PRIMARY KEY NOT NULL,
  password varchar NOT NULL,
  name varchar NOT NULL,
  email varchar NOT NULL,
  type varchar(6) NOT NULL,
  occupation varchar,
  birthdate varchar(10),
  gender varchar,
  homeaddress varchar,
  phonenumber varchar,
  UNIQUE (username, password),
  UNIQUE (email)  
) ;

CREATE TABLE building (
  b_id integer PRIMARY KEY,
  n_id varchar NOT NULL,
  address varchar NOT NULL,
  city varchar NOT NULL,
  country varchar NOT NULL,
  capacity integer NOT NULL,
  worknumber varchar NOT NULL,
  UNIQUE (address, city, country) 
) ;

CREATE TABLE feedback (
  f_id integer PRIMARY KEY,
  b_id integer NOT NULL REFERENCES building,
  subject varchar NOT NULL,
  rater varchar NOT NULL,
  feedback_rating integer NOT NULL,
  comments varchar NOT NULL,
  FOREIGN KEY (b_id) REFERENCES building,
  FOREIGN KEY (subject) REFERENCES users(username),
  FOREIGN KEY (rater) REFERENCES users(username) 
) ;

CREATE TABLE buildingrating (
  r_id integer PRIMARY KEY,
  b_id integer NOT NULL,
  username varchar NOT NULL,  
  building_rating integer NOT NULL,
  comments varchar NOT NULL,
  FOREIGN KEY (b_id) REFERENCES building,
  FOREIGN KEY (username) REFERENCES users
) ;

CREATE TABLE network (
  n_id integer NOT NULL,
  username varchar NOT NULL REFERENCES users, 
  PRIMARY KEY (n_id, username)
) ;

CREATE TABLE owns (
  owner varchar NOT NULL REFERENCES users,
  b_id integer NOT NULL REFERENCES building,
  PRIMARY KEY (owner, b_id)
) ;

CREATE TABLE renting (
  tenant varchar NOT NULL REFERENCES users,
  b_id integer NOT NULL REFERENCES building,
  PRIMARY KEY (tenant, b_id)
) ;

CREATE TABLE listed (
  b_id integer NOT NULL REFERENCES building,
  owner varchar NOT NULL REFERENCES users,
  startprice integer NOT NULL,
  termlength integer NOT NULL,
  PRIMARY KEY (b_id, owner)
) ;


