<?php

declare(strict_types=1);

namespace App\Policies;

use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class SchedulePolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Schedule');
    }

    public function view(AuthUser $authUser, Schedule $schedule): bool
    {
        return $authUser->can('View:Schedule');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Schedule');
    }

    public function update(AuthUser $authUser, Schedule $schedule): bool
    {
        return $authUser->can('Update:Schedule');
    }

    public function delete(AuthUser $authUser, Schedule $schedule): bool
    {
        return $authUser->can('Delete:Schedule');
    }

    public function restore(AuthUser $authUser, Schedule $schedule): bool
    {
        return $authUser->can('Restore:Schedule');
    }

    public function forceDelete(AuthUser $authUser, Schedule $schedule): bool
    {
        return $authUser->can('ForceDelete:Schedule');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Schedule');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Schedule');
    }

    public function replicate(AuthUser $authUser, Schedule $schedule): bool
    {
        return $authUser->can('Replicate:Schedule');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Schedule');
    }
}
