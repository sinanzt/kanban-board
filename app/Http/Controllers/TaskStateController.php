<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class TaskStateController extends Controller
{
    public function index() {
        return "get task state List";
    }

    public function show($id) {
        return "get Task state";
    }

    public function store() {
        return "task state added";
    }

    public function update() {
        return "task state updated";
    }

    public function destroy() {
        return "task state deleted";
    }
  

}