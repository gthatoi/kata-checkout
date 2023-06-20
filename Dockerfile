FROM php:8.2-alpine

# Set working directory
WORKDIR /app

# Copy application files
COPY . /app

# Install PHP extensions
RUN apk --no-cache add curl git

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Expose port 8000
EXPOSE 8000

# Start the server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
