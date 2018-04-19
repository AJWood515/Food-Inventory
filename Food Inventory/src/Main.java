import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;


//Food Inventory Final Project


public class Main {

	public static void main(String[] args) throws Exception {
		//Accessing driver from the JAR file
		Class.forName("com.mysql.jdbc.Driver");
		
		//creating a connection for the variable called "con"
		Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory","root","root");
		//"jdbc:mysql://localhost:3306/foodinventory" -----> this is the database
		// root is the database user
		//root is the password
		
		//test query
		PreparedStatement statement = con.prepareStatement("select * from ingredients");
		
		//creating a variable to execute query
		ResultSet result = statement.executeQuery();
		
		while (result.next()) {
			System.out.println(result.getString(1) + " " + result.getString(2));
		}
		//getString(1) is first field in table and getString(2) is the second field
		
	}

}
