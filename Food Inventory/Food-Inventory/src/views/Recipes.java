package views;

import javax.swing.JPanel;
import javax.swing.SpringLayout;
import javax.swing.JList;
import javax.swing.JScrollPane;
import javax.swing.JButton;
import javax.swing.JTextField;
import javax.swing.SwingConstants;

public class Recipes extends JPanel 
{
	private JTextField txtRecipes;

	/**
	 * Create the panel.
	 */
	public Recipes() 
	{
		SpringLayout springLayout = new SpringLayout();
		setLayout(springLayout);
		
		JScrollPane scrollPane = new JScrollPane();
		springLayout.putConstraint(SpringLayout.NORTH, scrollPane, 10, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, scrollPane, 10, SpringLayout.WEST, this);
		springLayout.putConstraint(SpringLayout.SOUTH, scrollPane, -10, SpringLayout.SOUTH, this);
		add(scrollPane);
		
		JList list = new JList();
		scrollPane.setViewportView(list);
		
		txtRecipes = new JTextField();
		txtRecipes.setHorizontalAlignment(SwingConstants.CENTER);
		txtRecipes.setText("Recipes");
		scrollPane.setColumnHeaderView(txtRecipes);
		txtRecipes.setColumns(10);
		
		JButton btnOpenRecipie = new JButton("Open Recipie");
		springLayout.putConstraint(SpringLayout.SOUTH, btnOpenRecipie, 35, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.EAST, scrollPane, -125, SpringLayout.WEST, btnOpenRecipie);
		springLayout.putConstraint(SpringLayout.NORTH, btnOpenRecipie, 10, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, btnOpenRecipie, -163, SpringLayout.EAST, this);
		springLayout.putConstraint(SpringLayout.EAST, btnOpenRecipie, -10, SpringLayout.EAST, this);
		add(btnOpenRecipie);
		
		JButton btnAddRecipe = new JButton("Add Recipe");
		springLayout.putConstraint(SpringLayout.NORTH, btnAddRecipe, 10, SpringLayout.SOUTH, btnOpenRecipie);
		springLayout.putConstraint(SpringLayout.WEST, btnAddRecipe, 0, SpringLayout.WEST, btnOpenRecipie);
		springLayout.putConstraint(SpringLayout.SOUTH, btnAddRecipe, 35, SpringLayout.SOUTH, btnOpenRecipie);
		springLayout.putConstraint(SpringLayout.EAST, btnAddRecipe, 0, SpringLayout.EAST, btnOpenRecipie);
		add(btnAddRecipe);
		
		JButton btnRemoveRecipe = new JButton("Remove Recipe");
		springLayout.putConstraint(SpringLayout.NORTH, btnRemoveRecipe, 10, SpringLayout.SOUTH, btnAddRecipe);
		springLayout.putConstraint(SpringLayout.WEST, btnRemoveRecipe, 0, SpringLayout.WEST, btnOpenRecipie);
		springLayout.putConstraint(SpringLayout.SOUTH, btnRemoveRecipe, 35, SpringLayout.SOUTH, btnAddRecipe);
		springLayout.putConstraint(SpringLayout.EAST, btnRemoveRecipe, 0, SpringLayout.EAST, btnOpenRecipie);
		add(btnRemoveRecipe);
       
	}
}
