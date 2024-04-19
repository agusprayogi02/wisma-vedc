<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RoomItemReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomItemReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_room::item::report');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RoomItemReport $roomItemReport): bool
    {
        return $user->can('view_room::item::report');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_room::item::report');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RoomItemReport $roomItemReport): bool
    {
        return $user->can('update_room::item::report');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RoomItemReport $roomItemReport): bool
    {
        return $user->can('delete_room::item::report');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_room::item::report');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, RoomItemReport $roomItemReport): bool
    {
        return $user->can('force_delete_room::item::report');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_room::item::report');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, RoomItemReport $roomItemReport): bool
    {
        return $user->can('restore_room::item::report');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_room::item::report');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, RoomItemReport $roomItemReport): bool
    {
        return $user->can('replicate_room::item::report');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_room::item::report');
    }
}
