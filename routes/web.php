<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosContratos\DetalleUsuariosContratosController;

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
    return redirect()->route('detalle_contratos.usuarios.edit');
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

#USUARIOS CONTRATOS
Route::group(["middleware" => ['verified', 'auth']], function () {
    Route::prefix('detalle_contratos')->group(function () {
        Route::get('/usuarios', [DetalleUsuariosContratosController::class, 'index'])->name('detalle_contratos.usuarios.edit');
    });
});



###############################################################################################
//ROUTES DE LOS MODELOS PRECARGADOS DE YETI
Route::get('/yeti', function () {
    return view('yeti.index');
    // return redirect()->route('login');
});
// UI
Route::prefix('ui')->group(function () {
    // Form
    Route::prefix('form')->group(function () {
        Route::get('/components', function () {
            return view('yeti.form-components');
        });
        Route::get('/input-groups', function () {
            return view('yeti.form-input-groups');
        });
        Route::get('/layout', function () {
            return view('yeti.form-layout');
        });
        Route::get('/validations', function () {
            return view('yeti.form-validations');
        });
        Route::get('/wizards', function () {
            return view('yeti.form-wizards');
        });
    });

    // Components
    Route::prefix('components')->group(function () {
        Route::get('/alerts', function () {
            return view('yeti.components-alerts');
        });
        Route::get('/avatars', function () {
            return view('yeti.components-avatars');
        });
        Route::get('/badges', function () {
            return view('yeti.components-badges');
        });
        Route::get('/buttons', function () {
            return view('yeti.components-buttons');
        });
        Route::get('/cards', function () {
            return view('yeti.components-cards');
        });
        Route::get('/collapse', function () {
            return view('yeti.components-collapse');
        });
        Route::get('/colors', function () {
            return view('yeti.components-colors');
        });
        Route::get('/dropdowns', function () {
            return view('yeti.components-dropdowns');
        });
        Route::get('/modal', function () {
            return view('yeti.components-modal');
        });
        Route::get('/popovers-tooltips', function () {
            return view('yeti.components-popovers-tooltips');
        });
        Route::get('/tables', function () {
            return view('yeti.components-tables');
        });
        Route::get('/tabs', function () {
            return view('yeti.components-tabs');
        });
        Route::get('/toasts', function () {
            return view('yeti.components-toasts');
        });
    });

    // Extras
    Route::prefix('extras')->group(function () {
        Route::get('/carousel', function () {
            return view('yeti.extras-carousel');
        });
        Route::get('/charts', function () {
            return view('yeti.extras-charts');
        });
        Route::get('/editors', function () {
            return view('yeti.extras-editors');
        });
        Route::get('/sortable', function () {
            return view('yeti.extras-sortable');
        });
    });
});

// Applications
Route::prefix('applications')->group(function () {
    Route::get('/chat', function () {
        return view('yeti.applications-chat');
    });
    Route::get('/media-library', function () {
        return view('yeti.applications-media-library');
    });
    Route::get('/point-of-sale', function () {
        return view('yeti.applications-point-of-sale');
    });
    Route::get('/to-do', function () {
        return view('yeti.applications-to-do');
    });
});

// Pages
Route::prefix('pages')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', function () {
            return view('yeti.auth-login');
        });
        Route::get('/forgot-password', function () {
            return view('yeti.auth-forgot-password');
        });
        Route::get('/register', function () {
            return view('yeti.auth-register');
        });
    });
    Route::prefix('blog')->group(function () {
        Route::get('/list', function () {
            return view('yeti.blog-list');
        });
        Route::get('/list-card-rows', function () {
            return view('yeti.blog-list-card-rows');
        });
        Route::get('/list-card-columns', function () {
            return view('yeti.blog-list-card-columns');
        });
        Route::get('/add', function () {
            return view('yeti.blog-add');
        });
    });
    Route::prefix('errors')->group(function () {
        Route::get('/403', function () {
            return view('yeti.errors-403');
        });
        Route::get('/404', function () {
            return view('yeti.errors-404');
        });
        Route::get('/500', function () {
            return view('yeti.errors-500');
        });
        Route::get('/under-maintenance', function () {
            return view('yeti.errors-under-maintenance');
        });
    });
    Route::get('/pricing', function () {
        return view('yeti.pages-pricing');
    });
    Route::get('/faqs-layout-1', function () {
        return view('yeti.pages-faqs-layout-1');
    });
    Route::get('/faqs-layout-2', function () {
        return view('yeti.pages-faqs-layout-2');
    });
    Route::get('/invoice', function () {
        return view('yeti.pages-invoice');
    });
});

// Blank
Route::get('/blank', function () {
    return view('yeti.blank');
});


#RUTAS DE AUTENTICACIÓN BREEZE(SIN INSTALAR) LOGIN, REGISTRO, VALADACIONES CORREO Y CONTRASEÑA
require __DIR__ . '/auth.php';
