-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2023 at 12:34 AM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lintas`
--

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uuid VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(50) UNIQUE NOT NULL,
    role_id INT NOT NULL,
    bio TEXT DEFAULT NULL,
    coordinates VARCHAR(255) DEFAULT NULL,
    displayLocation TEXT DEFAULT NULL,
    address TEXT DEFAULT NULL,
    campaigns_id VARCHAR(255) DEFAULT NULL,
    subscribers VARCHAR(255) DEFAULT NULL,
    created_at DATETIME,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE campaigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    cover VARCHAR(255) NOT NULL,
    cover_caption VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    published_at DATETIME,
    user_id INT DEFAULT NULL,
    location LONGTEXT DEFAULT NULL,
    views INT DEFAULT 0,
    categories_id INT DEFAULT NULL,
    FOREIGN KEY (categories_id) REFERENCES categories(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT,
    content TEXT NOT NULL,
    posted_at DATETIME NOT NULL,
    user_id INT DEFAULT NULL,
    FOREIGN KEY (article_id) REFERENCES campaigns(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE logins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    access_token LONGTEXT NOT NULL,
    exp_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
