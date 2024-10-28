<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ConfigController extends Controller
{
    public function index()
    {
        $phone = env('PHONE_NUMBER', '');
        $telegram = env('TELEGRAM_GROUP_LINK', '');
        $support = env('SUPPORT', '');

        return view('admin.config.index', compact('phone', 'telegram','support'));
    }

    public function update(Request $request)
    {
//        $request->validate([
//            'phone' => 'required|string',
//            'telegram' => 'required|string',
//        ]);

        $this->setEnvironmentValue('PHONE_NUMBER', $request->phone);
        $this->setEnvironmentValue('TELEGRAM_GROUP_LINK', $request->telegram);
        $this->setEnvironmentValue('SUPPORT', $request->support);

        return redirect()->back()->with('success', 'Configuration updated successfully.');
    }

    protected function setEnvironmentValue($key, $value)
    {
        $path = base_path('.env');

        if (!File::exists($path)) {
            File::put($path, '');
        }

        // Read .env content
        $env = File::get($path);

        // Prepare key with '=' character
        $keyWithEquals = $key . '=';

        // Check if the key already exists
        if (str_contains($env, $keyWithEquals)) {
            // Replace existing key
            $env = preg_replace(
                '/^' . preg_quote($keyWithEquals, '/') . '.*$/m',
                $keyWithEquals . $value,
                $env
            );
        } else {
            // Append new key
            $env .= PHP_EOL . $keyWithEquals . $value;
        }

        // Write the updated content back to the .env file
        File::put($path, $env);
    }
}
