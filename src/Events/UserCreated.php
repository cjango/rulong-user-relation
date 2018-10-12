<?php

namespace RuLong\UserRelation\Events;

class UserCreated
{

    public function __construct($user)
    {
        if (isset($user->parent_id) && is_numeric($user->parent_id) && $user->parent_id != 0) {
            $class  = config('user_relation.user_model');
            $model  = new $class;
            $parent = $model->find($user->parent_id);

            $user->relation()->create([
                'user_id'   => $user->id,
                'parent_id' => $parent->id,
                'bloodline' => $parent->relation->bloodline . $parent->id . ',',
                'layer'     => $parent->relation->layer + 1,
            ]);
        } else {
            $user->relation()->create([
                'user_id'   => $user->id,
                'parent_id' => 0,
                'bloodline' => '0,',
                'layer'     => 1,
            ]);
        }
    }

}
