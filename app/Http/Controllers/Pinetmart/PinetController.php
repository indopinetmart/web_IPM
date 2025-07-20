<?php

namespace App\Http\Controllers\Pinetmart;

use App\Http\Controllers\Controller;
use App\Models\Produk\Category;
use App\Models\Produk\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Traits\HasSidebarItems;

class PinetController extends Controller
{
    use HasSidebarItems;

    // Splash screen
    public function splash(Request $request)
    {
        $signedUrl = URL::temporarySignedRoute('pinet.home.guest', now()->addMinutes(5));
        
        logger()->info('Signed Splash URL: ', ['url' => $signedUrl]); // ✅ Tambahkan ini
    
        return view('pinetmart.splashscreen', compact('signedUrl'));
    }


    // Halaman utama untuk customer (authenticated)
    public function homePinet(Request $request, $hash)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = Auth::guard('customer')->id();
        $expectedHash = hash('sha256', env('CUSTOMER_URL_SECRET') . $userId);

        if (!hash_equals($expectedHash, $hash)) {
            abort(403, 'Akses tidak sah ke dashboard.');
        }

        $categories = Category::limit(6)->get();
        $items = Item::latest()->limit(10)->get();
        $sidebarItems = $this->buildSidebarItems();

        return view('pinetmart.home', compact('categories', 'items', 'sidebarItems'));
    }

    // Halaman utama untuk guest
    public function guestHome(Request $request)
    {
        logger()->info('🎯 guestHome() dipanggil');
    
        if (! $request->hasValidSignature()) {
            logger()->warning('❌ Signature tidak valid di guestHome');
            abort(403, 'URL tidak valid atau sudah kadaluarsa.');
        }
    
        $categories = Category::limit(6)->get();
        $items = Item::latest()->limit(10)->get();
    
        logger()->info('✅ Data kategori dan item berhasil diambil');
    
        $sidebarItems = [
            ['name' => 'Home', 'icon' => 'house', 'route' => url('/')],
            ['name' => 'Login', 'icon' => 'person', 'route' => route('customer.login')],
        ];
    
        return view('pinetmart.home', compact('categories', 'items', 'sidebarItems'));
    }

}
