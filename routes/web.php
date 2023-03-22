<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dahboard
Route::get('/', function () {
    return view('index');
});

# AUTENTICACION BREEZE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#RUTAS CON AUTENTIACION DE USUARIOS Y A SU VEZ DEBEN ESTAR VERIFICADAS
Route::group(["middleware" => ['verified', 'auth']], function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    // Route::get('/dashboard',  ShowCuentas::class)->name('dashboard');
    Route::get('/consultas', function () {
        return view('servicios.consulta-altura');
    })->name('servicios.consultas.altura');
});


// UI
Route::prefix('ui')->group(function () {
    // Form
    Route::prefix('form')->group(function () {
        Route::get('/components', function () {
            return view('form-components');
        });
        Route::get('/input-groups', function () {
            return view('form-input-groups');
        });
        Route::get('/layout', function () {
            return view('form-layout');
        });
        Route::get('/validations', function () {
            return view('form-validations');
        });
        Route::get('/wizards', function () {
            return view('form-wizards');
        });
    });

    // Components
    Route::prefix('components')->group(function () {
        Route::get('/alerts', function () {
            return view('components-alerts');
        });
        Route::get('/avatars', function () {
            return view('components-avatars');
        });
        Route::get('/badges', function () {
            return view('components-badges');
        });
        Route::get('/buttons', function () {
            return view('components-buttons');
        });
        Route::get('/cards', function () {
            return view('components-cards');
        });
        Route::get('/collapse', function () {
            return view('components-collapse');
        });
        Route::get('/colors', function () {
            return view('components-colors');
        });
        Route::get('/dropdowns', function () {
            return view('components-dropdowns');
        });
        Route::get('/modal', function () {
            return view('components-modal');
        });
        Route::get('/popovers-tooltips', function () {
            return view('components-popovers-tooltips');
        });
        Route::get('/tables', function () {
            return view('components-tables');
        });
        Route::get('/tabs', function () {
            return view('components-tabs');
        });
        Route::get('/toasts', function () {
            return view('components-toasts');
        });
    });

    // Extras
    Route::prefix('extras')->group(function () {
        Route::get('/carousel', function () {
            return view('extras-carousel');
        });
        Route::get('/charts', function () {
            return view('extras-charts');
        });
        Route::get('/editors', function () {
            return view('extras-editors');
        });
        Route::get('/sortable', function () {
            return view('extras-sortable');
        });
    });
});

// Applications
Route::prefix('applications')->group(function () {
    Route::get('/chat', function () {
        return view('applications-chat');
    });
    Route::get('/media-library', function () {
        return view('applications-media-library');
    });
    Route::get('/point-of-sale', function () {
        return view('applications-point-of-sale');
    });
    Route::get('/to-do', function () {
        return view('applications-to-do');
    });
});

// Pages
Route::prefix('pages')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', function () {
            return view('auth-login');
        });
        Route::get('/forgot-password', function () {
            return view('auth-forgot-password');
        });
        Route::get('/register', function () {
            return view('auth-register');
        });
    });
    Route::prefix('blog')->group(function () {
        Route::get('/list', function () {
            return view('blog-list');
        });
        Route::get('/list-card-rows', function () {
            return view('blog-list-card-rows');
        });
        Route::get('/list-card-columns', function () {
            return view('blog-list-card-columns');
        });
        Route::get('/add', function () {
            return view('blog-add');
        });
    });
    Route::prefix('errors')->group(function () {
        Route::get('/403', function () {
            return view('errors-403');
        });
        Route::get('/404', function () {
            return view('errors-404');
        });
        Route::get('/500', function () {
            return view('errors-500');
        });
        Route::get('/under-maintenance', function () {
            return view('errors-under-maintenance');
        });
    });
    Route::get('/pricing', function () {
        return view('pages-pricing');
    });
    Route::get('/faqs-layout-1', function () {
        return view('pages-faqs-layout-1');
    });
    Route::get('/faqs-layout-2', function () {
        return view('pages-faqs-layout-2');
    });
    Route::get('/invoice', function () {
        return view('pages-invoice');
    });
});

// Blank
Route::get('/blank', function () {
    return view('blank');
});


#RUTAS DE AUTENTICACIÓN BREEZE(SIN INSTALAR) LOGIN, REGISTRO, VALADACIONES CORREO Y CONTRASEÑA
require __DIR__.'/auth.php';