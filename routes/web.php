<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('quatrea.home');
})->name('home');

Route::get('/collection', function () {
    return view('quatrea.collection');
})->name('collection');

Route::get('/product/{slug}', function (string $slug) {
    return view('quatrea.product', ['slug' => $slug]);
})->name('product');

Route::get('/our-story', function () {
    return view('quatrea.story');
})->name('story');

Route::get('/discover-notes', function () {
    return view('quatrea.notes');
})->name('notes');

Route::get('/contact', function () {
    return view('quatrea.contact');
})->name('contact');

Route::get('/bag', function () {
    return view('quatrea.bag');
})->name('bag');

Route::post('/contact/send', function (Request $request) {
    $request->validate([
        'name' => 'required|string|min:2|max:100',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|min:2|max:200',
        'message' => 'required|string|min:10|max:5000',
    ]);

    return back()->with('success', 'Your message has been received. We will be in touch shortly.');
})->name('contact.send');

Route::post('/newsletter', function (Request $request) {
    $request->validate([
        'email' => 'required|email|max:255',
    ]);

    return back()->with('newsletter_success', 'Thank you for joining the QUATRÉA world.');
})->name('newsletter');
