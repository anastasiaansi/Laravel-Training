# Laravel-Training
Laravel Project

# [DDEV] Initial project setup

```bash
ddev config 
# configures a project for ddev, creating a .ddev directory according to your responses.
```
```bash
ddev start 
ddev stop
# start and stop the containers that comprise a project. ddev restart just does a stop and a start. ddev poweroff stops all ddev-related containers and projects.
```
```bash
ddev launch -p 
# will launch the phpMyAdmin UI, and ddev launch -m will launch the MailHog UI.
```
and same more:
```bash
ddev composer install
ddev exec "php artisan key:generate"
ddev exec "php artisan migrate:fresh"
ddev exec "php artisan module:seed"
```
... more documentation:
https://ddev.readthedocs.io/en/latest/users/cli-usage/
