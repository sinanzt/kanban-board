<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    public function index() {
        return "get task List";
    }

    public function show($id) {
        return "get Task";
    }

    public function store() {
        return "task added";
    }

    public function update() {
        return "task updated";
    }

    public function destroy() {
        return "task deleted";
    }
}


// Action  Route Name
// GET           /users                      index   users.index
// GET           /users/create               create  users.create
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// GET           /users/{user}/edit          edit    users.edit
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy