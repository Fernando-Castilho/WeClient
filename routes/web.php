<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get("/", "index")->name("login.index");
    Route::post("/", "login")->name("login.login");
    Route::get("/logout", "logout")->name("login.logout");
});

Route::controller(AdminController::class)->group(function () {
    Route::get("/admin", "index")->name("admin.index"); 
    Route::get("/admin/clientes", "clientes")->name("admin.clientes");
    Route::get("/admin/clientes/cadastro", "cadastroClientes")->name("admin.cadastroClientes");
    Route::get("/admin/clientes/{id}", "clienteId")->name("admin.clienteId");
    Route::get("/admin/clientes/search/{nome}", "pesquisarClientes")->name("admin.pesquisarCliente");
});

Route::controller(ClienteController::class)->group(function () {
    Route::post("/admin/clientes/cadastro", "cadastrar")->name("cliente.cadastrar");
    Route::put("/admin/clientes/{id}", "atualizar")->name("cliente.atualizar");
    Route::delete("/admin/clientes/{id}", "excluir")->name("cliente.excluir");
});