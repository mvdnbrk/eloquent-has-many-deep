<?php

namespace Tests\Models;

class Country extends Model
{
    protected $primaryKey = 'country_pk';

    public function comment()
    {
        return $this->hasOneDeep(Comment::class, [User::class, Post::class])->withDefault();
    }

    public function comments()
    {
        return $this->hasManyDeep(Comment::class, [User::class, Post::class]);
    }

    public function commentsWithAlias()
    {
        return $this->hasManyDeep(Comment::class, [User::class.' as alias', Post::class]);
    }

    public function permissions()
    {
        return $this->hasManyDeep(Permission::class, [User::class, 'role_user', Role::class]);
    }

    public function roles()
    {
        return $this->hasManyDeep(Role::class, [User::class, 'role_user']);
    }
}
