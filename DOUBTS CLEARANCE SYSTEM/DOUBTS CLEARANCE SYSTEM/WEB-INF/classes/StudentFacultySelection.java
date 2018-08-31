import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
public class StudentFacultySelection extends HttpServlet 
{
 Connection con=null;
 Statement stmt=null,stmt1=null;
 java.sql.ResultSet rs=null,rs1=null;
 String subjectcode=null,branch=null,semester=null;
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
	 
	 subjectcode=req.getParameter("subjectcode");
	 branch=req.getParameter("branch");
	 semester=req.getParameter("semester");
	 String fid=req.getParameter("facultyid");
	 
	 if(fid==null)
	  {
	  
	   String sql1="select * from faculty_exp where subjectcode='"+subjectcode+"' and branch='"+branch+"'";
	   rs=stmt.executeQuery(sql1);
	   
	   out.print("<html><head>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
	   out.print("<form name='studentfacultyselection' method='post' action='./StudentFacultySelectionService'>");
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
	    fid=rs.getString(1);
		
		stmt1=con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_UPDATABLE);
		
	    String sql2="select * from faculty_db where fid='"+fid+"'";
		rs1=stmt1.executeQuery(sql2);
		while( rs1.next() )
		 {
		   String facultyname=rs1.getString(2);
		   out.print("<tr><td>"+facultyname);
		   out.print("</td>");
		   out.print("<td><input type='radio' name='facultyid' value='"+fid+"'>"+fid);
		   out.print("</td></tr>");
		 
		 }
		stmt1.close();
		
	  }
		
       out.print("</table>");
       out.print("<input type='hidden' name='branch' value='"+branch+"'>");
	   out.print("<input type='hidden' name='subjectcode' value='"+subjectcode+"'>");
	   out.print("<input type='hidden' name='semester' value='"+semester+"'>");
	   out.print("<br><br><br>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'>");
	   out.print("</p>");
	   out.print("<br><br><br>");
	   out.print("<font color='red' size='5'><p align='center'>");
	   out.print("SELECT ATLEAST ONE FACULTY");
	   out.print("</p></font>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");
	   
	  }
	  else
	  {
	 
	   out.print("<html><head>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
       out.print("<script type='text/javascript'>function validation(){var rollno=null;rollno=document.studentfinal.rollno.value;if(rollno==null){alert('ROLL NUMBER IS MISSING');return false;}else if(rollno.length!=10){alert('ROLL NUMBER MISMATCH');return false;}}</script>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
  	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
	   out.print("<form name='studentfinal' method='post' onSubmit='return validation()' action='./StudentFinalService'>");
	   out.print("<div style='height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;'>");
	   out.print("<img src=logo1.png align='left' height=100% ><br>");
	   out.print("<table>");
	   out.print("<tr><td align='center'  style='padding-left: 150px;'><font size='5' color='white'><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 170px;'><font size='5' color='white'><i>(Autonomous)</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NAAC 'A' GRADE</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font></td></tr>");
	   out.print("</table></div><br><br><br>");
	   out.print("<table> <tr>");
	   out.print("<td align='left' style='padding-left: 100px;'><font color='blue' size='5'>ROLL &nbsp;NUMBER</font></td>");
	   out.print("<td align='left' style='padding-left: 110px;'><font color='blue' size='5'> :</font></td>");
	   out.print("<td align='left' style='padding-left: 120px;'><font color='blue' size='5'><input type='text' name='rollno' size='10'></td></tr>");
	   
	   out.print("<tr><td align='left' style='padding-left: 100px;'><font color='blue' size='5'>ENTER&nbsp;YOUR&nbsp;DOUBT</font></td>");
	   out.print("<td align='left' style='padding-left: 110px;'><font color='blue' size='5'> :</font></td>");
	   out.print("<td align='left' style='padding-left: 120px;'><font color='blue' size='5'>");
	   out.print("<textarea rows='3' cols='100' name='doubt'>");
	   out.print("</textarea>");
	   out.print("</td></tr>");
	   
	   out.print("</table>");
	   out.print("<input type='hidden' name='branch' value='"+branch+"'>");
	   out.print("<input type='hidden' name='subjectcode' value='"+subjectcode+"'>");
	   out.print("<input type='hidden' name='facultyid' value='"+fid+"'>");
	   out.print("<br><br><br>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'>");
	   out.print("</p>");
	   out.print("<br><br><br><br><br><br><br><br><br><br><br><br>");
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");  
	  }
     
    }
   catch(Exception e)
    {
     System.out.println(""+e);
	  try
      {
	   
	   PrintWriter out = res.getWriter();  
	   
	   out.print("<html><head>");
	   out.print("<script type='text/javascript'>window.history.forward();function noBack() { window.history.forward(); }</script>");
	   out.print("<style>html {background: url('content.jpg') no-repeat center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}</style>");
	   out.print("</head>");
	   out.print("<body onload='noBack();'onpageshow='if (event.persisted) noBack();' onunload=''>");
	   out.print("<form name='studentfacultyselection' method='post' action='./StudentFacultySelectionService'>");
	   out.print("<div style='height:150px;padding:0px;border-radius:5px;border:5px solid green;background-color:green;'>");
	   out.print("<img src=logo1.png align='left' height=100% ><br>");
	   out.print("<table>");
	   out.print("<tr><td align='center'  style='padding-left: 150px;'><font size='5' color='white'><b>LAKIREDDY  BALI REDDY  COLLEGE  OF  ENGINEERING</b></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 170px;'><font size='5' color='white'><i>(Autonomous)</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NAAC 'A' GRADE</i></font></td></tr>");
	   out.print("<tr><td align='center' style='padding-left: 200px;'><font size='5' color='white'><i>NBA Accredited, Affliated to JNTUK,Kakinada;ISO 9001:2001 Certified</font></td></tr>");
	   out.print("</table></div><br><br><br>");
	 
	 out.print("<table border='5' align='center' cellspacing='5' cellpadding='5' width='640'>");
	 
	 String sql1="select * from faculty_exp where subjectcode='"+subjectcode+"' and branch='"+branch+"'";
	 rs=stmt.executeQuery(sql1);
	 
	 while( rs.next() )
	  {
	    String fid=rs.getString(1);
		
		stmt1=con.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE,ResultSet.CONCUR_UPDATABLE);
		
	    String sql2="select * from faculty_db where fid='"+fid+"'";
		rs1=stmt1.executeQuery(sql2);
		while( rs1.next() )
		 {
		   String facultyname=rs1.getString(2);
		   out.print("<tr><td>"+facultyname);
		   out.print("</td>");
		   out.print("<td><input type='radio' name='facultyid' value='"+fid+"'>"+fid);
		   out.print("</td></tr>");
		 
		 }
		stmt1.close();
		
	  }
		
       out.print("</table>");
       out.print("<input type='hidden' name='branch' value='"+branch+"'>");
	   out.print("<input type='hidden' name='subjectcode' value='"+subjectcode+"'>");
	   out.print("<br><br><br>");
	   out.print("<p align='center'>");
	   out.print("<input type='submit' name='submit' value='submit'>");
	   out.print("</p>");
	   out.print("<font color='red' size='5'><p align='center'>");
	   out.print("SELECT ATLEAST ONE FACULTY");
	   out.print("</p></font><br><br>");
	   out.print("<br><br><br><br><br><br><br><br><br>");
	   out.print("</form>");
	   out.print("</body>");
	   out.print("<br><div style='width:1340px;height:50px;padding:0px;border-radius:5px;border:5px #AF23A5;background-color:green;'>");
	   out.print("<p align='center'><font size='10' color='white'><i>DOUBTS CLEARANCE SYSTEM</i></font></p>");
	   out.print("</div>");
	   out.print("</html>");
	   
	   
	  }
	 catch(Exception e1)
	  {
	   System.out.println(""+e1);
 	  }

    }
  }
}