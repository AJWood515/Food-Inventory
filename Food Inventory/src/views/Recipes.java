package views;

import javax.swing.JPanel;
import javax.swing.SpringLayout;
import javax.swing.JList;
import javax.swing.JScrollPane;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JTextField;
import javax.swing.SwingConstants;

public class Recipes extends JPanel 
{
	

	/**
	 * Create the panel.
	 */
	public Recipes() 
	{
		SpringLayout springLayout = new SpringLayout();
		setLayout(springLayout);
		
		//Creates a scrollable pane for the list of recipes	
		JScrollPane scrollPane = new JScrollPane();
		springLayout.putConstraint(SpringLayout.NORTH, scrollPane, 10, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, scrollPane, 10, SpringLayout.WEST, this);
		springLayout.putConstraint(SpringLayout.SOUTH, scrollPane, -10, SpringLayout.SOUTH, this);
		add(scrollPane);
		
		//Creates the JList to put in the scroll pane
		JList list = new JList();
		scrollPane.setViewportView(list);
		
		//Label above the scroll pane
		JTextField txtRecipes;
		txtRecipes = new JTextField();
		txtRecipes.setHorizontalAlignment(SwingConstants.CENTER);
		txtRecipes.setText("Recipes");
		scrollPane.setColumnHeaderView(txtRecipes);
		txtRecipes.setColumns(10);
		
		//Creates the View Recipe button
		JButton btnViewRecipie = new JButton("View Recipe");
		springLayout.putConstraint(SpringLayout.SOUTH, btnViewRecipie, 35, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.EAST, scrollPane, -140, SpringLayout.WEST, btnViewRecipie);
		springLayout.putConstraint(SpringLayout.NORTH, btnViewRecipie, 10, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, btnViewRecipie, -163, SpringLayout.EAST, this);
		springLayout.putConstraint(SpringLayout.EAST, btnViewRecipie, -10, SpringLayout.EAST, this);
		add(btnViewRecipie);
		
		//Creates the Add Recipe button
		JButton btnAddRecipe = new JButton("Add Recipe");
		springLayout.putConstraint(SpringLayout.NORTH, btnAddRecipe, 10, SpringLayout.SOUTH, btnViewRecipie);
		springLayout.putConstraint(SpringLayout.WEST, btnAddRecipe, 0, SpringLayout.WEST, btnViewRecipie);
		springLayout.putConstraint(SpringLayout.SOUTH, btnAddRecipe, 35, SpringLayout.SOUTH, btnViewRecipie);
		springLayout.putConstraint(SpringLayout.EAST, btnAddRecipe, 0, SpringLayout.EAST, btnViewRecipie);
		add(btnAddRecipe);
		
		//Creates the Remove Recipe button
		JButton btnRemoveRecipe = new JButton("Remove Recipe");
		springLayout.putConstraint(SpringLayout.NORTH, btnRemoveRecipe, 10, SpringLayout.SOUTH, btnAddRecipe);
		springLayout.putConstraint(SpringLayout.WEST, btnRemoveRecipe, 0, SpringLayout.WEST, btnViewRecipie);
		springLayout.putConstraint(SpringLayout.SOUTH, btnRemoveRecipe, 35, SpringLayout.SOUTH, btnAddRecipe);
		springLayout.putConstraint(SpringLayout.EAST, btnRemoveRecipe, 0, SpringLayout.EAST, btnViewRecipie);
		add(btnRemoveRecipe);
		
		//Creates the Menu button
		JButton btnMenu = new JButton("Menu");
		springLayout.putConstraint(SpringLayout.NORTH, btnMenu, -25, SpringLayout.SOUTH, scrollPane);
		springLayout.putConstraint(SpringLayout.WEST, btnMenu, 0, SpringLayout.WEST, btnViewRecipie);
		springLayout.putConstraint(SpringLayout.SOUTH, btnMenu, -10, SpringLayout.SOUTH, this);
		springLayout.putConstraint(SpringLayout.EAST, btnMenu, 0, SpringLayout.EAST, btnViewRecipie);
		btnMenu.addActionListener(new ActionListener()//action listener for when the button is clicked 
		{
			public void actionPerformed(ActionEvent e)
			{
				ApplicationFrame.setPanel("Menu");//sets the visible panel to the Menu panel
			}
		});
		add(btnMenu);
       
	}
}
