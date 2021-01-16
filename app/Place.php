<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [];
}

// public $appends = [
    //     'map_popup_content',
    // ];

    // public function getNameLinkAttribute()
    // {
    //     $title = __('app.show_detail_title', [
    //         'name' => $this->name, 'type' => __('place.place'),
    //     ]);
    //     $link = '<a href="' . route('places.show', $this) . '"';
    //     $link .= ' title="' . $title . '">';
    //     $link .= $this->place_name;
    //     $link .= '</a>';

    //     return $link;
    // }

    // /**
    //  * Get place coordinate attribute.
    //  *
    //  * @return string|null
    //  */
    // public function getCoordinateAttribute()
    // {
    //     if ($this->latitude && $this->longitude) {
    //         return $this->latitude . ', ' . $this->longitude;
    //     }
    // }



    // /**
    //  * Get place map_popup_content attribute.
    //  *
    //  * @return string
    //  */
    // public function getMapPopupContentAttribute()
    // {
    //     $mapPopupContent = '';
    //     $mapPopupContent .= '<div class="my-2"><strong>' . 'Place Name' . ':</strong><br>' . $this->name_link . '</div>';
    //     $mapPopupContent .= '<div class="my-2"><strong>' . 'Address' . ':</strong><br>' . $this->address . '</div>';
    //     $mapPopupContent .= '<div class="my-2"><strong>' . 'Place Name' . ':</strong><br>' . $this->description . '</div>';
    //     $mapPopupContent .= '<div class="my-2"><strong>' . 'Place Coordinate' . ':</strong><br>' . $this->coordinate . '</div>';

    //     return $mapPopupContent;
    // }
