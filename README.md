# Rest - Spring Boot - CodeIgnitor
(On going project)
As I get bored of the Coronavirus pandemic quanrantine, I will make a webpage to Monitoring BITCOIN price and keep track of all my daily activites

## Feature:
1. Monitoring my daily water drinking. (done)
2. Count how many time I have opened the fridge today. (not yet implemented)
3. Monitoring BITCOIN price including: (done)
-  Displaying current price, halving countdown 
-  Schedule alarm to send Slack message when Bitcoin price reach some certain price.
4. Music player, which streaming: (not yet implemented)
-  Online radio station. 
- ...

## Project Framworks:
  - Front End written in PHP, HTML, CSS using CodeIgnitor frameworks
  - Back End written in Java, MySQL using Spring Boot frameworks.
  
## Current FrontEnd snapshot

![Snapshot of current front end](FrontEnd/images/current-front-end.jpg)


## To Run the Project:
  1. Start mysql server from terminal with
    mysql.server start
  2. Run clean server by navigating into the backend folder
    ./mvnv clean spring-boot:run
    

## Resource:<br/>
[Tutorial - Building REST services with Spring following](https://spring.io/guides/tutorials/rest/) <br/>
[Tutorial - Spring with MySQL](https://spring.io/guides/gs/accessing-data-mysql/) <br/>
[Tool - Add on to Disable CORS in Mozilla FireFox](https://addons.mozilla.org/en-US/firefox/addon/cors-everywhere/)<br/>
[Tool - Cron job](https://medium.com/better-programming/https-medium-com-ratik96-scheduling-jobs-with-crontab-on-macos-add5a8b26c30) <br/>
[API - Nomics Crypto data](http://docs.nomics.com)<br/>
[API - Slack webhooks to send message](https://api.slack.com/tutorials/slack-apps-hello-world)<br/>

  
  
