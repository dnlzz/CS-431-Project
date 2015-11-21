-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2015 at 02:51 PM
-- Server version: 5.6.27
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `DEPARTMENT`
--

CREATE TABLE `DEPARTMENT` (
  `Department_ID` int(11) NOT NULL,
  `Department_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 'Frozen');

-- --------------------------------------------------------

--
-- Table structure for table `EMPLOYEE`
--

CREATE TABLE `EMPLOYEE` (
  `Employee_ID` int(11) NOT NULL,
  `Employee_first_name` varchar(45) NOT NULL,
  `Employee_last_name` varchar(45) NOT NULL,
  `Employee_salary` int(11) NOT NULL,
  `Employee_date_of_birth` date NOT NULL,
  `Employee_phone` varchar(45) NOT NULL,
  `Employee_street_name` varchar(45) NOT NULL,
  `Employee_city` varchar(45) NOT NULL,
  `Employee_state` varchar(2) NOT NULL,
  `Department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EMPLOYEE`
--

INSERT INTO `EMPLOYEE` (`Employee_ID`, `Employee_first_name`, `Employee_last_name`, `Employee_salary`, `Employee_date_of_birth`, `Employee_phone`, `Employee_street_name`, `Employee_city`, `Employee_state`, `Department_ID`) VALUES
(1, 'George', 'Washington', 36000, '1732-02-22', '202555-1234', '1600 Pennsylvania Ave', 'Washington', 'DC', 1),
(2, 'Josh', 'McCowan', 44000, '1972-04-05', '202-555-4567', '32 33rd Street', 'Washington', 'DC', 2);

-- --------------------------------------------------------

--
-- Table structure for table `INVENTORY`
--

CREATE TABLE `INVENTORY` (
  `Product_ID` int(11) NOT NULL,
  `Warehouse_ID` int(11) NOT NULL,
  `Number_of_item_in_stock` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `INVENTORY`
--

INSERT INTO `INVENTORY` (`Product_ID`, `Warehouse_ID`, `Number_of_item_in_stock`) VALUES
(1, 1, 50),
(2, 2, 50);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `Product_ID` int(11) NOT NULL,
  `Product_name` varchar(45) NOT NULL,
  `Product_price` varchar(45) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`Product_ID`, `Product_name`, `Product_price`, `Department_ID`, `Supplier_ID`) VALUES
(1, 'Apple', '1.39', 1, 1),
(2, 'Porterhouse', '9.99', 2, 2),
(3, 'Salmon', '7.99', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SUPPLIER`
--

CREATE TABLE `SUPPLIER` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_name` varchar(45) NOT NULL,
  `Supplier_location` varchar(45) NOT NULL,
  `Supplier_contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SUPPLIER`
--

INSERT INTO `SUPPLIER` (`Supplier_ID`, `Supplier_name`, `Supplier_location`, `Supplier_contact`) VALUES
(1, 'C&S Suppliers', 'Avenel', 'Joe Schmo'),
(2, 'AVS Suppliers', 'Woodbridge', 'Frank Busby');

-- --------------------------------------------------------

--
-- Table structure for table `WAREHOUSE`
--

CREATE TABLE `WAREHOUSE` (
  `Warehouse_ID` int(11) NOT NULL,
  `Warehouse_name` varchar(45) NOT NULL,
  `Warehouse_max_stock` varchar(45) NOT NULL,
  `Warehouse_location` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `WAREHOUSE`
--

INSERT INTO `WAREHOUSE` (`Warehouse_ID`, `Warehouse_name`, `Warehouse_max_stock`, `Warehouse_location`) VALUES
(1, 'New Jersey', '1000', 'Roxbury'),
(2, 'Illinois', '500', 'Chicago');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD KEY `fk_EMPLOYEE_DEPARTMENT1_idx` (`Department_ID`);

--
-- Indexes for table `INVENTORY`
--
ALTER TABLE `INVENTORY`
  ADD PRIMARY KEY (`Product_ID`,`Warehouse_ID`),
  ADD KEY `fk_PRODUCT_has_WAREHOUSE_WAREHOUSE1_idx` (`Warehouse_ID`),
  ADD KEY `fk_PRODUCT_has_WAREHOUSE_PRODUCT1_idx` (`Product_ID`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `fk_PRODUCT_DEPARTMENT1_idx` (`Department_ID`),
  ADD KEY `fk_PRODUCT_SUPPLIER1_idx` (`Supplier_ID`);

--
-- Indexes for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `WAREHOUSE`
--
ALTER TABLE `WAREHOUSE`
  ADD PRIMARY KEY (`Warehouse_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DEPARTMENT`
--
ALTER TABLE `DEPARTMENT`
  MODIFY `Department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `EMPLOYEE`
--
ALTER TABLE `EMPLOYEE`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `SUPPLIER`
--
ALTER TABLE `SUPPLIER`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `WAREHOUSE`
--
ALTER TABLE `WAREHOUSE`
  MODIFY `Warehouse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
