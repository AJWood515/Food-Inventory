package views;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Vector;

import javax.swing.DefaultListModel;
import javax.swing.JButton;
import javax.swing.JList;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextField;
import javax.swing.SpringLayout;
import javax.swing.SwingConstants;

import java.awt.Font;

public class Inventory extends JPanel 
{
	DefaultListModel<String> inventoryList = new DefaultListModel<String>();
	/**
	 * Create the panel.
	 */
	public Inventory() 
	{		
		Vector<String> tempList = ApplicationFrame.getDbData().getInventoryList();
		for(int i = 0; i < tempList.size(); i++)
		{
			inventoryList.addElement(tempList.get(i));
		}
		
		SpringLayout springLayout = new SpringLayout();
		setLayout(springLayout);
		
		//Creates a scrollable pane for the list of ingredients 	
		JScrollPane scrollPane = new JScrollPane();
		springLayout.putConstraint(SpringLayout.NORTH, scrollPane, 10, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, scrollPane, 10, SpringLayout.WEST, this);
		springLayout.putConstraint(SpringLayout.SOUTH, scrollPane, -10, SpringLayout.SOUTH, this);
		add(scrollPane);
		
		//Creates the JList to put in the scroll pane
		JList list = new JList(inventoryList);
		list.setFont(new Font("monospaced", (list.getFont()).getStyle(), (list.getFont()).getSize()));
		scrollPane.setViewportView(list);
		
		//Label above the scroll pane
		JTextField txtInventory;
		txtInventory = new JTextField();
		txtInventory.setHorizontalAlignment(SwingConstants.CENTER);
		txtInventory.setText("Inventory");
		scrollPane.setColumnHeaderView(txtInventory);
		txtInventory.setColumns(10);
		
		//Creates the Add Item button
		JButton btnAddItem = new JButton("Add Item(s)");
		springLayout.putConstraint(SpringLayout.SOUTH, btnAddItem, 35, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.EAST, scrollPane, -140, SpringLayout.WEST, btnAddItem);//Constraint for the scroll pane
		springLayout.putConstraint(SpringLayout.NORTH, btnAddItem, 10, SpringLayout.NORTH, this);
		springLayout.putConstraint(SpringLayout.WEST, btnAddItem, -163, SpringLayout.EAST, this);
		springLayout.putConstraint(SpringLayout.EAST, btnAddItem, -10, SpringLayout.EAST, this);
		add(btnAddItem);
		
		//Creates the Remove Item button
		JButton btnRemoveItem = new JButton("Remove Item(s)");
		springLayout.putConstraint(SpringLayout.NORTH, btnRemoveItem, 10, SpringLayout.SOUTH, btnAddItem);
		springLayout.putConstraint(SpringLayout.WEST, btnRemoveItem, 0, SpringLayout.WEST, btnAddItem);
		springLayout.putConstraint(SpringLayout.SOUTH, btnRemoveItem, 35, SpringLayout.SOUTH, btnAddItem);
		springLayout.putConstraint(SpringLayout.EAST, btnRemoveItem, 0, SpringLayout.EAST, btnAddItem);
		add(btnRemoveItem);
		
		//Creates the Menu button
		JButton btnMenu = new JButton("Menu");
		springLayout.putConstraint(SpringLayout.NORTH, btnMenu, -25, SpringLayout.SOUTH, scrollPane);
		springLayout.putConstraint(SpringLayout.WEST, btnMenu, 0, SpringLayout.WEST, btnAddItem);
		springLayout.putConstraint(SpringLayout.SOUTH, btnMenu, -10, SpringLayout.SOUTH, this);
		springLayout.putConstraint(SpringLayout.EAST, btnMenu, 0, SpringLayout.EAST, btnAddItem);
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
