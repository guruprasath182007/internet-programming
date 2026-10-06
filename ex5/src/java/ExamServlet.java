package com.exam;
import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/ExamServlet")
public class ExamServlet extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request,
                           HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html;charset=UTF-8");

        PrintWriter out = response.getWriter();

        int score = 0;

        String[] correctAnswers = {
            "HyperText Markup Language",
            "h1",
            "CSS",
            "JavaScript",
            "a",
            "src",
            "DOCTYPE",
            "canvas"
        };

        String[] userAnswers = {
            request.getParameter("q1"),
            request.getParameter("q2"),
            request.getParameter("q3"),
            request.getParameter("q4"),
            request.getParameter("q5"),
            request.getParameter("q6"),
            request.getParameter("q7"),
            request.getParameter("q8")
        };

        out.println("<!DOCTYPE html>");
        out.println("<html>");
        out.println("<head>");
        out.println("<title>Exam Result</title>");

        out.println("<style>");

        out.println("body {");
        out.println("font-family: Arial, sans-serif;");
        out.println("background: linear-gradient(135deg, #667eea, #764ba2);");
        out.println("padding: 50px;");
        out.println("}");

        out.println(".result {");
        out.println("max-width: 500px;");
        out.println("margin: auto;");
        out.println("background: white;");
        out.println("padding: 30px;");
        out.println("border-radius: 15px;");
        out.println("box-shadow: 0 8px 25px rgba(0,0,0,.2);");
        out.println("}");

        out.println("h2 {");
        out.println("text-align: center;");
        out.println("color: #4b3f72;");
        out.println("}");

        out.println(".answer {");
        out.println("padding: 12px;");
        out.println("margin: 8px 0;");
        out.println("border-radius: 7px;");
        out.println("font-size: 18px;");
        out.println("font-weight: bold;");
        out.println("}");

        out.println(".correct {");
        out.println("background: #d4edda;");
        out.println("color: #155724;");
        out.println("}");

        out.println(".wrong {");
        out.println("background: #f8d7da;");
        out.println("color: #721c24;");
        out.println("}");

        out.println(".score {");
        out.println("text-align: center;");
        out.println("font-size: 24px;");
        out.println("font-weight: bold;");
        out.println("color: #6c5ce7;");
        out.println("margin-top: 25px;");
        out.println("}");

        out.println("a {");
        out.println("display: block;");
        out.println("text-align: center;");
        out.println("margin-top: 20px;");
        out.println("padding: 12px;");
        out.println("background: #6c5ce7;");
        out.println("color: white;");
        out.println("text-decoration: none;");
        out.println("border-radius: 7px;");
        out.println("}");

        out.println("</style>");
        out.println("</head>");

        out.println("<body>");

        out.println("<div class='result'>");

        out.println("<h2>Exam Result</h2>");

        // Check every answer
        for (int i = 0; i < correctAnswers.length; i++) {

            boolean correct = userAnswers[i] != null
                    && userAnswers[i].trim()
                    .equalsIgnoreCase(correctAnswers[i]);

            if (correct) {

                score++;

                out.println("<div class='answer correct'>");
                out.println("Q" + (i + 1) + ": Correct");
                out.println("</div>");

            } else {

                out.println("<div class='answer wrong'>");
                out.println("Q" + (i + 1) + ": Wrong");
                out.println("</div>");
            }
        }

        out.println("<div class='score'>");
        out.println("Score: " + score + "/8");
        out.println("</div>");

        out.println("<a href='index.html'>Take Exam Again</a>");

        out.println("</div>");

        out.println("</body>");
        out.println("</html>");
    }
}
