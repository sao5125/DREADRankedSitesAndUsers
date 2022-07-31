# Dread Based Ranking of Sites and User Accounts
A repository containing a practical implementation of research pertaining to log based alerts and site/user rankings.
For more information on what the DREAD Severity Ranking Model is, please go to this site: https://www.eccouncil.org/cybersecurity-exchange/threat-intelligence/dread-threat-modeling-intro/#:~:text=The%20DREAD%20model%20enables%20analysts,overall%20severity%20of%20the%20risk!

## The Basics

In this application, sites and user accounts are ranked on the same scale using the DREAD model. 
* User accounts with a ranking greater than or equal to the site's can access that page, but accounts with rankings less than that site can not access the page. 
* Invalid access to sites and user accounts are logged.
* Accounts and sites that are deemed critical (for our purposes this is defined as rank 7 and higher) will generate a customizable email alert to system administrators if access is attempted incorrectly.
* User IDs are randomly generated
* Logs contain the following information: User ID (if user is authenticated), Client IP address, date and time of invalid access attempt, and cutomizable text based on the type of access attempted.
* Due to the limited scope of this project, incorrect access attempts for user accounts is defined as invalid password attempts with a valid username, and incorrect access attempts for sites is defined as access to restricted sites from unauthenticated users or users who have a a lower rank than the site.

This idea was formulated as a way to monitor access control violations on privleged sites and user accounts, whom, if compromised, would constitute a substantial loss for the organization. It also puts the brunt of access control monitoring onto the organization and its administrators, thus improving usability.

## Tech Stack

This is hosted on a local XAMPP server using PhP and MySQL (with HTML5 and CSS for styling) .Email Functionality is implemented using PhPMailer. Logs are written to a local text file.

## SQL Database


<img width="1061" alt="Screen Shot 2022-07-31 at 7 56 44 AM" src="https://user-images.githubusercontent.com/110301707/182027536-5a072955-d899-4bd6-9e64-a9f88099973f.png">

## Video Demonstration

[![Watch the video](https://github.com/sao5125/DREADRankedSitesAndUsers/blob/master/accountcreationthumbnail.png)](https://www.youtube.com/watch?v=wIV-UYa1gho)
