<?php
// // doe hier je tree
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
    $trail->push('Zoeken: '.$query, route('company.search', $query));
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

// Home > [Company] > new contact
Breadcrumbs::for('new-contact', function ($trail, $company) {
    $trail->parent('company', $company);
    $trail->push('Nieuwe contact', route('contact.create', $company->id));
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