use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::get('/todos/complete/{id}', [TodoController::class, 'complete'])->name('todos.complete');
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
