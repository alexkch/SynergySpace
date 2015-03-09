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
  type char NOT NULL
  occupation varchar NOT NULL,
  birthdate varchar NOT NULL,
  gender varchar NOT NULL,
  homeaddress varchar NOT NULL,
  phonenumber varchar NOT NULL,
  UNIQUE (username, password),  
);

CREATE TABLE building (
  b_id integer PRIMARY KEY,
  n_id varchar NOT NULL,
  address varchar NOT NULL,
  city varchar NOT NULL,
  country varchar NOT NULL,
  capacity integer NOT NULL,
  worknumber varchar NOT NULL,
  UNIQUE (address, city, country),
  FOREIGN KEY (n_id) REFERENCES network, 
) ;

CREATE TABLE feedback (
  f_id integer PRIMARY KEY,
  b_id integer NOT NULL REFERENCES people,
  u_id as subject integer NOT NULL,
  u_id as rater integer NOT NULL,
  feedback_rating integer NOT NULL,
  comments varchar NOT NULL,

  FOREIGN KEY (b_id) REFERENCES building,
  FOREIGN KEY (subject, rater) REFERENCES user, 
) ;

CREATE TABLE buildingrating (
  r_id integer PRIMARY KEY,
  b_id integer NOT NULL REFERENCES building,
  u_id varchar NOT NULL REFERENCES user,  
  building_rating integer NOT NULL,
  comments varchar NOT NULL,

  FOREIGN KEY (b_id) REFERENCES building,
  FOREIGN KEY (u_id) REFERENCES u_id, 
) ;







