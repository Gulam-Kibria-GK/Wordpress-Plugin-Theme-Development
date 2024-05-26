# My Store Setup Plugin

My Store Setup Plugin is a WordPress plugin that simplifies the creation of a store site. The plugin guides users through a three-step setup process to gather necessary information and allows them to select a theme to apply to their store.

## Features

- Step-by-step setup process to gather store information
- Customizable themes that can be selected and applied during setup
- Saves store information in the WordPress database
- Automatically switches to the selected theme upon completion

## Installation

1. **Download the Plugin:**
   Download or clone this repository to your WordPress `wp-content/plugins` directory.

   ```bash
   git clone https://github.com/Gulam-Kibria-GK/my-store-setup-plugin.git
   ```

## Directory Structure

my-store-setup-plugin/ <br>
├── my-store-setup-plugin.php (we can add menu options as needed) <br>
├── css/ <br>
│ └── admin-styles.css<br>
├── js/<br>
│ └── admin-scripts.js<br>
├── themes/ (we can add as many themes as needed)<br>
│ ├── theme1/<br>
│ │ ├── index.php<br>
│ │ ├── style.css<br>
│ │ ├── script.js<br>
│ │ ├── functions.php<br>
│ │ └── screenshot.png<br>
│ └── theme2/<br>
│ │ ├── index.php<br>
│ │ ├── style.css<br>
│ │ ├── script.js<br>
│ │ ├── functions.php<br>
│ │ └── screenshot.png<br>
│ └── ...<br>
└── templates/ (Where I can add more steps if needed, such as gathering additional information) <br>
│ ├── step1.php<br>
│ ├── step2.php<br>
│ └── step3.php<br>
│ └── ...</br>
└── ...<br>
