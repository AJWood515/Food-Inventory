import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.Scanner;


//Food Inventory Final Project


public class Main {

	public static void main(String[] args) throws Exception {
		
		Scanner in = new Scanner(System.in);
		//Accessing driver from the JAR file
		Class.forName("com.mysql.jdbc.Driver");
		
		//creating a connection for the variable called "con"
		Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory","root","root");
		//"jdbc:mysql://localhost:3306/foodinventory" -----> this is the database
		// root is the database user
		//root is the password
		//System.out.print("Please enter an ingredient: ");
		//String ingredient = in.nextLine();
		//test query
		PreparedStatement statement = con.prepareStatement("select * from ingredients");
		
		//creating a variable to execute query
		ResultSet result = statement.executeQuery();
		//set header
		System.out.printf((String.format("%-20s|", "Name") + (String.format("%-20s|", "Quantity") + 
		(String.format("%-20s|", "CalPerUnit") + (String.format("%-20s|", "UnitsPerCup")  + 
		(String.format("%-20s|", "Unit")  + (String.format("%-20s|%n", "Type"))))))));
		System.out.println("------------------------------------------------------------------------------------------------------------------------------");
		//run loop through database to populate console with ingredients list and info
		while (result.next()) {
			
			System.out.printf((String.format("%-20s|", result.getString(1)) + (String.format("%-20s|", result.getString(2)) + 
			(String.format("%-20s|", result.getString(3)) + (String.format("%-20s|", result.getString(4))  + 
			(String.format("%-20s|", result.getString(5))  + (String.format("%-20s|%n", result.getString(6)))))))));
		}
		//getString(1) is first field in table and getString(2) is the second field, etc.
		
		
	}
	
	

}
