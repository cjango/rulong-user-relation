<?php

namespace RuLong\UserRelation\Traits;

use RuLong\UserRelation\Models\UserRelation;

trait UserHasRelations
{

    /**
     * 这个参数，是为了给用户创建事件监听模型使用的
     * @var [type]
     */
    public $parent_id;

    /**
     * 这个方法，是为了给用户创建事件监听模型使用的
     * 目的是去除attribute里面的parent_id参数，防止数据库写入错误
     * @Author:<C.Jason>
     * @Date:2018-06-25T15:04:29+0800
     * @param [type] $value [description]
     */
    public function setParentIdAttribute($parentID)
    {
        $this->parent_id = $parentID;
    }

    public function relation()
    {
        return $this->hasOne(UserRelation::class)->withDefault();
    }

    public function parent()
    {
        return $this->relation->parent();
    }

    public function children()
    {
        return $this->relation->children();
    }

}
