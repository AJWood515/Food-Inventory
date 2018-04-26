import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.Scanner;


/*Food Inventory Final Project
This program connects to the database the user makes through the create database script in the SQL dump
The user interacts with a menu and chooses to either see the current contents of the ingredient table,
see the status of a single ingredient, or alter the quantity of an ingredient if adding or subtracting units
*/

public class Main {

	public static void main(String[] args) throws Exception {
		int selection = 0;
		Scanner in = new Scanner(System.in);
		//Accessing driver from the JAR file
		Class.forName("com.mysql.jdbc.Driver");
		
		//creating a connection for the variable called "con"
		@SuppressWarnings("unused")
		Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory?useSSL=false","root","root");
		//"jdbc:mysql://localhost:3306/foodinventory" -----> this is the database
		// root is the database user
		//root is the password
		//System.out.print("Please enter an ingredient: ");
		//String ingredient = in.nextLine();
		//test query
		
		while (selection != 4) {
			System.out.print("Enter 1 for current inventory list, 2 to find a specific item, 3 to change a quantity, 4 to quit: ");
			selection = in.nextInt();
			if(selection == 1) {
				inventory(); //calls the inventory function which returns full contents of current inventory
				System.out.println("");
			}else if(selection == 2) {
				ingredient();//returns the option to select a particular ingredient to view inventory of
			}else if(selection == 3) {
				edit();
			}
		}System.out.println("GOODBYE");
		
		in.close();
		
	}
	//this method can print out the current data base
	public static void inventory() throws Exception{
		try {
			Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory?useSSL=false","root","root");
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
		}catch (Exception e){System.out.println(e);}
		
	}
	
	//this method can query a specified ingredient
	public static void ingredient() throws Exception {
		@SuppressWarnings("resource")
		Scanner in = new Scanner(System.in);
		try {
			Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory?useSSL=false","root","root");
			
			System.out.print("Enter ingredient: ");
			String ingredientSearch = in.nextLine();
			PreparedStatement ingredient = con.prepareStatement("select * from ingredients where name = '" + ingredientSearch + "'");
			ResultSet result2 = ingredient.executeQuery();
			
			
			while (result2.next()) {
				System.out.println("Name: " + result2.getString(1));
				System.out.println("Quantity: " + result2.getString(2));
				System.out.println("CalPerUnit: " + result2.getString(3));
				System.out.println("UnitsPerCup: " + result2.getString(4));
				System.out.println("Unit: " + result2.getString(5));
				System.out.println("Type: " + result2.getString(6));
				System.out.println(" ");
			}
		}catch (Exception e) {
			System.out.println(e);
		}
	}

	//this method can alter the quantity of a specified ingredient
	public static void edit() throws Exception {
		@SuppressWarnings("resource")
		Scanner in = new Scanner(System.in);
		try {
			Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory?useSSL=false","root","root");
			
			System.out.print("Enter ingredient: ");
			String editIngredient = in.nextLine();
			System.out.print("New quantity: ");
			String quantity = in.nextLine();
			PreparedStatement ingredient = con.prepareStatement("UPDATE ingredients SET quantity = " + quantity + " WHERE name = '" + editIngredient + "'");
			ingredient.executeUpdate();
			
		}catch (Exception e) {
			System.out.println(e);
		}
	}
}
