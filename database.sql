CREATE DATABASE livetv CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE livetv;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password)
VALUES ('kavil', MD5('kavil1234'));

CREATE TABLE settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    live_link TEXT,
    logo_path VARCHAR(255),
    show_live TINYINT(1) DEFAULT 1,
    watermark_text VARCHAR(100) DEFAULT 'KING FM TAMIL',
    watermark_size INT DEFAULT 16,
    show_time TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);