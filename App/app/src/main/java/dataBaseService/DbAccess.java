package dataBaseService;

import java.util.ArrayList;
import java.util.List;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

class DbAccess{
	private static String ConnUser=null;
	private static String ConnPassword=null;
	private static Connection conn=null;
	private static Statement stmt=null;
	private static ResultSet rs=null;

	public int registerEnv() {
		try{
/*			Class.forName("oracle.jdbc.driver.OracleDriver");*/
			Class.forName("com.mysql.jdbc.Driver");
		}
			catch(ClassNotFoundException e){
				System.out.println(e.toString());
			}
		return 0;
	}

	public String connectDB(String Username, String Password, String Servername,String DataBase) {
		String URL="jdbc:mysql://bdm267573465.my3w.com:3306/bdm267573465_db";
/*		String URL="jdbc:sqlserver://127.0.0.1:1434;databaseName=menu";*/
		if(Username==null||Username.trim().equals("")==true){
			return "Username is empty";}
		if(Password==null||Password.trim().equals("")==true){
			return "Password is empty";}
		if(Servername==null||Servername.trim().equals("")==true){
			return "Servername is empty";}
		if(DataBase==null||DataBase.trim().equals("")==true){
			 return "DataBase is empty";}
		try{
			ConnUser=Username;
			ConnPassword=Password;
			conn=DriverManager.getConnection(URL,ConnUser,ConnPassword);
			conn.setAutoCommit(false);
			stmt=conn.createStatement();
		}
		catch(SQLException e){
			return e.toString();
		}
		return "";
	}

	public String execNoSelectSql(String Sql,boolean Commit) {
		if (Sql==null||Sql.trim().equals("")==true){
			return "SQL is empty";
		}
		try{
			stmt.executeUpdate(Sql);
			if(Commit==true){
				conn.commit();
			}
			else{
				conn.rollback();
			}
			dispose();
			return "";
		}catch(SQLException e){
			return e.toString();
		}
	}

	public List<String[]> execSql(String sSql) {
		if (sSql==null||sSql.trim().equals("")==true){
			List<String[]> ErrorInfo=new ArrayList<String[]>();
			String[] errorinfo={"ErrorInfo:SQL is empty!"};
			ErrorInfo.add(errorinfo);
			return ErrorInfo;
		}
		try{
			List<String[]> list=new ArrayList<String[]>();
			rs=stmt.executeQuery(sSql);
			int NumberOfColumns=rs.getMetaData().getColumnCount();
			while(rs.next()){
				List<String> ListValueData=new ArrayList<String>(NumberOfColumns);
				for (int r=1;r<NumberOfColumns+1;r++){
					if (rs.getString(r)==null){
						ListValueData.add("");
					}
					else
					{
						ListValueData.add(rs.getString(r));
					}
				}
			String[] sDatas=(String[])ListValueData.toArray(new String[ListValueData.size()]);
			list.add(sDatas);
			}
			dispose();
			return list;
		}catch(SQLException e){
			List<String[]> ErrorInfo=new ArrayList<String[]>();
			String[] errorinfo={"AAAAASSSSDDDDFFGGHHJKLL:::",e.toString()};
			ErrorInfo.add(errorinfo);
			return ErrorInfo;
		}
	}

	public String getCount(String sSql) {
		if (sSql==null||sSql.trim().equals("")==true){
			return "SQL is Empty!";
		}
		try{
			int result=0;
			rs=stmt.executeQuery(sSql);
			while(rs.next()){
				if(rs.getInt(1)==0) result=0;
				else
				{
					result=rs.getInt(1);
				}
			}
			dispose();
		return String.valueOf(result);
		}catch(SQLException e){
			return e.toString();
		}
	}

	public int getMaxValue(String sSql) {
		int result=Integer.valueOf(getCount(sSql))+1;
		dispose();
		return result;
	}

	public int dispose() {
		try{
			if(rs!=null) rs.close();
			if(stmt!=null) stmt.close();
			if(conn!=null) conn.close();
		}catch(SQLException e){
			System.out.println(e.toString());
		return -1;}
		return 0;
	}

}
