<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Shop;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShopPolicy
{
    use HandlesAuthorization;

    public function access(User $user, Shop $shop)
    {
        return $user->role_id === 2 && $user->shops()->where('shop_id', $shop->id)->exists();
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
