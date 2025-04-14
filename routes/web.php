    <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\CoctelController;
    use App\Http\Controllers\RenderController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    // SECCION RENDER JQUERY - LARAVEL COMPONENT
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [RenderController::class, 'index'])->name('dashboard');
        Route::get('/dashboard/section', [RenderController::class, 'renderData'])->name('render.data');
    });

    // SECCION OPERACIONES CRUD
    Route::middleware('auth')->group(function () {
        Route::post('/confirmacion', [CoctelController::class, 'index'])->name('confirmacion.index');
        Route::post('/confirmacion/create', [CoctelController::class, 'create'])->name('confirmacion.create');
        Route::delete('/confirmacion/delete/{id}', [CoctelController::class, 'destroy'])->name('confirmacion.delete');

        Route::get('/confirmacion/edit/{id}', [CoctelController::class, 'edit'])->name('confirmacion.edit');
        Route::put('/confirmacion/update/{id}', [CoctelController::class, 'update'])->name('confirmacion.update');
    });

    // SECCION DE PERFIL
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';



