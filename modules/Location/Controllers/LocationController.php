<?php
namespace Modules\Location\Controllers;

use App\Http\Controllers\Controller;
use Modules\Location\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public $location;
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function index(Request $request)
    {

    }

    public function detail(Request $request, $slug)
    {
        $row = $this->location::where('slug', $slug)->where("status", "publish")->first();;
        if (empty($row)) {
            return redirect('/');
        }

        //Auth::user()->can('viewAny', Tour::class);


        $translation = $row->translateOrOrigin(app()->getLocale());
        $data = [
            'row' => $row,
            'translation' => $translation,
            'seo_meta' => $row->getSeoMetaWithTranslation(app()->getLocale(), $translation),
        ];
        $this->setActiveMenu($row);
        return view('Location::frontend.detail', $data);
    }

    public function searchForSelect2( Request $request ){
        $search = $request->query('search');
        $query = Location::select('bravo_locations.*', 'bravo_locations.name as title')->where("bravo_locations.status","publish");
        if ($search) {
            $query->where('bravo_locations.name', 'like', '%' . $search . '%');

            if( setting_item('site_enable_multi_lang') && setting_item('site_locale') != app()->getLocale() ){
                $query->leftJoin('bravo_location_translations', function ($join) use ($search) {
                    $join->on('bravo_locations.id', '=', 'bravo_location_translations.origin_id');
                });
                $query->orWhere(function($query) use ($search) {
                    $query->where('bravo_location_translations.name', 'LIKE', '%' . $search . '%');
                });
            }

        }
        $res = $query->orderBy('name', 'asc')->limit(20)->get()->toTree();
        if(!empty($res) and count($res)){
            $list_json = [];
            $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json) {
                foreach ($locations as $location) {
                    $translate = $location->translateOrOrigin(app()->getLocale());
                    $list_json[] = [
                        'id' => $location->id,
                        'title' => $prefix . ' ' . $translate->name,
                    ];
                    $traverse($location->children, $prefix . '-');
                }
            };
            $traverse($res);
            return $this->sendSuccess(['data'=>$list_json]);
        }
        return $this->sendError(__("Location not found"));
    }
}
