<?php
    namespace App\Http\Middleware;
    use Closure;
    use Illuminate\Http\Request;
    use Session;

    class SessionUserNotExistEtudiant{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
         * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
         */
        public function handle(Request $request, Closure $next){
            if(Session()->has("email") && Session::get("acteur") != "Etudiant"){
                return view('Errors.404');
            }

            else if(!Session()->has("email")){
                return view("Errors.404");
            }
            return $next($request);
        }
    }
?>
