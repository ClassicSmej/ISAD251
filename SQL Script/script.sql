create table audittable
(
	ProductID int(4) null,
	ProductName varchar(100) null,
	AlertDate datetime null,
	AlertType varchar(100) null
);

create table orders
(
	OrderID int(8) auto_increment primary key,
	OrderDate datetime not null
);

create table products
(
	ProductID int(4) auto_increment primary key,
	Name varchar(100) not null,
	Description varchar(100) not null,
	Price decimal(3,2) not null,
	Category varchar(50) not null,
	Status varchar(50) not null
);

create table orderitems
(
	ItemID int auto_increment primary key,
	OrderID int(8) not null,
	ProductID int(4) not null,
	Quantity int not null,
	constraint fk_orders foreign key (OrderID) references orders (OrderID),
	constraint fk_products foreign key (ProductID) references products (ProductID)
);

create view orderdetails as select `isad251_jwhite`.`orderitems`.`ItemID` AS `ItemID`,
       `isad251_jwhite`.`orders`.`OrderID` AS `OrderID`,
       `isad251_jwhite`.`orders`.`OrderDate` AS `OrderDate`,
       `isad251_jwhite`.`orderitems`.`ProductID` AS `ProductID`,
       `isad251_jwhite`.`products`.`Name` AS `Name`,
       `isad251_jwhite`.`orderitems`.`Quantity` AS `Quantity`,
       sum((`isad251_jwhite`.`orderitems`.`Quantity` * `isad251_jwhite`.`products`.`Price`)) AS `TotalCost`
from ((`isad251_jwhite`.`orders` join `isad251_jwhite`.`products`)
         join `isad251_jwhite`.`orderitems`)
where ((`isad251_jwhite`.`orderitems`.`OrderID` = `isad251_jwhite`.`orders`.`OrderID`) and
       (`isad251_jwhite`.`orderitems`.`ProductID` = `isad251_jwhite`.`products`.`ProductID`))
group by `isad251_jwhite`.`orderitems`.`ItemID`;

CREATE PROCEDURE `order_view`()
BEGIN
CREATE VIEW `isad251_jwhite`.`orderdetails` AS
    SELECT 
        `isad251_jwhite`.`orderitems`.`ItemID` AS `ItemID`,
        `isad251_jwhite`.`orders`.`OrderID` AS `OrderID`,
        `isad251_jwhite`.`orders`.`OrderDate` AS `OrderDate`,
        `isad251_jwhite`.`orderitems`.`ProductID` AS `ProductID`,
        `isad251_jwhite`.`products`.`Name` AS `Name`,
        `isad251_jwhite`.`orderitems`.`Quantity` AS `Quantity`,
        SUM((`isad251_jwhite`.`orderitems`.`Quantity` * `isad251_jwhite`.`products`.`Price`)) AS `TotalCost`
    FROM
        ((`isad251_jwhite`.`orders`
        JOIN `isad251_jwhite`.`products`)
        JOIN `isad251_jwhite`.`orderitems`)
    WHERE
        ((`isad251_jwhite`.`orderitems`.`OrderID` = `isad251_jwhite`.`orders`.`OrderID`)
            AND (`isad251_jwhite`.`orderitems`.`ProductID` = `isad251_jwhite`.`products`.`ProductID`))
    GROUP BY `isad251_jwhite`.`orderitems`.`ItemID`;
END


