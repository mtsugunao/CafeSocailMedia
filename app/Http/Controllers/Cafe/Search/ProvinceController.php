<?php

namespace App\Http\Controllers\Cafe\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cafe;

class ProvinceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $caProvinces = $request->input('canada', []);
        $usProvinces = $request->input('us', []);
        $provinces = array_merge($caProvinces, $usProvinces);
        $searchResults = Cafe::whereIn('province', $provinces)->paginate(15)->withQueryString();
        $caProvince = [
            'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and labrador', 'Nova Scotia', 'Prince Edward Island', 'Quebec',
            'Saskatchewan', 'Northwest Territories', 'Nunavut', 'Yukon'
        ];
        $ca = [
            'ab', 'bc', 'mb', 'nb', 'nl', 'nt', 'ns', 'nu', 'on', 'pe', 'qc', 'sk', 'yt'
        ];
        $us = [
            'al', 'ak', 'az', 'ar', 'ca', 'co', 'ct', 'de', 'fl', 'ga', 'hi', 'id', 'il', 'in', 'ia', 'ks', 'ky', 'la', 'me', 'md', 'ma', 'mi', 'mn', 'ms', 'mo', 'mt', 'ne', 'nv',
            'nh', 'nj', 'nm', 'ny', 'nc', 'nd', 'oh', 'ok', 'or', 'pa', 'ri', 'sc', 'sd', 'tn', 'tx', 'ut', 'vt', 'va', 'wa', 'wv', 'wi', 'wy'
        ];
        $usStates = [
            'Alabama', 'Alaska', 'Arizon', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Gergia', 'Hawaii', 'Idaho', 'Illinois',
            'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana',
            'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania',
            'Rhode Island', 'South Carolina', 'South Dakota', 'Tenessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ];

        return view('cafe.result', compact('searchResults', 'caProvince', 'ca', 'us', 'usStates'));

    }
}
