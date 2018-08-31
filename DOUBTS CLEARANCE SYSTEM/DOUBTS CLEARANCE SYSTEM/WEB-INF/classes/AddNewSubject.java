import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class AddNewSubject extends HttpServlet 
{
 Connection con=null;
 Statement stmt=null;
 java.sql.ResultSet rs=null,rs1=null;
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
    stmt=con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_UPDATABLE);
    if ( con==null ) 
     {
      System.out.println("connection failed");
     }
    
   }
  catch(Exception ex)
   {
    ex.printStackTrace();
    System.out.println(""+ex);
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
     String selectedbranch=req.getParameter("branch");
     String selectedsemester=req.getParameter("semister");
	 String subjectname=req.getParameter("newsubjectname");
	 String subjectcode=req.getParameter("newsubjectcode");
     
      
       
	   String insertquery="insert into subjects values('"+subjectname+"','"+subjectcode+"','"+selectedbranch+"','"+selectedsemester+"')";
	   int i1=stmt.executeUpdate(insertquery);
	   if(i1==1)
	   con.commit();
	 else 
	  {
	   RequestDispatcher rd = req.getRequestDispatcher("./addnewsubject.jsp");
       rd.forward(req, res);
	  }
	 
	 
    }
   catch(Exception e)
    {
     System.out.println(""+e);
	 try
	  {
	   con.rollback();
	  }
	 catch(Exception ex)
	  {
	   System.out.println(""+ex);
	  }
    }
   
  }
}  