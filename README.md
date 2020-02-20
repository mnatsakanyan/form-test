# Laravel 6 test task - Form Items 

Frontend Part
Create an interface consisting of a list of items and a form to create and manipulate these
items.
Please find the outline of what the interface should look like below.
On page load application fetches list items from backend if there are any saved.
When navigating to the page, you would be in edit mode by default.
In edit mode, there’s always one blank input field used to create a new list item. It’s
focused on initially.
Upon pressing the “enter” key, a new focused input should appear right after the
current input. An item is deleted using the “backspace” key while in the input.
The button in the top right hand corner is used to switch between a view mode that
looks like a list and the aforementioned editing view.
Depending on changes(update/delete/add) clicking on save would send requests to
backend
Use VueJS with Typescript and Bootstrap. Do not use any additional packages for the form or
item list.

Backend Part
Add a list record resource and create endpoints to fetch/add/edit/delete items using Laravel 6.x
framework.
DB structure is freeform. Please provide instructions on how to run the backend server.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Before Installing

Laravel [Configuration](https://laravel.com/docs/#configuration) 

### Installing

Run

```
npm install
npm run dev
```

And

```
php artisan serve
```

Then go to

```
http://localhost:8000/items
```

## Built With

* [laravel](https://github.com/laravel/laravel) - A PHP framework for web artisans

## Contributing

* [vuejs](https://github.com/vuejs/vue) - Vue.js is a progressive, incrementally-adoptable JavaScript framework for building UI on the web.
* [bootstrap](https://github.com/twbs/bootstrap) - The most popular HTML, CSS, and JavaScript framework for developing responsive, mobile first projects on the web.