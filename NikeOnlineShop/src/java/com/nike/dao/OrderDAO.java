package com.nike.dao;

import com.nike.model.Order;
import com.nike.util.DBconnection;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class OrderDAO {

    // Add Order
    public boolean addOrder(Order order) {

        String sql =
            "INSERT INTO orders " +
            "(customer_name, product_name, category, size, color, " +
            "quantity, price, total_amount, order_date, address) " +
            "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try (Connection con = DBconnection.getConnection();
             PreparedStatement ps = con.prepareStatement(sql)) {

            ps.setString(1, order.getCustomerName());
            ps.setString(2, order.getProductName());
            ps.setString(3, order.getCategory());
            ps.setString(4, order.getSize());
            ps.setString(5, order.getColor());
            ps.setInt(6, order.getQuantity());
            ps.setBigDecimal(7, order.getPrice());
            ps.setBigDecimal(8, order.getTotalAmount());
            ps.setDate(9, order.getOrderDate());
            ps.setString(10, order.getAddress());

            return ps.executeUpdate() > 0;

        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    // Get all orders
    public List<Order> getAllOrders() {

        List<Order> orderList = new ArrayList<>();

        String sql =
            "SELECT * FROM orders ORDER BY order_id DESC";

        try (Connection con = DBconnection.getConnection();
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(sql)) {

            while (rs.next()) {

                Order order = new Order();

                order.setOrderId(
                    rs.getInt("order_id")
                );

                order.setCustomerName(
                    rs.getString("customer_name")
                );

                order.setProductName(
                    rs.getString("product_name")
                );

                order.setCategory(
                    rs.getString("category")
                );

                order.setSize(
                    rs.getString("size")
                );

                order.setColor(
                    rs.getString("color")
                );

                order.setQuantity(
                    rs.getInt("quantity")
                );

                order.setPrice(
                    rs.getBigDecimal("price")
                );

                order.setTotalAmount(
                    rs.getBigDecimal("total_amount")
                );

                order.setOrderDate(
                    rs.getDate("order_date")
                );

                order.setAddress(
                    rs.getString("address")
                );

                orderList.add(order);
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        return orderList;
    }
}