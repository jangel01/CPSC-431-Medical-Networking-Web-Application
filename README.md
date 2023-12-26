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

## Medical Professional - Editing Practice
![image13](https://github.com/jangel01/CPSC-431-project/assets/60250253/ade8ab16-e349-4b6b-851a-c87316a2c63b)
![image26](https://github.com/jangel01/CPSC-431-project/assets/60250253/74056c3c-1f40-4dda-a6b1-0c79888d4ece)
![image28](https://github.com/jangel01/CPSC-431-project/assets/60250253/624f9e5d-e21c-4562-9932-c9c17e9d9aaa)

Medical companies do not have a practice. And If they were to navigate to edit-practice.php they will simply be redirected to their profile details page.

## Profile Details
### User details 

![image17](https://github.com/jangel01/CPSC-431-project/assets/60250253/f3bb1beb-1fb6-4532-8aae-c4e86a674afd)
![image20](https://github.com/jangel01/CPSC-431-project/assets/60250253/53df4d83-c68f-4422-a19c-f4a09d58178c)

Note: Medical professionals and companies have different fields.

### Food and availability preferences:
![image10](https://github.com/jangel01/CPSC-431-project/assets/60250253/ad3a6b5f-1474-45cf-b170-af7e5d00d8d4)
![image19](https://github.com/jangel01/CPSC-431-project/assets/60250253/f25110c2-56c0-4c94-94fc-2e1f48e27ce7)
![image7](https://github.com/jangel01/CPSC-431-project/assets/60250253/c0249754-66c5-456c-b857-d94c8f65275b)

This functionality operates the same for both types of users.

## Search
### Speciality
![image14](https://github.com/jangel01/CPSC-431-project/assets/60250253/9ca69b1d-4ea1-461f-a3f3-c108a62a7eb1)
### Medical Professional Name
![image27](https://github.com/jangel01/CPSC-431-project/assets/60250253/7e6c84e0-bfd6-4b03-812c-3c02d103db97)
### Medical Company Name
![image22](https://github.com/jangel01/CPSC-431-project/assets/60250253/ae005af9-8a34-46e4-9007-94da47e084fa)
### Location
![image11](https://github.com/jangel01/CPSC-431-project/assets/60250253/0ce0790e-0e69-41c2-b82f-ca5fa4022065)
### No search query
![image23](https://github.com/jangel01/CPSC-431-project/assets/60250253/ecd9c7a3-9fe0-4074-b7d6-013c9c104430)

Having nothing for the search query will simply yield all the results with the selected filter.

