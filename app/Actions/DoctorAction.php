<?php

namespace App\Actions;

use App\DTOs\RegisterDoctorDTO;
use App\Models\Doctor;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class DoctorAction
{
    public function execute(RegisterDoctorDTO $dto): Doctor
    {
        if (Doctor::where('email', $dto->email)->exists()) {
            throw ValidationException::withMessages(['email' => 'Doutor já registrado.']);
        }
        return Doctor::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
            'last_name' => $dto->lastName,
            'country'  => $dto->country,
            'document'  => $dto->document,
            'medical_license_number'  => $dto->medicalLicenseNumber,
            'medical_institution'  => $dto->medicalInstitution,
            'address'  => $dto->address,
            'phone'  => $dto->phone,
            'carcinocheck_id'  => $dto->idCarcinocheck,
    
        ]);
    }
}
