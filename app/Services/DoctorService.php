<?php

namespace App\Services;

use App\Actions\DoctorAction;
use App\DTOs\RegisterDoctorDTO;
use App\Models\Doctor;
use Hash;
use Illuminate\Support\Facades\Auth;
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
    public function forgotPassword(array $data)
    {
        $doctorFound = Doctor::where('email', $data['email'])->firstOrFail();
        if (!Hash::check($data['old_password'], $doctorFound->password)) {
            throw new \Exception("Senha atual incorreta.");
        }
        $doctorFound->password = Hash::make($data['password']);
        $doctorFound->save();
    
        return $doctorFound;
    }
    
}
