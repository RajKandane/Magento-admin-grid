# Magento-admin-grid
Aug 2023 - Aug 2023
using UI components for managing the teams and it's members 

# Custom Teams & Member Module

The Custom Teams & Member Module is a Magento extension that adds functionality related to managing teams and members.

## Custom Teams & Member Module


## Custom Teams Module
![Screenshot 1](Screenshot/Screenshot%20(185).png)
![Screenshot 2](Screenshot/Screenshot%20(186).png)

<br><br><br><br><br> <!-- Add some line breaks for spacing -->

## Manage Member Module

![Screenshot 1](Screenshot/Screenshot%20(192).png)
![Screenshot 2](Screenshot/Screenshot%20(193).png)
![Screenshot 3](Screenshot/Screenshot%20(194).png)

## Installation

1. Clone or download this repository into the `app/code/Custom/Member` and `app/code/Custom/Teams` directory of your Magento installation. Or you can also clone or download this repository into the `app/code/Manage/Member` and `app/code/Manage/Teams` directory of your Magento installation. 

3. Run the following commands from your Magento root directory:

   ```bash
   bin/magento setup:upgrade
   bin/magento setup:static-content:deploy -f
   bin/magento cache:flush

4. The module will now be installed and ready to use.

## Features

- For `app/code/Custom`
- Adds a new table `custom_member_post` and `custom_teams_post` to the database for storing team member information.
- Adds a new column `status` to the `custom_teams` table for indicating the status of a team.
  
- And as for the  `app/code/Manage`
- Adds a new table `manage_member` and `manage_teams` to the database for storing team member information.

## Usage

1. Navigate to the Magento admin panel.
2. Go to **Custom > Members** to manage team members.
3. Use the provided forms to add, edit, or delete team members.

## Contributing

Contributions are welcome! To contribute, follow these steps:

1. Fork this repository.
2. Create a new branch for your feature or bug fix.
3. Make changes and commit them.
4. Submit a pull request.

## License

This module is released under the [MIT License](LICENSE.md).

## Author

Created by Riteshkumar kandane

For any inquiries or feedback regarding the project, you can contact me at:

- LinkedIn: [RITESHKUMAR KANDANE](https://www.linkedin.com/in/dkteriteshkumarkandane/)




