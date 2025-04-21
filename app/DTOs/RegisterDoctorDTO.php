<?php

// app/DTOs/RegisterUserDTO.php

namespace App\DTOs;

class RegisterDoctorDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $lastName,
        public readonly string $country,
        public readonly string $document,
        public readonly string $medicalLicenseNumber,
        public readonly string $medicalInstitution,
        public readonly string $address,
        public readonly string $phone,
        public readonly string $idCarcinocheck,
        public readonly string $email,
        public readonly string $password,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            lastName: $data['last_name'],
            email: $data['email'],
            password: $data['password'],
            country: $data['country'],
            document: $data['document'],
            medicalLicenseNumber: $data['medical_license_number'],
            medicalInstitution: $data['medical_institution'],
            address: $data['address'],
            phone: $data['phone'],
            idCarcinocheck: $data['carcinocheck_id'],
        );
    }
}
