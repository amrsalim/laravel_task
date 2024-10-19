<?php 
namespace Modules\User\App\Http\Controllers\Api;

use App\Models\User;

class UserController extends \Lynx\Base\Api
{
    protected $entity = User::class;
    protected $resourcesJson = \Modules\User\App\resources\UserResource::class;
    protected $policy = \Modules\User\App\Policies\UserPolicy::class;
    protected $guard = 'api';
    protected $spatieQueryBuilder = true;
    protected $paginateIndex = true;
    protected $withTrashed = false;
    protected $FullJsonInStore = false;  // TRUE,FALSE
    protected $FullJsonInUpdate = false;  // TRUE,FALSE
    protected $FullJsonInDestroy = false;  // TRUE,FALSE

    /**
     * can handel custom query when retrive data on index,indexGuest
     * @param $entity model
     * @return query by Model , Entity
     */
    public function query($entity): Object
    {
        return $entity->withTrashed();
    }

    /**
     * this method append data when store or update data
     * @return array
     */
    public function append(): array
    {
         $data = [
             'user_id' => auth('api')->id(),
         ];
         $file = lynx()->uploadFile('file', 'users');
         if (!empty($file)) {
             $data['file'] = $file;
         }
         return $data;
//        return [];
    }

    /**
     * @param $id integer if you want to use in update rules
     * @param string $type (store,update)
     * @return array by (store,update) type using $type variable
     */
    public function rules(string $type, mixed $id = null): array
    {
        return $type == 'store'?
            [
                'name'             => 'required|string|max:255',
                'email'            => 'required|string|email|max:255|unique:users,email',
                'mobile'           => 'nullable|string|max:20',
                'photo'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'gender'           => 'required|in:male,female',
                'account_type'     => 'required|in:user,admin',
                'password'         => 'required|string|min:6|confirmed',
            ] :
            [

                'name'             => 'sometimes|required|string|max:255',
                'email'            => 'sometimes|required|string|email|max:255|unique:users,email,'.$id, // Exclude current user ID
                'mobile'           => 'sometimes|nullable|string|max:20',
                'photo'            => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
                'gender'           => 'sometimes|required|in:male,female',
                'account_type'     => 'sometimes|required|in:user,admin',
                'password'         => 'sometimes|nullable|string|min:6|confirmed',
            ];
    }

    /**
     * this method can set your attribute names with validation rules
     * @return array
     */
    public function niceName()
    {
        return [];
    }

    /*
     * this method use or append or change data before store
     * @return array
     */
    public function beforeStore(array $data): array
    {
        // $data['title'] = 'replace data';
        return $data;
    }

    /**
     * this method can use or append store data
     * @return array
     */
    public function afterStore($entity): void
    {
        // dd($entity->id);
    }

    /**
     * this method use or append or delete data beforeUpdate
     * @return array
     */
    public function beforeUpdate($entity): void
    {
        if (!empty($data->file)) {
            \Storage::delete($data->file);
        }
    }

    /**
     * this method use or append data after Update
     * @return array
     */
    public function afterUpdate($entity): void
    {
        // dd($entity->id);
    }

    /**
     * this method use or append data when Show data
     * @return array
     */
    public function beforeShow($entity): Object
    {
        return $entity->where('name', '=', null);
    }

    /**
     * this method use or append data when Show data
     * @return array
     */
    public function afterShow($entity): Object
    {
        return new \Modules\User\App\resources\UserResource($entity);
    }

    /**
     * you can do something in this method before delete record
     * @param object $entity
     * @return void
     */
    public function beforeDestroy($entity): void
    {
        if (!empty($entity->file)) {
            \Storage::delete($entity->file);
        }
    }

    /**
     * you can do something in this method after delete record
     * @param object $entity
     * @return void
     */
    public function afterDestroy($entity): void
    {
        // do something
        // $entity->file
    }
}