<?php

namespace App\Services;

use App\Actions\DoctorAction;
use App\DTOs\RegisterDoctorDTO;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\ValidationException;

class DoctorService
{
    public function __construct(
        protected DoctorAction $doctorAction
    ) {}
    public function index(){
        return Doctor::all();
    }
    public function registerDoctor(RegisterDoctorDTO $dto)
    {
        return $this->doctorAction->execute($dto);
    }

    public function login(array $credentials){
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciais inválidas.'],
            ]);
        }
    
        $user = Auth::user();
        return $user->createToken('api-token')->plainTextToken;
    
    }
}
