# Zen E-commmerce

## Structure of E-commerce

1. Frontend Website
2. The Cart & Checkout system
3. Paypal Integration
4. Admin Panel
5. Customer Account

---

## Table Structure

> NOTE: One DB with `8 tables`

The table structure is as follows:
1. Products
    - product_id :  `int(100)` | `Primary` | `A_I`
    - product_cat :  `int(100)`
    - product_brand : `int(100)`
    - product_title : `varchar(255)`
    - product_price : `int(100)`
    - product_desc : `TEXT`
    - product_image : `TEXT`
    - product_keywords : `TEXT`
1. Categories
    - cat_id : `int(100)` | `Primary` | `A_I`
    - cat_title : `TEXT`
1. Brands
    - brand_id : `int(100)` | `Primary` | `A_I`
    - brand_title : `TEXT` 
1. Cart
1. Customers
1. Orders
1. Admins
1. Payments

---
