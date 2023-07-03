# Michael Dodd Website

This is the personal website for Michael Dodd built to show off other portfolio items and blog posts.

## How to run

1. Run in first terminal `npm run watch` to build the compiled site in /public
2. Run in new terminal `cd .\public\` to enter the compiled site files
3. Then run `php -S localhost:8080` to serve the php web server for development testing
4. Then start the messenger consumer for emails `cd httpdocs; /opt/plesk/php/8.1/bin/php bin/console messenger:consume async -vv`

## Tech Stack

- Symfony 6
- Tailwind CSS