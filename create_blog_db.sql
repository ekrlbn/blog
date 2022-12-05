CREATE TABLE authors(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (name),
    UNIQUE (username)
);

CREATE TABLE sessions(
    sid VARCHAR(36) not null,
    user_id INT not null,
    expires INT not null,
    PRIMARY KEY (sid),
    FOREIGN KEY (user_id) REFERENCES authors (id) 
); 

CREATE TABLE categories(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20),
    PRIMARY KEY (id),
    UNIQUE (name)
);

CREATE TABLE posts(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    author_id INT NOT NULL,
    category_id INT,
    content TEXT NOT NULL,
    image VARCHAR(100),
    date DATE,
    visit_count INT NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES authors (id),
    FOREIGN KEY (category_id) REFERENCES categories (id)
);

CREATE TABLE emails(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50),
    PRIMARY KEY (id),
    UNIQUE (email)
); 

INSERT INTO authors (name,username,password)
VALUES ('author_1','testUsername','testPassword');

