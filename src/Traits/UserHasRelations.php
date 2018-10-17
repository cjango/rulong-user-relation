<?php

namespace RuLong\UserRelation\Traits;

use RuLong\UserRelation\Exceptions\ParentUserException;
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

    /**
     * 用户关联关系
     * @Author:<C.Jason>
     * @Date:2018-10-17T15:14:57+0800
     * @return [type] [description]
     */
    public function relation()
    {
        return $this->hasOne(UserRelation::class)->withDefault();
    }

    /**
     * 上级用户
     * @Author:<C.Jason>
     * @Date:2018-10-17T15:15:09+0800
     * @return [type] [description]
     */
    public function parent()
    {
        return $this->relation->parent();
    }

    /**
     * 按照血缘线，返回所有上级用户
     * @Author:<C.Jason>
     * @Date:2018-10-17T15:15:44+0800
     * @return [type] [description]
     */
    public function parents()
    {
        #todo...
    }

    /**
     * 所有下级用户
     * @Author:<C.Jason>
     * @Date:2018-10-17T15:15:19+0800
     * @return [type] [description]
     */
    public function children()
    {
        return $this->relation->children();
    }

    /**
     * 修改上级用户
     * @Author:<C.Jason>
     * @Date:2018-10-17T15:16:27+0800
     * @return [type] [description]
     */
    public function changeParentUser($parentUser)
    {
        $userModel = config('user_relation.user_model');

        if (!($parentUser instanceof $userModel)) {
            throw new ParentUserException('上级用户必须是一个用户模型');
        }

        #todo...
    }
}
