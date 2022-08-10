# BlogLike Content Management System

A complete content management system for creating blogs which uses PHP as its backend, and the front-end is made with HTML, CSS and Javascript.
More Specifically, it uses LESS as its CSS framework, and JQuery and Bootstrap are also used to enhance the user experience.

Note: I created this CMS as a final project for the Database Fundamentals course when I was a second-year bachelor's student.

# Features

One can do all of the following things using the BlogLike CMS:

- Create and edit posts
- Create categories so that each post belongs to one
- Publish external pages
- Create and use custom templates (themes)
- Manage the users, the groups they belong to and the permissions they have
- Get the statistics (views per day)
- Upload files
- Manage the SEO-related tags in the html files (e.g., title, description, og:locale)
- Create custom menus

# Usage

Bloglike requires you to have PHP 5.2 or higher installed on your host. First of all, you have to download the ["BlogLikeCMSv1.0.zip"](https://github.com/arm-on/bloglike-cms/blob/master/BlogLikeCMSv1.0.zip) file and extract it somewhere. While installing the system, please set the permissions of all files belonging to the system to 777, and revert their permission back to 644 after the installation is finished. You will also need to have MySQL installed (the version is not important since it works with all of them).

Assuming that you have copied all of the files into some directory like `localhost/bloglike`, you need to open the same directory on your browser. The system will redirect you to the install folder (e.g., `localhost/bloglike/install`). Continue the installation process to the last step where you feed the database username and password, the host name, and the admin user credentials to the system. After the installation, remove the `install` folder. Then, you can visit the home page at `localhost/bloglike` or the admin panel at `localhost/bloglike/private`. 
