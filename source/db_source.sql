CREATE TABLE books (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
year INT(4),
writer VARCHAR(255) NOT NULL,
type VARCHAR(50),
imageUrl VARCHAR(255),
description text,
lang VARCHAR(2),
update_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE translators (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
firstName VARCHAR(255) NOT NULL,
lastName VARCHAR(255) NOT NULL,
description text,
lang VARCHAR(2),
update_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE books_translators (
id_book INT(6),
id_translator INT(6),
update_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (id_book) REFERENCES  books(id),
FOREIGN KEY (id_translator) REFERENCES  translators(id),
constraint id_book_translator primary key(id_book,id_translator)
);

CREATE TABLE users (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
firstName VARCHAR(30) NOT NULL,
lastName VARCHAR(30) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(32) NOT NULL,
type VARCHAR(20) DEFAULT 'user',
imageUrl VARCHAR(255) NOT NULL,
tokenAccess VARCHAR(32) NOT NULL,
update_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users_books (
id INT(6) AUTO_INCREMENT ,
id_book INT(6),
id_user INT(6),
comment text,
lang VARCHAR(2),
update_at TIMESTAMP NOT NULL
    DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (id_book) REFERENCES  books(id),
FOREIGN KEY (id_user) REFERENCES  users(id),
constraint id_book_user primary key(id,id_book,id_user)
);



-- select b.* ,bt.*
-- from books b join books_translators bt
-- on b.id =bt.id_book 