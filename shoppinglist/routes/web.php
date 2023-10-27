<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LijstController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAccepted;
use App\Http\Middleware\CheckCommentCount;
use App\Http\Middleware\CheckListOwnership;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//--- USER ROUTES ---//

// Show user profile
Route::get('/profile', [ProfileController::class, 'show'])->middleware(CheckLogin::class)->name('profile.show');
// Delete user page
Route::get('/profile/delete', [ProfileController::class, 'delete'])->middleware(CheckLogin::class)->name('profile.delete');
// Delete user profile
Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->middleware(CheckLogin::class)->name('profile.destroy');
// Update user profile
Route::put('/profile', [ProfileController::class, 'update'])->middleware(CheckLogin::class)->name('profile.update');


//--- LIST ROUTES ---//
Route::get('/lists',[LijstController::class, 'index'])->middleware(CheckLogin::class)->name('lists.index');
Route::put('/lists', [LijstController::class, 'search'])->middleware(CheckLogin::class)->name('lists.search');
Route::get('/lists/{list}', [LijstController::class, 'show'])->middleware(CheckLogin::class)->middleware(CheckAccepted::class)->name('list.show');
Route::post('/comment/{list}', [LijstController::class, 'comment'])->middleware(CheckLogin::class)->middleware(CheckAccepted::class)->name('comment');
Route::delete('comment/{comment}', [LijstController::class, 'destroycomment'])->middleware(CheckLogin::class)->name('comment.delete');
Route::get('/list/create', [LijstController::class, 'create'])->middleware(CheckLogin::class)->middleware(CheckCommentCount::class)->name('list.create');
Route::post('list/create', [LijstController::class, 'add'])->middleware(CheckLogin::class)->middleware(CheckCommentCount::class)->name('list.add');
Route::get('lists/edit/{list}', [LijstController::class, 'edit'])->middleware(CheckLogin::class)->middleware(CheckAccepted::class)->middleware(CheckListOwnership::class)->name('list.edit');
Route::put('lists/edit/{list}', [LijstController::class, 'update'])->middleware(CheckLogin::class)->middleware(CheckAccepted::class)->middleware(CheckListOwnership::class)->name('list.update');
Route::get('lists/delete/{list}', [LijstController::class, 'delete'])->middleware(CheckLogin::class)->middleware(CheckAccepted::class)->middleware(CheckListOwnership::class)->name('list.delete');
Route::delete('lists/delete/{list}', [LijstController::class, 'destroy'])->middleware(CheckLogin::class)->middleware(CheckAccepted::class)->middleware(CheckListOwnership::class)->name('list.destroy');

//--- ADMIN PANEL ROUTES ---//
Route::get('/admin', [Admincontroller::class, 'panel'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.panel');

//--- ADMIN USER PANEL ---//
Route::get('/admin/users', [AdminController::class, 'userindex'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.users.index');
Route::get('/admin/user/edit/{user}', [AdminController::class, 'useredit'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.user.edit');
Route::put('/admin/user/edit/{user}', [AdminController::class, 'userupdate'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.user.update');
Route::get('/admin/user/delete/{user}', [AdminController::class, 'userdelete'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.user.delete');
Route::delete('/admin/user/delete/{user}', [AdminController::class, 'userdestroy'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.user.destroy');

//--- ADMIN LIST PANEL ---//
Route::get('/admin/lists', [AdminController::class, 'listindex'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.lists.index');
Route::put('/admin/lists/{list}', [AdminController::class, 'publish'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.publish');
Route::get('/admin/list/edit/{list}', [AdminController::class, 'listedit'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.list.edit');
Route::put('/admin/list/edit/{list}', [AdminController::class, 'listupdate'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.list.update');
Route::get('/admin/list/delete/{list}', [AdminController::class, 'listdelete'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.list.delete');
Route::delete('/admin/list/delete/{list}', [AdminController::class, 'listdestroy'])->middleware(CheckLogin::class)->middleware(CheckRole::class)->name('admin.list.destroy');

