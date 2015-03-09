-- -*- mode:sql -*-

DROP SCHEMA IF EXISTS synergy;
CREATE SCHEMA synergy;
SET search_path TO synergy;


CREATE TABLE users (
  username varchar(32) REFERENCES profile PRIMARY KEY NOT NULL,
  password varchar(32) NOT NULL,
  name varchar(32) NOT NULL,
  email varchar(32) NOT NULL,
  tenant boolean NOT NULL,
  leaser boolean NOT NULL
);


CREATE TABLE profile (
  p_id integer PRIMARY KEY,
  firstname varchar NOT NULL,
  lastname varchar NOT NULL,
  occupation varchar NOT NULL,
  birthdate varchar NOT NULL,
  gender varchar NOT NULL,
  homeaddress varchar NOT NULL,
  homenumber varchar NOT NULL,
  cellnumber varchar NOT NULL
) ;

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
