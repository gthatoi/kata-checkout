# Kata Checkout

The Kata Checkout is a RESTful API built with Lumen which has a supermarket checkout price calculation functionality (based on pricing configurations) 
Additionally, it has Unit Tests :D

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
   git clone https://github.com/your-username/checkout-service.git

2. Navigate to the project directory:
    ```bash
    cd kata-checkout
3. Create a .env file by making a copy of the .env.example file:
   ```bash
   cp .env.example .env
   ```
4. Run the Makefile
   ```bash
    make install
   ```
   # This command will start a Docker container named kata-checkout on port 8000
5. Kata should now be up and running at http://localhost:8000.

## API

Here are the REST endpoint provided for the checkout:

### Calculate Total Price

**Endpoint**: `POST /checkout`

Calculate the total amount of items in the supermarket checkout.

**Request Body**:

```json
{
    "skus": [
        "A",
        "B",
        "A",
        "C",
        "D",
        "A",
        "B"
    ]
}
```
**Response**:

The response from kata-checkout API will be in JSON format and contain the calculated total amount based on the provided items in the supermarket checkout.

Example response:

```json
{
    "totalAmount": 210
}
```
## Unit Tests

The Checkout Service includes unit tests to ensure the correctness of its functionality. To run the unit tests, follow these steps:

1. Access the running Docker container:

   ```bash
   docker exec -it kata-checkout /bin/sh
   
2. Run the unit test:
```bash
   vendor/bin/phpunit
```
The unit tests cover various scenarios that ensures the correct price calculation of the Checkout. 
You can modify the unit tests to match your requirements and test cases.

💃🕺
