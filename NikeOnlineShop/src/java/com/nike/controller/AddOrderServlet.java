package com.nike.controller;

import com.nike.dao.OrderDAO;
import com.nike.model.Order;

import java.io.IOException;
import java.math.BigDecimal;
import java.sql.Date;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(
    name = "AddOrderServlet",
    urlPatterns = {"/AddOrderServlet"}
)
public class AddOrderServlet extends HttpServlet {

    @Override
    protected void doPost(
            HttpServletRequest request,
            HttpServletResponse response)
            throws ServletException, IOException {

        String customerName =
            request.getParameter("customerName");

        String productName =
            request.getParameter("productName");

        String category =
            request.getParameter("category");

        String size =
            request.getParameter("size");

        String color =
            request.getParameter("color");

        int quantity =
            Integer.parseInt(
                request.getParameter("quantity")
            );

        BigDecimal price =
            new BigDecimal(
                request.getParameter("price")
            );

        BigDecimal totalAmount =
            price.multiply(
                BigDecimal.valueOf(quantity)
            );

        Date orderDate =
            Date.valueOf(
                request.getParameter("orderDate")
            );

        String address =
            request.getParameter("address");

        Order order = new Order(
            customerName,
            productName,
            category,
            size,
            color,
            quantity,
            price,
            totalAmount,
            orderDate,
            address
        );

        OrderDAO dao = new OrderDAO();

        boolean success =
            dao.addOrder(order);

        if (success) {

            response.sendRedirect(
                "ViewOrders.jsp"
            );

        } else {

            request.setAttribute(
                "errorMessage",
                "Order failed. Please try again."
            );

            request.getRequestDispatcher(
                "OrderForm.jsp"
            ).forward(request, response);
        }
    }
}