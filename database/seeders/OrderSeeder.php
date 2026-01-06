<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Menu;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil user dan menu yang sudah ada
        $users = User::where('role', 'pelanggan')->get();
        $menus = Menu::all();

        if ($users->isEmpty() || $menus->isEmpty()) {
            echo "Tidak ada user pelanggan atau menu yang tersedia\n";
            return;
        }

        // Buat beberapa pesanan dengan status berbeda
        $statuses = ['unpaid', 'paid', 'proses', 'selesai', 'dibatalkan'];
        
        foreach ($statuses as $status) {
            for ($i = 0; $i < 2; $i++) {
                $user = $users->random();
                $total = 0;
                
                $order = Order::create([
                    'user_id' => $user->id,
                    'total' => 0, // Akan diupdate setelah menambah item
                    'metode_bayar' => $this->getRandomPaymentMethod(),
                    'bank_atm' => $this->getRandomBank(),
                    'bukti_pembayaran' => $status === 'unpaid' ? null : 'bukti_pembayaran/sample.jpg',
                    'status' => $status,
                    'created_at' => Carbon::now()->subDays(rand(1, 7)),
                    'updated_at' => Carbon::now()->subDays(rand(1, 7)),
                ]);

                // Tambah 1-3 item ke pesanan
                $itemCount = rand(1, 3);
                for ($j = 0; $j < $itemCount; $j++) {
                    $menu = $menus->random();
                    $qty = rand(1, 3);
                    $subtotal = $menu->harga * $qty;
                    $total += $subtotal;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'menu_id' => $menu->id,
                        'qty' => $qty,
                        'harga_satuan' => $menu->harga,
                        'subtotal' => $subtotal,
                    ]);
                }

                // Update total pesanan
                $order->update(['total' => $total]);
            }
        }

        echo "Seeder Order berhasil dijalankan!\n";
        echo "Total pesanan yang dibuat: " . Order::count() . "\n";
        echo "Status distribution:\n";
        Order::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->each(function($item) {
                echo "- {$item->status}: {$item->total}\n";
            });
    }

    private function getRandomPaymentMethod()
    {
        $methods = ['QRIS', 'VA', 'tunai'];
        return $methods[array_rand($methods)];
    }

    private function getRandomBank()
    {
        $banks = ['BCA', 'BNI', 'BRI', 'Mandiri', null];
        return $banks[array_rand($banks)];
    }
} 