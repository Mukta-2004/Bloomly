
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Api\ArrangementApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Public — anyone can view arrangements
Route::get('/arrangements', [ArrangementApiController::class, 'index']);
Route::get('/arrangements/{arrangement}', [ArrangementApiController::class, 'show']);

// Login — exchanges email/password for a token
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});

// Protected — requires a valid token
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/arrangements', [ArrangementApiController::class, 'store']);
});