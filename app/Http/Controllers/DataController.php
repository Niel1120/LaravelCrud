<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'John Doe',
            'age' => 30,
            'city' => 'New York'
        ];
        return view('index', compact('data'));
    }

    public function register()
    {
        return view('register');
    }

    public function registerCreate(Request $request) // Fixed method name here
    {
        // Validate the incoming request
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'phone' => 'required|string|max:15',
        //     'email' => 'required|string|email|max:255|unique:datas',
        //     'password' => 'required|string|min:8|confirmed',
        //     'country' => 'required|string|max:255',
        //     'gender' => 'required|string|max:10',
        //     'education' => 'required|array',
        //     'education.*' => 'in:Diploma,BTech,BCA',
        //     'mode' => 'required|in:online,offline',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // Store the data
        $data = new Data();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->password = Hash::make($request->password); // Use Hash facade for password encryption
        $data->country = $request->country;
        $data->gender = $request->gender;
        $data->education = implode(', ', $request->education); // Convert array to comma-separated string
        $data->mode = $request->mode;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data->image = $imagePath;
        }

        $data->save();

        return redirect()->route('register')->with('success', 'Data saved successfully');
    }
}
