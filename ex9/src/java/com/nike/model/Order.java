package com.nike.model;

import java.math.BigDecimal;
import java.sql.Date;

public class Order {

    private int orderId;
    private String customerName;
    private String productName;
    private String category;
    private String size;
    private String color;
    private int quantity;
    private BigDecimal price;
    private BigDecimal totalAmount;
    private Date orderDate;
    private String address;

    public Order() {
    }

    public Order(String customerName, String productName,
                 String category, String size, String color,
                 int quantity, BigDecimal price,
                 BigDecimal totalAmount, Date orderDate,
                 String address) {

        this.customerName = customerName;
        this.productName = productName;
        this.category = category;
        this.size = size;
        this.color = color;
        this.quantity = quantity;
        this.price = price;
        this.totalAmount = totalAmount;
        this.orderDate = orderDate;
        this.address = address;
    }

    public int getOrderId() {
        return orderId;
    }

    public void setOrderId(int orderId) {
        this.orderId = orderId;
    }

    public String getCustomerName() {
        return customerName;
    }

    public void setCustomerName(String customerName) {
        this.customerName = customerName;
    }

    public String getProductName() {
        return productName;
    }

    public void setProductName(String productName) {
        this.productName = productName;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

    public String getSize() {
        return size;
    }

    public void setSize(String size) {
        this.size = size;
    }

    public String getColor() {
        return color;
    }

    public void setColor(String color) {
        this.color = color;
    }

    public int getQuantity() {
        return quantity;
    }

    public void setQuantity(int quantity) {
        this.quantity = quantity;
    }

    public BigDecimal getPrice() {
        return price;
    }

    public void setPrice(BigDecimal price) {
        this.price = price;
    }

    public BigDecimal getTotalAmount() {
        return totalAmount;
    }

    public void setTotalAmount(BigDecimal totalAmount) {
        this.totalAmount = totalAmount;
    }

    public Date getOrderDate() {
        return orderDate;
    }

    public void setOrderDate(Date orderDate) {
        this.orderDate = orderDate;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }
}