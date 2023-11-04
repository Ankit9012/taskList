<?php

/**
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 *
 * PHP version 8.1
 *
 * @category Web_Routes
 *
 * @author Display Name <ix.ankit9012@gmail.com>

 * @license tag in file commentphpcs
 *
 * @version CVS:<1>
 *
 * @link sdad
 */

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Use for sample data
 *
 * @category Demo_Data
 *
 * @author  Display Name <ix.ankit9012@gmail.com>
 * @license tag in class commentphpcs
 *
 * @link tag in class commentphpcs
 */
Route::get(
    '/',
    function () {
        $tasks = Task::latest()->get();

        return view('index', ['tasks' => $tasks]);
    }
)->name('task.index');

Route::get(
    '/task',
    function () {
        return view('create');
    }
)->name('task.create');

Route::post(
    '/task',
    function (Request $request) {
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required',
                'long_description' => 'nullable',
            ]
        );

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->long_description = $request->long_description;
        $task->save();

        return redirect()->route('task.show', ['id' => $task->id]);
    }
)->name('task.create');

Route::get(
    '/task/{id}',
    function ($id) {

        $task = Task::findOrFail($id);

        return view('show', ['task' => $task]);
    }
)->name('task.show');
