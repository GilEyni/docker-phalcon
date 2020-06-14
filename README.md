# Docker - Phalcon Project

This project includes a working example of PHP Phalcon framework being dockerized.
This is only a showcase of a working Docker environment and is not Production ready.

## Containers

* Nginx
* MySQL v8
* PHP-FPM v7.4 with Phalcon framework v4 & Sample project

## Getting Started
Download the repository and navigate to the root folder (location of docker-compose.yml file)

Build and start the containers with docker-compose
```
docker-compose up --build
```

Create MySQL schema and users table
```
yourdomain:3030/init/schema
```

Navigate to the root directory and follow "Sign Up" process
```
yourdomain:3030
```

### Notes
* env.ini file usually will not be committed
*InitController is not a part of the application and only works as a helper to prepare the database.

## License

If you want it, take it! not a lot in here :)

## Acknowledgments

The PHP image used from https://hub.docker.com/u/mileschou