CREATE DATABASE binubuwakan;
USE binubuwakan;

-- Table for cottages
CREATE TABLE cottages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2),
  image_url VARCHAR(255),
  status ENUM('Checked-IN', 'Checked-Out') DEFAULT 'Checked-IN'
);

-- Table for reservation requests
CREATE TABLE requests (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  message TEXT,
  status ENUM('Pending', 'Approved', 'Cancelled') DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
