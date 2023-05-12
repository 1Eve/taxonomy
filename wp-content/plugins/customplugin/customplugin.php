<?php

/**
 * Plugin Name: Cohort Members Plugin
 * Version: 1.0.0
 * Description: A plugin to manage WordPress cohort members.
 */

class Cohort_Members_Plugin
{
    public function __construct()
    {
        // Register hooks
        add_action('admin_menu', array($this, 'register_admin_menu'));
    }

    public function register_admin_menu()
    {
        add_menu_page(
            'Cohort Members',
            'Cohort Members',
            'manage_options',
            'cohort-members',
            array($this, 'cohort_members_page')
        );
    }

    public function cohort_members_page()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission
            // Capture member details and save them to the database
        } else {
            // Display the add members form
?>
            <div class="wrap" style=" max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;">
                <h1 style="font-size: 24px;
    margin-bottom: 20px;">Add Cohort Members</h1>
                <form method="post" action="">
                    <div style="">
                        <label for="name">Name:</label>
                        <input style="width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 3px;" type="text" name="name" id="name" required><br>
                    </div>
                    <div style="">
                        <label for="phone">Phone Number:</label>
                        <input style="width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 3px;" type="tel" name="phone" id="phone" required><br>
                    </div>
                    <div>
                        <label for="email">Email:</label>
                        <input style="width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 3px;" type="email" name="email" id="email" required><br>
                    </div>
                    <!-- Add any additional fields here -->
                    <input style="background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;" type=" submit" value="Add Member">
                </form>
            </div>
<?php
        }
    }
}

// Instantiate the plugin class
new Cohort_Members_Plugin();
