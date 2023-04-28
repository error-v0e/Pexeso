//users

CREATE OR REPLACE TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    jmeno varchar(128) NOT NULL,
    email varchar(128) NOT NULL,
    heslo varchar(128) NOT NULL
)

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//scoreboard

CREATE OR REPLACE TABLE games(
    id int PRIMARY KEY AUTO_INCREMENT,
    score int NOT NULL,
    height int NOT NULL,
    width int NOT NULL,
    fk_user int,
    FOREIGN KEY (fk_user) REFERENCES users(id)
);