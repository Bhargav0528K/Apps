import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class FacultyReplayFinal extends HttpServlet 
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
	 
	 String fid=req.getParameter("facultyid");
	 
	 String sql1="select * from doubts where facultyid='"+fid+"'";
	 rs=stmt.executeQuery(sql1);
	 
	   out.print("<html><head>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
	   out.print("<form name='facultyreplayfinal' method='post' action='./FacultyReplayFinalService'>");
	   out.print("<div style='height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;'>");
	   out.print("<img src=logo1.png align='left' height=100% ><br>");
	   out.print("<table>");
	   out.print("<tr><td align='center'  style='padding-left: 150px;'><font size='5' color='white'><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 170px;'><font size='5' color='white'><i>(Autonomous)</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NAAC 'A' GRADE</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font></td></tr>");
	   out.print("</table></div><br><br><br>");
	   out.print("<table border='5' align='center' cellspacing='5' cellpadding='5' width='640'>");	   
	   
	 while( rs.next() )
	  {
	   String question=rs.getString(5);
	   String answer=req.getParameter(question);
	   
	   if(answer == null)
	    {
		 out.print("<tr>");
	     out.print("<td>"+question);
		 out.print("</td>");
		 out.print("<td>");
		 out.print("<textarea rows='3' cols='100' name='"+question+"'>");
	     out.print("</textarea>");
		 out.print("</td>");
	     out.print("<td><font color='red' siz='5'>ENTER REPLAY</font>");
		 out.print("</td></tr>");
		 
	    }
	   else
	    {
		 String sql="update doubts set answer='"+answer+"' where question='"+question+"'";
		 int i=stmt.executeUpdate(sql);
		 if(i == 1)
		  con.commit();
		}
	  }
	  
	   out.print("</table>");
	   out.print("<br><br><br><br><br><br><br>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'></p>");
	   out.print("<br><br><br><br>");
	   out.print("<input type='hidden' name='facultyid' value='"+fid+"'>");
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");
	 
	 
    }
   catch(Exception e)
    {
     System.out.println(""+e);
    }
  }
}