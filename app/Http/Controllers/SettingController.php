<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Tampilkan halaman pengaturan.
     */
    public function index()
    {
        // Mengambil semua pengaturan
        $settings = Setting::pluck('value', 'key');
        
        return view('crudSettings', compact('settings'));
    }

    /**
     * Update pengaturan yang ada.
     */
    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'apk_name' => 'nullable|string|max:255',
            'welcome_teks' => 'nullable|string|max:255',
            'informasi_teks' => 'nullable|string|max:255',
            'agenda_teks' => 'nullable|string|max:255',
            'album_teks' => 'nullable|string|max:255',
            'gallery_teks' => 'nullable|string|max:255',
        ]);

        // Update logo jika ada
        $setting = Setting::firstOrCreate(['key' => 'logo']);
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($setting->value && Storage::exists($setting->value)) {
                Storage::delete($setting->value);
            }

            // Simpan logo baru
            $path = $request->file('logo')->store('logos', 'public');
            $setting->value = $path;
            $setting->save();
        }

        // Update pengaturan lainnya
        $keys = [
            'apk_name',
            'welcome_teks',
            'informasi_teks',
            'agenda_teks',
            'album_teks',
            'gallery_teks'
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                // Mengambil atau membuat entri setting dengan key tertentu
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key)]
                );
            }
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
