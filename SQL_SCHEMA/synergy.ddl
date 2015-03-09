-- -*- mode:sql -*-

DROP SCHEMA IF EXISTS synergy;
CREATE SCHEMA synergy;
SET search_path TO synergy;


CREATE TABLE users (
  u_id integer PRIMARY KEY,
  username varchar NOT NULL,
  password varchar NOT NULL,
  name varchar NOT NULL,
  email varchar NOT NULL,
  type char NOT NULL,
  occupation varchar NOT NULL,
  birthdate varchar NOT NULL,
  gender varchar NOT NULL,
  homeaddress varchar NOT NULL,
  phonenumber varchar NOT NULL,
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
  b_id integer NOT NULL REFERENCES people,
  subject integer NOT NULL,
  rater integer NOT NULL,
  feedback_rating integer NOT NULL,
  comments varchar NOT NULL,
  FOREIGN KEY (b_id) REFERENCES building,
  FOREIGN KEY (subject) REFERENCES user(u_id),
  FOREIGN KEY (rater) REFERENCES user(u_id) 
) ;

CREATE TABLE buildingrating (
  r_id integer PRIMARY KEY,
  b_id integer NOT NULL,
  u_id varchar NOT NULL,  
  building_rating integer NOT NULL,
  comments varchar NOT NULL,
  FOREIGN KEY (b_id) REFERENCES building,
  FOREIGN KEY (u_id) REFERENCES u_id
) ;

CREATE TABLE network (
  n_id integer NOT NULL,
  u_id integer NOT NULL REFERENCES user, 
  PRIMARY KEY (n_id, u_id)
) ;

CREATE TABLE owns (
  owner integer NOT NULL REFERENCES user(u_id),
  b_id integer NOT NULL REFERENCES building,
  PRIMARY KEY (owner, b_id)
) ;

CREATE TABLE renting (
  tenant integer NOT NULL REFERENCES user(u_id),
  b_id integer NOT NULL REFERENCES building
) ;

CREATE TABLE listed (
  b_id integer NOT NULL REFERENCES building,
  owner integer NOT NULL REFERENCES user(u_id),
  startprice integer NOT NULL,
  termlength integer NOT NULL
) ;


