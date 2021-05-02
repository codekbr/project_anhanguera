<?php

namespace App\Observers;

use App\Models\GroupAdmin;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $createGroupDefault = new GroupAdmin();
        if ($user->count() == 1)
        {
            $createGroupDefault->name = 'Usuário';
            $createGroupDefault->save();
            $user->group_id = $createGroupDefault->id;
            $user->save();
            
        }else{
            $idUSer = $createGroupDefault->where('name', '=', 'Usuário')->get();
            $user->group_id = $idUSer[0]->id;
            $user->save();
        }
       
        
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
