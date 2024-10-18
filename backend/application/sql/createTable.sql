-- Database used: lamb_db

CREATE TABLE people (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    birth_date DATE NOT NULL,
    gender VARCHAR(15) NOT NULL,
    ethnicity VARCHAR(15) NOT NULL,
    profession VARCHAR(255) NOT NULL
);