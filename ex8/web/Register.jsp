<%@ page language="java"
         contentType="text/html; charset=UTF-8"
         pageEncoding="UTF-8" %>

<!DOCTYPE html>

<html>
<head>

    <title>Registration Complete</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .result-card {
            width: 500px;
            background: white;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        .success {
            text-align: center;
            margin-bottom: 25px;
        }

        .check {
            width: 70px;
            height: 70px;
            margin: auto;
            border-radius: 50%;
            background: #22c55e;
            color: white;
            font-size: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1 {
            color: #222;
            margin: 15px 0 5px;
        }

        .success p {
            color: #777;
            margin: 0;
        }

        .details {
            border: 1px solid #eee;
            border-radius: 12px;
            overflow: hidden;
        }

        .detail {
            display: flex;
            padding: 14px 16px;
            border-bottom: 1px solid #eee;
        }

        .detail:last-child {
            border-bottom: none;
        }

        .label {
            width: 42%;
            font-weight: bold;
            color: #555;
        }

        .value {
            width: 58%;
            color: #222;
            word-break: break-word;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 22px;
            padding: 12px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .back:hover {
            background: #5568d8;
        }

    </style>

</head>

<body>

<%

    String username = request.getParameter("username");
    String password = request.getParameter("password");
    String name = request.getParameter("name");
    String ccnumber = request.getParameter("ccnumber");
    String email = request.getParameter("email");
    String phone = request.getParameter("phone");

%>

<div class="result-card">

    <div class="success">

        <div class="check">✓</div>

        <h1>Registration Complete!</h1>

        <p>Your account has been successfully created.</p>

    </div>


    <div class="details">

        <div class="detail">
            <div class="label">User Name</div>
            <div class="value"><%= username %></div>
        </div>

        <div class="detail">
            <div class="label">Password</div>
            <div class="value"><%= password %></div>
        </div>

        <div class="detail">
            <div class="label">Full Name</div>
            <div class="value"><%= name %></div>
        </div>

        <div class="detail">
            <div class="label">Card Number</div>
            <div class="value"><%= ccnumber %></div>
        </div>

        <div class="detail">
            <div class="label">Email</div>
            <div class="value"><%= email %></div>
        </div>

        <div class="detail">
            <div class="label">Phone</div>
            <div class="value"><%= phone %></div>
        </div>

    </div>


    <a class="back" href="Register.html">
        Register Another User
    </a>

</div>

</body>
</html>