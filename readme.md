![Github Actions Test Status for tighten/postit](https://github.com/tighten/postit/actions/workflows/tests.yml/badge.svg)

# PostIt
A helpful list of sources to submit original content to. 

## Setup
- Copy the repository to a local location (clone, fork, download)
- Copy the `.env.example` file to `.env`
- On the command line within the root directory of the site:
    - Run `composer install` to install dependencies for Laravel
    - Run `npm install` to install dependencies for Laravel Mix and other JavaScript packages
    - Run `php artisan key:generate`
    - Run `php artisan migrate`
    - Run `php artisan db:seed`


### Installation

1. Clone the repository locally
2. Install dependencies with `composer install` 
3. Copy `.env.example` to `.env` and modify its contents to reflect your local environment
4. Generate application key
```bash
php artisan key:generate
```
5. Create DB and
```bash
php artisan migrate  
```
```bash
php artisan db:seed    
```

## Tasks
- [ ] Checklist for pre and post publish on our individual blog posts?
- [ ] Find other places to apply it to
- [x] Use submissions to fill checkboxes on load
- [x] Add and delete submissions based on checkbox clicks
- [x] bigger checkboxes
- [x] Design
