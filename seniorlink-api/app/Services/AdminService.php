<?php

namespace App\Services;

use App\Models\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdminService
{
    public function create(array $contents) 
    {
        $this->validate($contents, [
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:admin',
            'password'=> 'required|string|min:3|confirmed',
            'profile_image_path'=> 'sometimes|file|image|max:2048',
        ]);

        if(isset($contents['profile_image'])) {
            $contents['profile_image_path'] = $this->handleFileUpload($contents['profile_image']);
            unset($contents['profile_image']);
        }

        $contents['password'] = Hash::make($contents['password']);
        return Admin::create($contents);
    }

    public function readAll()
    {
        return Admin::all();
    }

    public function read($id)
    {
        return Admin::find($id);
    }

    public function update($id, array $contents)
    {
        $admin = Admin::find($id);

        if(!$admin){
            throw new ModelNotFoundException('Admin not found');
        }

        $this->validate($contents, [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:admins,email,' . $id,
            'password' => 'sometimes|required|string|min:3|confirmed',
            'profile_image' => 'sometimes|file|image|max:2048',
        ]);

        if(isset($contents['name'])){
            $admin->name = $contents['name'];
        }

        if (isset($contents['email'])) {
            $admin->email = $contents['email'];
        }
    
        if (isset($contents['password'])) {
            $admin->password = Hash::make($contents['password']);
        }
    
        if (isset($contents['profile_image'])) {
            $admin->profile_image_path = $this->handleFileUpload($contents['profile_image']);
        }

        $admin->save();

        return $admin;
    }

    public function delete($id)
    {
        $admin = Admin::find($id);

        if(!$admin){
            throw new ModelNotFoundException('Admin not found');
        }

        $admin->delte();
        return true;
    }

    protected function validate($contents, $rules)
    {
        $validator = Validator::make($contents, $rules);

        if($validator->fails()){
            throw new ValidationException($validator);
        }
    }

    protected function handleFileUpload($file)
    {
        return $file->store('profile_images', 'public');
    }
}