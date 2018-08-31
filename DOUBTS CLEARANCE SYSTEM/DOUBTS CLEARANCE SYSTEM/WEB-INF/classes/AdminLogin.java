import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class AdminLogin extends HttpServlet 
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
     
	 boolean flag=false;
     PrintWriter out = res.getWriter();
     res.setContentType("text/html");
     String enteredusername=req.getParameter("user");
     String enteredpassword=req.getParameter("password");
     
     String sql="select * from adminlogin";
     rs=stmt.executeQuery(sql); 
     
     while( rs.next() )
      {
       String tableusername=rs.getString(1);
       String tablepassword=rs.getString(2);
       
       if( enteredusername.equals(tableusername) && enteredpassword.equals(tablepassword) )  
        {
         flag=true;
         break;
        }
       else
        {
         continue;
        }
        
      }
     
     if( flag == true )
      {
       RequestDispatcher rd = req.getRequestDispatcher("./admin1.html");
       rd.forward(req, res);
      }
     else
      {
       RequestDispatcher rd = req.getRequestDispatcher("./adminlogin.jsp");
       rd.forward(req, res);
      }
     
    }
   catch(Exception e)
    {
     System.out.println(""+e);
    }
  }
}