<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conversation;


class DoctorController extends Controller
{
    public function index()
    {
        // Ambil semua user dengan role dokter
        $doctors = User::where('role', 'dokter')->get();

        // Debug sementara untuk memastikan data ada
        // dd($doctors);

        return view('masyarakat.doctors', compact('doctors'));
    }

    public function dashboard()
    {
        // Ambil semua conversation untuk dokter yang login
        $conversations = Conversation::with(['masyarakat', 'messages'])
            ->where('doctor_id', auth()->id())
            ->latest()
            ->get();

        return view('dokter.dashboard', compact('conversations'));
    }


}