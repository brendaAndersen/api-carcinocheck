<?php
namespace App\Http\Controllers;

use App\DTOs\RegisterDoctorDTO;
use App\Http\Controllers\Controller;
use App\Services\DoctorService;
use Illuminate\Http\Request;
use Validator;
class DoctorController extends Controller {

    public function __construct(
        protected DoctorService $doctorService
    ){}
    public function index()
    {
        try {
            $doctors = $this->doctorService->index();

            return response()->json([
                'data' => $doctors
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'message' => "Ocorreu um erro!" . $e
            ], 500);
        }
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        try {
            $token = $this->doctorService->login($credentials);
            return response()->json(['message' => 'Login efetuado!', 'token' => $token], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }
    public function register(Request $request){
        $validated = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:doctors,email',
            'password' => 'required|string|min:6',
            'country'     => 'required|string|max:255',
            'document'     => 'required|string|max:255',
            'medical_license_number'     => 'required|string|max:255',
            'medical_institution'     => 'required|string|max:255',
            'carcinocheck_id'     => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'phone'     => 'required|string|max:255',
        ])->validate();
        try {
            $dto = RegisterDoctorDTO::fromArray($validated);
    
            $doctor = $this->doctorService->registerDoctor($dto);
    
            return response()->json([
                'message' => 'Doutor registrado com sucesso!',
                'doctor' => $doctor,
            ], 201);
        } catch(\Exception $e){
            return response()->json([
                'message' => 'Erro: ' . $e->getMessage(),
            ], 500);
        }
    }
}