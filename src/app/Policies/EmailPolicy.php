<?php

namespace App\Policies;

use App\Models\Email;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return !config('filament-email-demo.filament_shield_enabled') || $user->can('view_any_email');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Email $email): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('view_email');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('create_email');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Email $email): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('update_email');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Email $email): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('delete_email');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('delete_any_email');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Email $email): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('force_delete_email');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('force_delete_any_email');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Email $email): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('restore_email');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('restore_any_email');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Email $email): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('replicate_email');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return  !config('filament-email-demo.filament_shield_enabled') || $user->can('reorder_email');
    }
}
