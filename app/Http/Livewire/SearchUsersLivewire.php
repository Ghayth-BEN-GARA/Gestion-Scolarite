<?php
    namespace App\Http\Livewire;
    use Livewire\Component;
    use App\Models\User;

    class SearchUsersLivewire extends Component{
        public $search_users_navbar;

        public function render(){
            return view('livewire.search-users-livewire', [
    		    'liste_users' => User::where([
                    ['email', '<>', auth()->user()->getEmailUserAttribute()],
                    ['nom', 'like', '%'.$this->search_users_navbar.'%'],
                ])

                ->orWhere([
                    ['email', '<>', auth()->user()->getEmailUserAttribute()],
                    ['prenom', 'like', '%'.$this->search_users_navbar.'%'],
                ])

                ->orderBy('prenom', 'asc')
                ->paginate(10,array('users.*'))
    	    ]);
        }
    }
?>
