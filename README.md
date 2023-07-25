### Larajobs's - Desktop Notification Application
In the dynamic world of web development, where user engagement and real-time interactions have become paramount, staying ahead of the curve is essential. Welcome to Larajob's Web Notification, an innovative open-source project built on Laravel's recently released NativePHP package. This desktop application project aims to revolutionize how users interact with web applications, offering seamless and real-time notifications for enhanced user experiences.

This project is developed using Websockets for realtime server-client communication.


### Installation
First clone the repository using below mentioned git command.
```bash
	git clone https://github.com/rajentrivedi/larajob-desktop-notification.git
```
Install all dependancies using below mentioned composer command.
```bash
	composer install
```
Install NPM depandencies
```bash
	npm install
```
Rename .env.example to .env
```bash
   cp .env.example .env
```
Key Generation
```bash
	php artisan key:generate
```

### Run The Project
To run the project 
```bash
	php artisan serve
```
```bash
	php artisan websockets:serve
	php artisan native:install
	npm run dev
```

[Thank You Marcel Pociot ](https://github.com/mpociot)




