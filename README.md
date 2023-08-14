# Magento-admin-grid
Aug 2023 - Aug 2023
using UI components for managing the teams and it's members 

# Custom Teams & Member Module

The Custom Teams & Member Module is a Magento extension that adds functionality related to managing teams and members.

## Custom Teams & Member Module

![Game Screenshot 1](Screenshot/Screenshot%20(60).png)

## Installation

1. Clone or download this repository into the `app/code/Custom/Member` and `app/code/Custom/Teams` directory of your Magento installation.

2. Run the following commands from your Magento root directory:

   ```bash
   bin/magento setup:upgrade
   bin/magento setup:static-content:deploy -f
   bin/magento cache:flush

3. The module will now be installed and ready to use.

## Features

- Adds a new table `custom_member_post` and `custom_teams_post` to the database for storing team member information.
- Adds a new column `status` to the `custom_teams` table for indicating the status of a team.

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

This module is released under the [MIT License](LICENSE).

## Author

Created by Riteshkumar kandane

For any inquiries or feedback regarding the project, you can contact me at:

- LinkedIn: [RITESHKUMAR KANDANE](https://www.linkedin.com/in/dkteriteshkumarkandane/)




