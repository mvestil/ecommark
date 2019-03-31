Ecommark 
---
Basic product listing page using RESTful API for demo purposes

#### What you need to see here?

1. Controllers (handles the API request)
    + app/Http/Controllers/Api/
    + app/Http/Controllers/Web/
    
2. Models (represents database tables as objects)
    + app/Models
    
3. Repositories (contains reusable database interactions)
    + app/Repositories
    
4. Service Layer (handles business logics)
    + app/Services
    
5. Resources (transforms responses into JSON API compliant format)
    + app/Http/Resources
        
6. Database Structure (contains database table structures)
    + database/migrations
    
7. User Interface
    + resources/views/products
    + resources/views/layouts
    + public/js
    
7. Automated Tests (contains basic API testing)
    + tests/api
    ```
    Run tests via : vendor/bin/codecept run api
    ```
    
    
#### Installation & Setup
* Make sure you have docker installed
* Go to the project directory and execute
```
./setup.sh
```

* Visit http://localhost:9400


![Product Listing Image](https://github.com/mvestil/ecommark/blob/master/resources/images/product-list.png "Product Listing")

![Product Detail Image](https://github.com/mvestil/ecommark/blob/master/resources/images/product-detail.png "Product Listing")


