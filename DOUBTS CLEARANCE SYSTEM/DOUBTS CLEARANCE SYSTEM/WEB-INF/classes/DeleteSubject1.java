import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class DeleteSubject1 extends HttpServlet 
{
 Connection con=null;
 Statement stmt=null,stmt1=null;
 java.sql.ResultSet rs=null;
 java.sql.ResultSet rs1=null;
 String branch=null,semester=null;
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
	 
	 String subjectcode=req.getParameter("subjectcode");
	 branch=req.getParameter("branch");
	 semester=req.getParameter("semester");
	 
	 if(subjectcode==null)
	  {
	   
	   String sql="select * from subjects where semester='"+semester+"' and branch='"+branch+"'";
	   rs=stmt.executeQuery(sql);
	   
	   out.print("<html><head>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
       out.print("<form name='studentsubjectselection' method='post' action='./DeleteSubject1Service'>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
	   out.print("<div style='height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;'>");
	   out.print("<img src=logo1.png align='left' height=100% ><br>");
	   out.print("<table>");
	   out.print("<tr><td align='center'  style='padding-left: 150px;'><font size='5' color='white'><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 170px;'><font size='5' color='white'><i>(Autonomous)</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NAAC 'A' GRADE</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font></td></tr>");
	   out.print("</table></div><br><br><br>");
	   out.print("<table border='5' align='center' cellspacing='5' cellpadding='5' width='640'>");	   
	   while( rs.next())
	   {
	    String subjectname=rs.getString(1);
		subjectcode=rs.getString(2);
 	    out.print("<tr>");
		out.print("<td>"+subjectname);
		out.print("</td>");
		out.print("<td><input type='radio' name='subjectcode' value='"+subjectcode+"'>"+subjectcode);
		out.print("</td></tr>");
	   }
	   out.print("</table>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'>");
	   out.print("</p>");
	   out.print("<br><br><br><br>");
	   out.print("<font color='red' size='5'><p align='center'>");
	   out.print("SELECT ATLEAST ONE SUBJECT");
	   out.print("</p></font>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("<input type='hidden' name='semester' value='"+semester+"'>");
	   out.print("<input type='hidden' name='branch' value='"+branch+"'>");
	   
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");

	  }
	 else
	  {
	    
		String sql="delete from subjects where subjectcode='"+subjectcode+"'";
		int i=stmt.executeUpdate(sql);
		if(i==1)
		 {
		  con.commit();
	   String sql1="select * from subjects where semester='"+semester+"' and branch='"+branch+"'";
	   rs1=stmt.executeQuery(sql1);  
	   out.print("<html><head>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
       out.print("<form name='studentsubjectselection' method='post' action='./DeleteSubject1Service'>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
	   out.print("<div style='height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;'>");
	   out.print("<img src=logo1.png align='left' height=100% ><br>");
	   out.print("<table>");
	   out.print("<tr><td align='center'  style='padding-left: 150px;'><font size='5' color='white'><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 170px;'><font size='5' color='white'><i>(Autonomous)</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NAAC 'A' GRADE</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font></td></tr>");
	   out.print("</table></div><br><br><br>");
	   out.print("<table border='5' align='center' cellspacing='5' cellpadding='5' width='640'>");	   
	   while( rs1.next())
	   {
	    String subjectname=rs1.getString(1);
		subjectcode=rs1.getString(2);
 	    out.print("<tr>");
		out.print("<td>"+subjectname);
		out.print("</td>");
		out.print("<td><input type='radio' name='subjectcode' value='"+subjectcode+"'>"+subjectcode);
		out.print("</td></tr>");
	   }
	   out.print("</table>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'>");
	   out.print("</p>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("<input type='hidden' name='semester' value='"+semester+"'>");
	   out.print("<input type='hidden' name='branch' value='"+branch+"'>");
	   
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");
		  
		 }
	  }
	}
     catch(Exception e2)
      {
        System.out.println(""+e2);
	  }	  
  }
 }