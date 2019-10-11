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
Breadcrumbs::for('search', function ($trail, $query) {
    $trail->parent('home');
    $trail->push('Searching: '.$query, route('company.search', $query));
});

// Home > [Company]
Breadcrumbs::for('company', function ($trail, $company) {
    $trail->parent('home');
    $trail->push($company->name, route('company.show', $company->id));
});

// Home > [Company] > create
Breadcrumbs::for('create-company', function ($trail, $company) {
    $trail->parent('home');
    $trail->push('Create New Company', route('company.create'));
});

// Home > [Company] > edit
Breadcrumbs::for('edit-company', function ($trail, $company) {
    $trail->parent('company', $company);
    $trail->push('Edit', route('company.edit', $company->id));
});

// Home > [Company] > review
Breadcrumbs::for('review', function ($trail, $company) {
    $trail->parent('company', $company);
    $trail->push("Review", route('review.show', $company->id));
});

// Home > [Company] > new review
Breadcrumbs::for('new-review', function ($trail, $company) {
    $trail->parent('company', $company);
    $trail->push('Nieuwe Review', route('review.create', $company->id));
});

// Home > [User]
Breadcrumbs::for('user', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->first_name, route('users.show', $user->id));
});

// Home > [User] > Edit
Breadcrumbs::for('edit-user', function ($trail, $user) {
    $trail->parent('user', $user);
    $trail->push('Edit', route('users.edit', $user->id));
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