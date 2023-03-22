# Yeti - HTML + Laravel Template

## File Structure

Within the download you'll find the following directory and file structure:

```
Laravel/
├── README.md
├── public/
│	├── build/
│   │	├── css/
│   │	├── images/
│   │	├── fonts/
│   │	├── js/
│	│	└── ...
│	└── ...
├── resources/
│	├── css/
│	├── images/
│	├── js/
│	├── views/
│	│	├── layouts/
│	│	├── partials/
│	│	└── ...
│	└── ...
├── routes
│	├── web.php
│	└── ...
├── package.json
├── tailwind.config.js
├── webpack.mix.js
├── yarn.lock
└── ...
```

## Installation

### Prerequisites

Please install following prerequisites before setup:

-   [Node.js](https://nodejs.org/)
-   [Yarn](https://yarnpkg.com/)
-   [Composer](https://getcomposer.org)

### Setup

Download the package. On `Laravel` directory:

```shell
composer install
```

This will install all the composer packages.

You will find a file named `.env.example`, rename the given file name to `.env`.

```shell
php artisan key:generate
```

This will generate the key.

```shell
yarn
```

This will install all the node packages.

### Builds

You can run the following commands to build for development or production use.

#### Development

```shell
yarn dev
```

#### Production

```shell
yarn build
```
