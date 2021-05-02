<?php

namespace App\Observers;

use App\Models\GroupAdmin;

class GroupAdminObserver
{
    /**
     * Handle the GroupAdmin "created" event.
     *
     * @param  \App\Models\GroupAdmin  $groupAdmin
     * @return void
     */
    public function created(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the GroupAdmin "updated" event.
     *
     * @param  \App\Models\GroupAdmin  $groupAdmin
     * @return void
     */
    public function updated(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the GroupAdmin "deleted" event.
     *
     * @param  \App\Models\GroupAdmin  $groupAdmin
     * @return void
     */
    public function deleted(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the GroupAdmin "restored" event.
     *
     * @param  \App\Models\GroupAdmin  $groupAdmin
     * @return void
     */
    public function restored(GroupAdmin $groupAdmin)
    {
        //
    }

    /**
     * Handle the GroupAdmin "force deleted" event.
     *
     * @param  \App\Models\GroupAdmin  $groupAdmin
     * @return void
     */
    public function forceDeleted(GroupAdmin $groupAdmin)
    {
        //
    }
}
