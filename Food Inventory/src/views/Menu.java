package views;

import javax.swing.JPanel;
import javax.swing.SpringLayout;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.SwingConstants;
import javax.swing.JLabel;
import java.awt.Font;

public class Menu extends JPanel 
{
	/**
	 * Create the panel.
	 */
	public Menu() 
	{
		SpringLayout springLayout = new SpringLayout();
		setLayout(springLayout);
		
		//Adds the Recipes button
		JButton btnRecipesButton = new JButton("Recipes");
		springLayout.putConstraint(SpringLayout.WEST, btnRecipesButton, 166, SpringLayout.WEST, this);
		springLayout.putConstraint(SpringLayout.SOUTH, btnRecipesButton, -143, SpringLayout.SOUTH, this);
		springLayout.putConstraint(SpringLayout.EAST, btnRecipesButton, -167, SpringLayout.EAST, this);
		btnRecipesButton.addActionListener(new ActionListener()//action listener for when the button is clicked 
		{
			public void actionPerformed(ActionEvent e)
			{
				ApplicationFrame.setPanel("Recipes");//sets the visible panel to the Recipes panel
			}
		});
		add(btnRecipesButton);
		
		//Adds the Inventory button
		JButton btnInventory = new JButton("Inventory");
		springLayout.putConstraint(SpringLayout.NORTH, btnInventory, 17, SpringLayout.SOUTH, btnRecipesButton);
		springLayout.putConstraint(SpringLayout.WEST, btnInventory, 166, SpringLayout.WEST, this);
		springLayout.putConstraint(SpringLayout.SOUTH, btnInventory, -85, SpringLayout.SOUTH, this);
		springLayout.putConstraint(SpringLayout.EAST, btnInventory, -167, SpringLayout.EAST, this);
		btnInventory.addActionListener(new ActionListener()//action listener for when the button is clicked 
		{
			public void actionPerformed(ActionEvent e)
			{
				ApplicationFrame.setPanel("Inventory");//sets the visible panel to the Inventory Panel
			}
		});
		add(btnInventory);
		
		//Welcome text
		JLabel lblWelcome = new JLabel("Welcome to PREP");
		springLayout.putConstraint(SpringLayout.SOUTH, lblWelcome, -227, SpringLayout.SOUTH, this);
		springLayout.putConstraint(SpringLayout.NORTH, btnRecipesButton, 43, SpringLayout.SOUTH, lblWelcome);
		springLayout.putConstraint(SpringLayout.NORTH, lblWelcome, 40, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, lblWelcome, 144, SpringLayout.WEST, this);
		springLayout.putConstraint(SpringLayout.EAST, lblWelcome, -145, SpringLayout.EAST, this);
		lblWelcome.setHorizontalAlignment(SwingConstants.CENTER);
		lblWelcome.setFont(new Font("Tahoma", Font.PLAIN, 16));
		add(lblWelcome);

	}
	
	
}
