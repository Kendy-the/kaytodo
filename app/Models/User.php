<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'country',
        'city',
        'state',
        'profession',
        'other',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function getContacts()
    {
        $users = DB::table('users')
        ->select(DB::raw(1))
        ->whereColumn('users.email', 'contacts.email');

        $contacts = DB::table('contacts')
        ->whereExists($users)
        ->where('contacts.user_id', '=', (Auth::user())->id)
        ->get();
        
        return $contacts;
    }

    public function imageUrl()
    {
        return "/storage/" . $this->image;
        // return Storage::disk('public')->url($this->image);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
