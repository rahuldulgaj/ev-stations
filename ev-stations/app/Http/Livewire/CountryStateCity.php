<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Country;
use App\City;
use App\State;

class CountryStateCity extends Component
{
   // public $countries;
   public $states;
   public $cities=[];
   public $city;
   public $country;
   public $state;

    public $selectedCountry = NULL;
    public $selectedState = NULL;

    public function mount($country,$state,$city)
    {
        // $this->countries = Country::all();
        // $this->states = collect();
        // $this->cities = collect();
        $this->country=$country;
        $this->state=$state;
        $this->city = $city;
    }

    public function render()
    {

        if(!empty($this->country)) {
           
            $this->states = State::where('country_id', $this->country)->get();
        }
        if(!empty($this->state)) {
            $this->cities = City::where('state_id', $this->state)->get();
        }
        return view('livewire.country-state-city')->withCountries(Country::orderBy('name')->get())->withStates(State::orderBy('name')->get());
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
