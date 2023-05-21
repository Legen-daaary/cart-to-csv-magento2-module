# CartToCSV Magento 2 Module

A Magento 2 module that allows customers to download the contents of their shopping cart in CSV format.


## Authors

- [@Legen-daaary](https://github.com/Legen-daaary)

## Features

The customer can download the contents of their cart in a csv file containing the following fields:

- **sku**: *Stock Keeping unit, and it is a unique identification code in alphanumeric format.*
- **name**: *The name of the product*
- **price**: *The unit price of the product*
- **quantity**: *Quantity of the product in the cart*
- **row_total**: *Unit price multiplied by quantity*

### Example

![Cart example](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/616f6a69-5e73-4d19-b10c-10c1173db9a3)

## Setup

### Prerequisites

In the Magento 2 project where you want to use this module, create a **code** folder in the src/app folder if it does not already exist.

Then create a **Legendaaary** folder in the **code** folder and a **CartToCSV** folder inside the **Legendaaary** folder.

The folder structure should then look like this:

![folder_structure](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/57494ecb-f3c6-48cc-b3d8-9b94000b7c77)

### Installation

Clone the project to the desired folder
```
git clone https://github.com/Legen-daaary/cart-to-csv-magento2-module.git
```

Then copy and paste the contents of your cloned project folder into the **CartToCSV** folder.

The folder should then look like this:

![Folder content](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/4a004851-1577-482f-8b0e-0b928c303e1c)


If all went well, after running ```bin/magento module:enable Legendaaary_CartToCSV``` in the root directory of your project, you should see this in your terminal:

![Enable module in terminal](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/666a353b-c39c-4dd8-a69e-6da33db5700d)

And as the info text highly recommends, run ```bin/magento setup:upgrade```.


> **WARNING:** It is possible that your ```bin/magento``` command itself is not recognized by your development environment. In this case, try ```php bin/magento```

### Enable Module

Go to the Admin Panel and do as the following:

[Enabling module in Admin Panel](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/fd4846ed-76f2-4bad-89b3-b3cbb8a0e278)

## Test

You can test the correct functioning of the module as follows:

[Test Module](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/456ed82f-ab95-48b3-b27a-552be9000f3c)

## Screenshots

![Index page](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/0f4679f1-7283-4cfc-88fd-ad535d3ccb96)

![Shopping cart page](https://github.com/Legen-daaary/cart-to-csv-magento2-module/assets/88480871/da0dfdb4-0ec8-4dae-8bea-182c90c7bb96)


