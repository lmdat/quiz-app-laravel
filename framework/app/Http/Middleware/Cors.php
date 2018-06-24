<?php   namespace App\Http\Middleware;

use Closure;
use App\Utils\Vii;

class Cors{

    public function __construct(){

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        
        return $next($request)
           ->header('Access-Control-Allow-Origin', '*')
           ->header('Access-Control-Allow-Credentials', 'true')
           ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
           ->header('Access-Control-Allow-Headers', 'Accept, X-Requested-With, Content-Type, X-Auth-Token, x-xsrf-token, Origin, Authorization');


        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Credentials: true');


        // $headers = [
        //     'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        //     'Access-Control-Allow-Headers' => 'Accept, X-Requested-With, Content-Type, X-Auth-Token, x-xsrf-token, Origin, Authorization'
        // ];



        // if($request->isMethod('OPTIONS')) {
        //     //return Response::make('OK', 200, $headers);

        //     // return response('OK', 200)
        //     //   ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
        //     //   ->header('Access-Control-Allow-Headers', 'Accept, X-Requested-With, Content-Type, X-Auth-Token, Origin, Authorization'); // Add any required headers here

        //     return response('OK', 200)->withHeaders($headers);
        // }


        // $response = $next($request);
        // foreach($headers as $key => $value)
        //     $response->header($key, $value);

        // return $response;


    }

}