package views;

import java.awt.EventQueue;
import java.awt.GridLayout;
import javax.swing.JFrame;
import javax.swing.JPanel;

import common.DBGrabber;

public class ApplicationFrame 
{

	private static JFrame frame;
	private static DBGrabber dbData = new DBGrabber();
	private static JPanel activePanel;//stores the visible JPanel
	private static Menu menuPanel = new Menu();//Creates a Menu JPanel
	private static Recipes recipesPanel = new Recipes();//Creates a Recipes JPanel	
	private static Inventory inventoryPanel = new Inventory();//Creates a Inventory JPanel
	
	

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) 
	{
		EventQueue.invokeLater(new Runnable() 
		{
			public void run() 
			{
				try 
				{
					ApplicationFrame window = new ApplicationFrame();
					window.frame.setVisible(true);
				} 
				catch (Exception e){
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public ApplicationFrame()
	{
		initialize();
	}

	/**
	 * Initialize the contents of the frame.
	 */
	private void initialize()
	{
		dbData.grabInventory();
		frame = new JFrame();
		frame.setBounds(100, 100, 1050, 800);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setLayout(new GridLayout(1,1));
		activePanel = menuPanel;
		frame.add(activePanel);
	}
	/**
	 * Changes the visible JPanel
	 * @param newPanel is a string value to determine which JPanel to display
	 */
    public static void setPanel(String newPanel)
	{
    	if(newPanel.equals("Menu"))//Makes the Menu JPanel visible
    	{
    		activePanel = menuPanel;
    		frame.setContentPane(activePanel);
    		frame.revalidate();
    	}
    	
        else if(newPanel.equals("Recipes"))//Makes the Recipes JPanel visible
    	{
    	   activePanel = recipesPanel;    	
     	   frame.setContentPane(activePanel);
           frame.revalidate();
    	}
    	
        else if(newPanel.equals("Inventory"))//Makes the Inventory JPanel visible
    	{
    	   activePanel = inventoryPanel;    	
     	   frame.setContentPane(activePanel);
           frame.revalidate();
    	}
    }
    
    public static DBGrabber getDbData()
    {
    	return dbData;
    }

}
