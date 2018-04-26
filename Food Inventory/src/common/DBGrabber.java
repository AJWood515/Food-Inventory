package common;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.Vector;

public class DBGrabber 
{
	private Vector<String> inventoryList = new Vector<String>();
	
	public DBGrabber()
	{
		grabInventory();
	}
	
	public void grabInventory() 
	{
		try 
	    {
			Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/foodinventory?useSSL=false","root","root");
			PreparedStatement statement = con.prepareStatement("select * from ingredients order by ingredientType");
			
			//creating a variable to execute query
			ResultSet result = statement.executeQuery();
			//set header
			inventoryList.add((String.format("%-20s|", "Name") + (String.format("%-15s|", "Quantity") + 
			(String.format("%-15s|", "CalPerUnit") + (String.format("%-15s|", "UnitsPerCup")  + 
			(String.format("%-15s|", "Unit")  + (String.format("%-15s|%n", "Type"))))))));
			//System.out.println("------------------------------------------------------------------------------------------------------------------------------");
			//run loop through database to populate console with ingredients list and info
			while (result.next())
			{
				
				inventoryList.add((String.format("%-20s|", result.getString(1)) + (String.format("%-15s|", result.getString(2)) + 
				(String.format("%-15s|", result.getString(3)) + (String.format("%-15s|", result.getString(4))  + 
				(String.format("%-15s|", result.getString(5))  + (String.format("%-15s|%n", result.getString(6)))))))));
			}
			//getString(1) is first field in table and getString(2) is the second field, etc.
		}
		catch (Exception e){System.out.println(e);}
		
	}
	
	public Vector<String> getInventoryList()
	{
		return inventoryList;
	}
}

