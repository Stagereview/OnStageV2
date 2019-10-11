<?php
// // Home > Blog
// Breadcrumbs::for([name in template render], function ($trail) {
//     $trail->parent([the parent]);
//     $trail->push([name on the site], route([route in web.php]));
// });


// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Search
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('home');
    $trail->push('Search', route('company'));
});

// Home > [Company]
Breadcrumbs::for('company', function ($trail, $company) {
    $trail->parent('home');
    $trail->push($company->name, route('company.show', $company->id));
});

// // Home > Blog
// Breadcrumbs::for('blog', function ($trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });