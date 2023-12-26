# Assignment Prompt

Develop an application to enhance physician-company relationships, addressing the current challenge of inefficient networking through meals for practice growth. The project involves designing a scheduling platform where medical offices can list available times, food preferences, and manage meeting requests efficiently. Evaluation criteria include requirements fulfillment, application versatility, implementation effectiveness, visual appeal, comprehensive test cases, and detailed documentation. The project can be done individually or in groups with an expected effort of 20-25 hours per student, due in the last week of the class.

Requirement breakdown:

- Writing the requirements (diagram, text, etc) - 10%
- Application versatility - 10%
- Implementation (based on the requirements) - 50%
- Visual appealing - 10%
- Testing Cases - 10%
- Documentation (including comments) - 10%

# Set up
(This project requires XAMPP)

1. Set up database and populate. Simply navigate to /init-database.php on your browser like this (your url will be different depending on your root path):
![Screenshot 2023-12-25 173130](https://github.com/jangel01/CPSC-431-project/assets/60250253/15841db3-c722-43ad-8030-32cf6d9663f9)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You should see a page that displays everything was successful: ![Screenshot 2023-12-25 173236](https://github.com/jangel01/CPSC-431-project/assets/60250253/3f2370d0-0f4e-4df3-bd6f-f6d689875917)

2. You can exit the init-database.php and now start up the site (go to index.php)

## Medical professional accounts that are already set up:
- johndoe@example.com
- janesmith@example.com
- maryjohnson@example.com
- micahelbrown@example.com
- sarahwilson@example.com
- alexturner@example.com
- emilyjackson@example.com

All passwords are the names of the users. So for example johndoe@example.com ‘s password
is johndoe

## Medical Company accounts that are already set up:
- company1@example.com
- company2@example.com
- company3@example.com

Similar to medical professionals, the passwords for these accounts are the name of the
company. So for example company1@example.com ‘s password is company.

# Project

## Signup
![image21](https://github.com/jangel01/CPSC-431-project/assets/60250253/38c07e68-1eb2-4286-832d-aa170ef8370c)
![image18](https://github.com/jangel01/CPSC-431-project/assets/60250253/a1703f4f-3b00-4d86-8e56-72311c69bc65)

Successful sign ups will redirect to another page depending on the user type. Medical professionals will be redirected to a page where they have to select their practice. Medical companies will be redirected to a page where they have to select their time and availability preferences.

## Medical Professional – Adding practice
You can select an existing practice or add a new one. Adding an existing practice will prompt an error: 

![image1](https://github.com/jangel01/CPSC-431-project/assets/60250253/a5e983fc-2617-403e-adeb-7424ecb4c994)
![image15](https://github.com/jangel01/CPSC-431-project/assets/60250253/3e957da1-f653-4aa8-86c7-b2e8f2cfc9fc)

If you select a practice from the list or create a practice with a name that doesn’t exist, you will be redirected to the page where you select your preferences. 

## Profile Details
### User details 

![image17](https://github.com/jangel01/CPSC-431-project/assets/60250253/f3bb1beb-1fb6-4532-8aae-c4e86a674afd)
![image20](https://github.com/jangel01/CPSC-431-project/assets/60250253/53df4d83-c68f-4422-a19c-f4a09d58178c)

Note: Medical professionals and companies have different fields.

### Food and availability preferences:

