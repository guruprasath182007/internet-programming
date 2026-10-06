package ticketbooking;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/BusServlet")
public class BusServlet extends HttpServlet {

    protected void doPost(HttpServletRequest request,
                           HttpServletResponse response)
                           throws ServletException, IOException {

        response.setContentType("text/html");

        PrintWriter out = response.getWriter();

        String name = request.getParameter("name");
        int age = Integer.parseInt(request.getParameter("age"));
        int busno = Integer.parseInt(request.getParameter("busno"));
        int seatno = Integer.parseInt(request.getParameter("seatno"));
        int price = Integer.parseInt(request.getParameter("price"));

        try {

            
            Class.forName("com.mysql.cj.jdbc.Driver");

            
            Connection con = DriverManager.getConnection(
                    "jdbc:mysql://localhost:3306/ticketdb",
                    "root",
                    "mysql"
            );

            
            String sql = "INSERT INTO tickets(name, age, busno, seatno, price) "
                       + "VALUES (?, ?, ?, ?, ?)";

            PreparedStatement ps = con.prepareStatement(sql);

            ps.setString(1, name);
            ps.setInt(2, age);
            ps.setInt(3, busno);
            ps.setInt(4, seatno);
            ps.setInt(5, price);

            ps.executeUpdate();

            
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Ticket Details</title>");
            out.println("</head>");
            out.println("<body>");

            out.println("<h1 align='center'>Ticket Booking Details</h1>");

            out.println("<table border='3' align='center'>");

            out.println("<tr>");
            out.println("<th>Name</th>");
            out.println("<th>Age</th>");
            out.println("<th>Bus No</th>");
            out.println("<th>Seat No</th>");
            out.println("<th>Price</th>");
            out.println("</tr>");

           
            Statement st = con.createStatement();

            ResultSet rs = st.executeQuery(
                    "SELECT * FROM tickets"
            );

            while (rs.next()) {

                out.println("<tr>");

                out.println("<td>"
                        + rs.getString("name")
                        + "</td>");

                out.println("<td>"
                        + rs.getInt("age")
                        + "</td>");

                out.println("<td>"
                        + rs.getInt("busno")
                        + "</td>");

                out.println("<td>"
                        + rs.getInt("seatno")
                        + "</td>");

                out.println("<td>"
                        + rs.getInt("price")
                        + "</td>");

                out.println("</tr>");
            }

            out.println("</table>");

            out.println("</body>");
            out.println("</html>");

            
            rs.close();
            st.close();
            ps.close();
            con.close();

        } catch (Exception e) {

            out.println("<h2>Error: " + e.getMessage() + "</h2>");

        }
    }
}