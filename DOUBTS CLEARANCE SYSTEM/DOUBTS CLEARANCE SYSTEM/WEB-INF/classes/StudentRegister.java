import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class StudentRegister extends HttpServlet 
{
 Connection con=null;
 Statement stmt=null;
 java.sql.ResultSet rs=null;
 public void init(ServletConfig config) throws ServletException 
 {
  String driver = "oracle.jdbc.driver.OracleDriver";
  String url = "jdbc:oracle:thin:@localhost:1521:XE";
  String user = "venkatreddy";
  String password = "kvr";
  try
   {             
    Class.forName(driver);
    con = DriverManager.getConnection(url,user,password);
	con.setAutoCommit(false);
    if ( con==null ) 
     {
      System.out.println("connection failed");
	  
     }
     stmt=con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_UPDATABLE);
    
   }
  catch(Exception ex)
   {
    ex.printStackTrace();
   }
  }
 public void doGet(HttpServletRequest req,HttpServletResponse res) throws 
                           ServletException, IOException 
  {
   doPost(req,res);
  }
 public void doPost(HttpServletRequest req,HttpServletResponse res) throws 
                           ServletException, IOException 
  {
   try
    {
     PrintWriter out = res.getWriter();
     res.setContentType("text/html");
     String enteredusername=req.getParameter("user");
     String enteredpassword=req.getParameter("password");
	 String rollno=req.getParameter("rollno");
	 String branch=req.getParameter("branch");
	 String sqlinsert="insert into studentregister values('"+rollno+"','"+branch+"','"+enteredusername+"','"+enteredpassword+"')";
	 int i1=stmt.executeUpdate(sqlinsert);
	 if( i1 == 1 )
      {
	  con.commit();
	 
       RequestDispatcher rd = req.getRequestDispatcher("./studentlogin.html");
       rd.forward(req,res);
      }
     else
      {
       RequestDispatcher rd = req.getRequestDispatcher("./studentregister.jsp");
       rd.forward(req, res);
      }     
    }
   catch(Exception e)
    {
     System.out.println(""+e);
	 RequestDispatcher rd = req.getRequestDispatcher("./studentregister.jsp");
     rd.forward(req, res);
    }
  }
}