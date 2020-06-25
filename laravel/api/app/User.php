<?php

    namespace App;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable
    {
        use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password', 'username', 'phone', 'website'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token', 'email_verified_at'
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];


        /**
         * @param $user
         * @return array
         */
        public static function getUser($user)
        {

            if (!empty($user)) {
                if (is_numeric($user)) {
                    //return user by id
                    $user_data = User::find($user);
                    if ($user_data) {
                        return $user_data;
                    }
                    return array('error' => 'User not found');
                }

                //Get user by email
                $user_data = User::where('email', $user)->first();
                if ($user_data) {
                    return $user_data;
                }

                return array('error' => 'User not found');
            }


        }


        /**
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function posts()
        {
            return $this->hasMany('App\Post');
        }


    }
