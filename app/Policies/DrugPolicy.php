<?php

namespace App\Policies;

use App\Drug;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DrugPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Drug  $drug
     * @return mixed
     */
    public function view(User $user, Drug $drug)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Drug  $drug
     * @return mixed
     */
    public function update(User $user, Drug $drug)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Drug  $drug
     * @return mixed
     */
    public function delete(User $user, Drug $drug)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Drug  $drug
     * @return mixed
     */
    public function restore(User $user, Drug $drug)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Drug  $drug
     * @return mixed
     */
    public function forceDelete(User $user, Drug $drug)
    {
        //
    }
}
