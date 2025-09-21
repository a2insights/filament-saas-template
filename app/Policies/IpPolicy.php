<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;
use SolutionForest\FilamentFirewall\Models\Ip;

class IpPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Ip');
    }

    public function view(AuthUser $authUser, Ip $ip): bool
    {
        return $authUser->can('View:Ip');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Ip');
    }

    public function update(AuthUser $authUser, Ip $ip): bool
    {
        return $authUser->can('Update:Ip');
    }

    public function delete(AuthUser $authUser, Ip $ip): bool
    {
        return $authUser->can('Delete:Ip');
    }

    public function restore(AuthUser $authUser, Ip $ip): bool
    {
        return $authUser->can('Restore:Ip');
    }

    public function forceDelete(AuthUser $authUser, Ip $ip): bool
    {
        return $authUser->can('ForceDelete:Ip');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Ip');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Ip');
    }

    public function replicate(AuthUser $authUser, Ip $ip): bool
    {
        return $authUser->can('Replicate:Ip');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Ip');
    }
}
