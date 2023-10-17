<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\Cafe;
class CafeService {
    public function saveMenu(string $name, int $price, int $cafeId) {
        DB::transaction(function () use ($name, $price, $cafeId) {
            $menu = new Menu();
            $menu->name = $name;
            $menu->price = $price;
            $menu->cafe_id = $cafeId;
            $menu->save();
        });
    }

    public function updateMenu(int $menuId, string $menuName, int $menuPrice) {
        DB::transaction(function () use ($menuId, $menuName, $menuPrice) {

            $menuToUpdate = Menu::where('id', $menuId)->firstOrFail();
    
            $menuToUpdate->update([
                'name' => $menuName,
                'price' => $menuPrice,
            ]);
    
        });
    }

    public function deleteMenu(Cafe $cafe, array $menuIds){
        DB::transaction(function () use ($cafe, $menuIds) {
            foreach ($cafe->menus as $menu) {
                if (!in_array($menu->id, $menuIds)) {
                    $menu->delete();
                }
            }
        });
    }
}