-- Create database
CREATE DATABASE cottage_booking;

-- Use the database
USE cottage_booking;

-- Create cottages table
CREATE TABLE cottages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2),
  image_url VARCHAR(255)
);

-- Create reservations table
CREATE TABLE reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  checkin DATETIME,
  checkout DATETIME,
  id_type VARCHAR(100),
  id_number VARCHAR(100),
  payment_method VARCHAR(100),
  guests VARCHAR(50),
  special_requests TEXT,
  cottage_id INT,
  status VARCHAR(50) DEFAULT 'Pending',
  FOREIGN KEY (cottage_id) REFERENCES cottages(id)
);
