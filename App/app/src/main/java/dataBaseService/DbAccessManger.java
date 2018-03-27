package dataBaseService;
import java.util.ArrayList;
import java.util.List;
public class DbAccessManger {
	public DbAccess dbAccess=null;
	private static DbAccessManger sing;
	private DbAccessManger(){}
	public static DbAccessManger getInstance(){
		if(sing==null)
			sing=new DbAccessManger();
		return sing;
	}
	public String connDB() {
		DbAccessFactory mysqlDbAccess=new DbAccessFactory();
		dbAccess=mysqlDbAccess.getDbAccess();
		dbAccess.registerEnv();
		String Username="bdm267573465";
		String Password="zjc123456789";
		String Servername="nouse";
		String DataBase="nouse";
		return dbAccess.connectDB(Username, Password, Servername,DataBase);
	}
	public int Dispose() {
		return dbAccess.dispose();
	}
	public String ExecNoSelectSql(String Sql,Boolean Commit) {
		String result=connDB();
		if(result!="") return result;
		else
			result=dbAccess.execNoSelectSql(Sql,Commit);
		Dispose();
		return result;
	}
	public List<String[]> ExecSql(String sSql) {
		String ErrorInfo=connDB();
		if(ErrorInfo!=""){
			String[] errorinfo={"AAAAASSSSDDDDFFGGHHJKLL:::",ErrorInfo};
			List<String[]> info=new ArrayList<String[]>();
			info.add(errorinfo);
			return info;
		}
		List<String[]> result=new ArrayList<String[]>();
		result=dbAccess.execSql(sSql);
		Dispose();
		return result;
	}

	public String GetCount(String sSql) {
		String result=connDB();
		if(result!="") return result;
		else
			result=dbAccess.getCount(sSql);
		Dispose();
		return result;
	}

	public int GetMaxValue(String sSql) {
		connDB();
		int result=dbAccess.getMaxValue(sSql);
		Dispose();
		return result;
	}
}
