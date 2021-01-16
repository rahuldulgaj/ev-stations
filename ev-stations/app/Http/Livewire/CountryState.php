<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Country;
use App\City;
use App\State;


class CountryState extends Component
{
   
    public $states;
    public $cities;
    public $city;
    public $country;
    public $state;


    public $selectedCountry = NULL;
    public $selectedState = NULL;
    public $selectedCity = NULL;

    // public function mount()
    // {
    //     $this->countries = Country::all();
    //     $this->states = collect();
    //     $this->cities = collect();
        
    // }
    public function mount($country, $state)
    {
       
        //$this->countries= Country::where('id', $this->country)->get();
        $this->country=$country;
        $this->state=$state;
    }

    
    public function render()
    {
        if(!empty($this->country)) {
            $this->states = State::where('country_id', $this->country)->get();
        }
        return view('livewire.country-state')
            ->withCountries(Country::orderBy('name')->get());
    }

    // public function updatedSelectedCountry($country)
    // {
    //     $this->states = State::where('country_id', $country)->get();
    //     $this->selectedState = NULL;
    // }

    // public function updatedSelectedState($state)
    // {
    //     if (!is_null($state)) {
    //         $this->cities = City::where('state_id', $state)->get();
    //     }
    // }
    
}
