-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2015 at 06:16 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE IF NOT EXISTS `DEPARTMENT` (
  `Department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department_name` varchar(45) NOT NULL,
  PRIMARY KEY (`Department_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `DEPARTMENT`
--

INSERT INTO `DEPARTMENT` (`Department_ID`, `Department_name`) VALUES
(1, 'Produce'),
(2, 'Meat'),
(3, 'Seafood'),
(4, 'Bakery'),
(5, 'Deli'),
(6, 'Pharmacy'),
(7, 'Specialty'),
(8, 'Frozen'),
(9, 'Dairy');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE IF NOT EXISTS `EMPLOYEE` (
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_first_name` varchar(45) NOT NULL,
  `Employee_last_name` varchar(45) NOT NULL,
  `Employee_salary` int(11) NOT NULL,
  `Employee_date_of_birth` varchar(20) NOT NULL,
  `Employee_phone` varchar(45) NOT NULL,
  `Employee_street_name` varchar(45) NOT NULL,
  `Employee_city` varchar(45) NOT NULL,
  `Employee_state` varchar(2) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  PRIMARY KEY (`Employee_ID`),
  KEY `fk_EMPLOYEE_DEPARTMENT1_idx` (`Department_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`Employee_ID`, `Employee_first_name`, `Employee_last_name`, `Employee_salary`, `Employee_date_of_birth`, `Employee_phone`, `Employee_street_name`, `Employee_city`, `Employee_state`, `Department_ID`) VALUES
(1, 'George', 'Washington', 38000, '02/22/32', '202-514-2323', '1600 Pennsylvania Ave', 'Washington', 'DC', 2),
(29, 'John', 'Doe', 50000, '12/21/12', '1234567890', '250 Central Ave', 'Newark', 'NJ', 6),
(30, 'Chris', 'Smith', 120000, '02/23/64', '212-322-3434', '555 5th Ave', 'New York', 'NY', 7),
(31, 'Ann', 'Smith', 98000, '04/04/54', '212-566-1090', '555 5th Ave', 'New York', 'NY', 4),
(32, 'Phil', 'Johnson', 56000, '04/14/77', '201-876-0988', '37 Oneida Ave', 'Oakland', 'NJ', 5),
(33, 'Jane', 'Doe', 87000, '08/09/51', '551-931-1098', '11 Raritan Rd', 'Edison', 'NJ', 8),
(34, 'Kevin', 'Henrikson', 43000, '01/23/82', '908-223-3435', '11 Billingsley Rd', 'Livingston', 'NJ', 2),
(35, 'Hans', 'Solo', 500000, '03/13/44', '331-303-2358', '1 MES Way', 'Corellia', 'MD', 7),
(36, 'Bill', 'Nye', 234000, '01/08/90', '203-765-8786', '3 Science Guy Blvd', 'Boston', 'MA', 8),
(37, 'Brandon', 'Prust', 87000, '08/05/79', '551-432-7635', '175 Magnolia Rd', 'Olympia', 'WA', 7);

-- --------------------------------------------------------

--
-- Table structure for table `INVENTORY`
--

CREATE TABLE IF NOT EXISTS `INVENTORY` (
  `Product_ID` int(11) NOT NULL,
  `Warehouse_ID` int(11) NOT NULL,
  `Number_of_item_in_stock` int(45) NOT NULL,
  PRIMARY KEY (`Product_ID`,`Warehouse_ID`),
  KEY `fk_PRODUCT_has_WAREHOUSE_WAREHOUSE1_idx` (`Warehouse_ID`),
  KEY `fk_PRODUCT_has_WAREHOUSE_PRODUCT1_idx` (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `INVENTORY`
--

INSERT INTO `INVENTORY` (`Product_ID`, `Warehouse_ID`, `Number_of_item_in_stock`) VALUES
(1, 1, 100),
(1, 2, 45),
(2, 2, 25),
(2, 6, 200),
(3, 1, 100),
(6, 2, 2),
(8, 1, 20),
(9, 2, 25),
(9, 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE IF NOT EXISTS `PRODUCT` (
  `Product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(45) NOT NULL,
  `Product_price` double NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  PRIMARY KEY (`Product_ID`),
  KEY `fk_PRODUCT_DEPARTMENT1_idx` (`Department_ID`),
  KEY `fk_PRODUCT_SUPPLIER1_idx` (`Supplier_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`Product_ID`, `Product_name`, `Product_price`, `Department_ID`, `Supplier_ID`) VALUES
(1, 'Apple', 1.49, 1, 4),
(2, 'Porterhouse', 10.99, 2, 1),
(3, 'Banana', 0.39, 1, 1),
(6, 'Ice', 1.49, 8, 1),
(8, 'Tea', 4.99, 7, 1),
(9, 'Beer', 8.99, 7, 5),
(10, 'Cookies', 3.99, 4, 4),
(11, 'Bread', 2.99, 4, 6),
(12, 'Chocolate', 4.99, 7, 3),
(13, 'Ice Cream', 2.99, 8, 2),
(14, 'Advil', 8.99, 7, 2),
(15, 'Chicken', 3.99, 2, 6),
(16, 'Potatoes', 0.99, 1, 2),
(17, 'Milk', 2.99, 9, 4),
(18, 'Shrimp', 12.99, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLIER`
--

CREATE TABLE IF NOT EXISTS `SUPPLIER` (
  `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Supplier_name` varchar(45) NOT NULL,
  `Supplier_location` varchar(45) NOT NULL,
  `Supplier_contact` varchar(45) NOT NULL,
  PRIMARY KEY (`Supplier_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `SUPPLIER`
--

INSERT INTO `SUPPLIER` (`Supplier_ID`, `Supplier_name`, `Supplier_location`, `Supplier_contact`) VALUES
(1, 'C&S Suppliers', 'Avenel', 'Joe Schmo'),
(2, 'AVS Suppliers', 'Woodbridge', 'Frank Busby'),
(3, 'Davidson Suppliers', 'Ft Worth', 'John Davidson'),
(4, 'Appleton Farms', 'California', 'Andy Bathgate'),
(5, 'American Beverages', 'Topeka', 'John Bob Smithey'),
(6, 'TLV Suppliers', 'Media', 'Steven Johnsteven');

-- --------------------------------------------------------

--
-- Table structure for table `WAREHOUSE`
--

CREATE TABLE IF NOT EXISTS `WAREHOUSE` (
  `Warehouse_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Warehouse_name` varchar(45) NOT NULL,
  `Warehouse_max_stock` varchar(45) NOT NULL,
  `Warehouse_location` varchar(45) NOT NULL,
  PRIMARY KEY (`Warehouse_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `WAREHOUSE`
--

INSERT INTO `WAREHOUSE` (`Warehouse_ID`, `Warehouse_name`, `Warehouse_max_stock`, `Warehouse_location`) VALUES
(1, 'New Jersey', '1000', 'Roxbury'),
(2, 'Illinois', '500', 'Chicago'),
(5, 'California', '10000', 'Fresno'),
(6, 'Texas', '10000', 'San Antonio');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD CONSTRAINT `fk_EMPLOYEE_DEPARTMENT1` FOREIGN KEY (`Department_ID`) REFERENCES `DEPARTMENT` (`Department_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD CONSTRAINT `fk_PRODUCT_has_WAREHOUSE_PRODUCT1` FOREIGN KEY (`Product_ID`) REFERENCES `PRODUCT` (`Product_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCT_has_WAREHOUSE_WAREHOUSE1` FOREIGN KEY (`Warehouse_ID`) REFERENCES `WAREHOUSE` (`Warehouse_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `fk_PRODUCT_DEPARTMENT1` FOREIGN KEY (`Department_ID`) REFERENCES `DEPARTMENT` (`Department_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PRODUCT_SUPPLIER1` FOREIGN KEY (`Supplier_ID`) REFERENCES `SUPPLIER` (`Supplier_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
