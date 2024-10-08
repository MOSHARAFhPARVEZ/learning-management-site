<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {

        if (Auth::check()) {
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-in-online' . Auth::user()->id, true, $expireTime);
            User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }


        $userRole = Auth::user()->role;

        if ($userRole === 'user' && $role !== 'user') {
            return redirect()->route('dashboard');
        } elseif ($userRole === 'admin' && $role === 'user') {
            return redirect()->route('admin.dashboard');
        } elseif ($userRole === 'instuctor' && $role === 'user') {
            return redirect()->route('instuctor.dashboard');
        } elseif ($userRole === 'instuctor' && $role === 'admin') {
            return redirect()->route('instuctor.dashboard');
        } elseif ($userRole === 'admin' && $role === 'instuctor') {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
