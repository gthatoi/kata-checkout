# Kata Checkout

The Kata Checkout is a RESTful API built with Lumen which has a supermarket checkout price calculation functionality (based on pricing configurations). 
The checkout logic is covered with Unit Tests. 🕺

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Checkout API](#API)
- [Unit Tests](#unit-tests)

## Prerequisites

Before setting up Kata Application, ensure that you have the following prerequisites installed:

- Docker: [Installation Guide](https://docs.docker.com/get-docker/)

## Installation

To set up the Kata Application locally using Docker, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/gthatoi/kata-checkout

2. Navigate to the project directory:
    ```bash
    cd kata-checkout
3. Run the Makefile: This command will start a Docker container named kata-checkout on port 8000, also runs composer install
   ```bash
    make install
   ```

4. Kata should now be up and running at http://localhost:8000.

## API

Here is the REST api postman collection provided for the checkout:
 [Postman Checkout Collection](./checkout-api-postman-collection.json)
(you can import this file in postman)

## Unit Tests

The kata-checkout includes unit tests to ensure the correctness of its functionality. To run the unit tests, follow these steps:

1. Access the running Docker container:

   ```bash
   docker exec -it kata-checkout /bin/sh
   
2. Run the unit test:
```bash
   vendor/bin/phpunit
```
The unit tests cover various scenarios that ensures the correct price calculation of the Checkout. 
You can modify the unit tests to match your requirements and test cases.
