import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class FacultyLogin extends HttpServlet 
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
     
     String sql="select * from faculty_db";
     rs=stmt.executeQuery(sql); 
     
     while( rs.next() )
      {
       String tableusername=rs.getString(4);
       String tablepassword=rs.getString(5);
       
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
       
       out.print("<html><head>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
	   out.print("<script type='text/javascript'>function validation(){var a=null;a=document.facultyreplay.facultyid.value;if(a==null){alert('FACULTY ID IS MISSING');return false;}else if(a.length!=10){alert('INVALID FACULTY ID');return false;}}</script>");
	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
	   out.print("<form name='facultyreplay' method='post' onSubmit='return validation()' action='./FacultyReplayService'>");
	   out.print("<div style='height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;'>");
	   out.print("<img src=logo1.png align='left' height=100% ><br>");
	   out.print("<table>");
	   out.print("<tr><td align='center'  style='padding-left: 150px;'><font size='5' color='white'><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 170px;'><font size='5' color='white'><i>(Autonomous)</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NAAC 'A' GRADE</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font></td></tr>");
	   out.print("</table></div><br><br><br>");
	   out.print("<table><tr>");
       out.print("<td align='left' style='padding-left: 100px;'><font color='blue' size='5'>FACULTY &nbsp;ID</font></td>");
       out.print("<td align='left' style='padding-left: 110px;'><font color='blue' size='5'> :</font></td>");
       out.print("<td align='left' style='padding-left: 120px;'><font color='blue' size='5'><input type='text' name='facultyid' size='10'></td>");
       out.print("</tr></table>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'></p>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");
       	   
      }
     else
      {
       RequestDispatcher rd = req.getRequestDispatcher("./facultylogin.jsp");
       rd.forward(req, res);
      }
    }
   catch(Exception e)
    {
     System.out.println(""+e);
    }
  }
}