# PostIt

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
- [x] Use submissions to fill checkboxes on load
- [x] Add and delete submissions based on checkbox clicks
- [x] bigger checkboxes
- [ ] Checklist for pre and post publish on our individual blog posts?
- [ ] Find other places to apply it to
- [ ] Design
