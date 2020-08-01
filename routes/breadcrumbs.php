<?php

/**
 * Plugin from: https://github.com/davejamesmiller/laravel-breadcrumbs
 */

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Login
Breadcrumbs::for('login.form', function ($trail) {
    $trail->parent('home');
    $trail->push('Login', route('login.form'));
});

// Home > Register
Breadcrumbs::for('register.form', function ($trail) {
    $trail->parent('home');
    $trail->push('Register', route('register.form'));
});

// Home > Password reset
Breadcrumbs::for('password.request', function ($trail) {
    $trail->parent('home');
    $trail->push('Reset password', route('password.request'));
});

// Home > Password reset (resetting the password)
Breadcrumbs::for('password.reset', function ($trail) {
    $trail->parent('home');
    $trail->push('Reset password', route('password.request'));
});