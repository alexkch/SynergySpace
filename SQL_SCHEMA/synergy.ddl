-- -*- mode:sql -*-

DROP SCHEMA IF EXISTS synergy;
CREATE SCHEMA synergy;
SET search_path TO synergy;


CREATE TABLE users (
  username varchar(32) PRIMARY KEY NOT NULL,
  password varchar(32) NOT NULL,
  name varchar(32) NOT NULL,
  email varchar(32) NOT NULL,
  type char(6) NOT NULL
);


CREATE TABLE profile (
  username varchar(32) REFERENCES users PRIMARY KEY,
  occupation varchar(32) NOT NULL,
  birthdate varchar(32) NOT NULL,
  gender varchar(32) NOT NULL,
  homeaddress varchar(32) NOT NULL,
  homenumber varchar(32) NOT NULL,
  cellnumber varchar(32) NOT NULL
);

CREATE TABLE building (
  b_id integer PRIMARY KEY,
  address varchar NOT NULL,
  city varchar NOT NULL,
  country varchar NOT NULL,
  capacity integer NOT NULL,
  worknumber varchar NOT NULL
) ;

CREATE TABLE feedback (
  f_id integer PRIMARY KEY,
  b_id integer NOT NULL REFERENCES people,
  username varchar NOT NULL REFERENCES user,
  username varchar NOT NULL REFERENCES user,
  f_rating integer NOT NULL,
  comments varchar NOT NULL
) ;

CREATE TABLE buildingrating (
  r_id integer PRIMARY KEY,
  b_id integer NOT NULL REFERENCES building,
  username varchar NOT NULL REFERENCES user,  
  b_rating integer NOT NULL,
  comments varchar NOT NULL
) ;
