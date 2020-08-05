
CREATE TABLE Users(
	userId int NOT NULL AUTO_INCREMENT,
    username tinytext NOT NULL,
    email tinytext NOT NULL,
    pwd longtext NOT NULL,
    CONSTRAINT users_pk PRIMARY KEY( userId )
);

CREATE TABLE Website(
	websiteId int NOT NULL AUTO_INCREMENT,
    websiteName tinytext NOT NULL,
    userId int NOT NULL,
    CONSTRAINT website_pk PRIMARY KEY( websiteId ),
    CONSTRAINT website_users_fk FOREIGN KEY( userId) REFERENCES Users( userId )
);

CREATE TABLE Post(
	postId int NOT NULL AUTO_INCREMENT,
    postName tinytext NOT NULL,
    postContent text NOT NULL,
    postCreate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    postEdit datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    websiteId int NOT NULL,
    CONSTRAINT post_pk PRIMARY KEY( postId ),
    CONSTRAINT post_website_fk FOREIGN KEY( websiteId ) REFERENCES Website( websiteId )
);
