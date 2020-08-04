
CREATE TABLE Users(
	userId int NOT NULL AUTO_INCREMENT,
    username tinytext NOT NULL,
    email tinytext NOT NULL,
    pwd longtext NOT NULL,
    CONSTRAINT users_pk PRIMARY KEY( userId )
);
