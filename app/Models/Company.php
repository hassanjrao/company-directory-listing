<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=['image_url',"description_short","overall_rating","good_ratings","bad_ratings","average_ratings"];

    public function getImageUrlAttribute()
    {
        $image= Storage::url($this->image);

        return $image;
    }

    public function getDescriptionShortAttribute()
    {
        return substr(strip_tags($this->description),0,100) ."...";
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function ratings()
    {
        return $this->hasMany(CompanyRating::class);
    }

    public function getOverallRatingAttribute()
    {
        $ratings=$this->ratings;

        $total=0;

        foreach ($ratings as $rating) {
            $total+=$rating->rating;
        }

        if(count($ratings)>0){
            $rating= $total/count($ratings);
            // one decimal place
            return number_format((float)$rating, 1, '.', '');


        }

        return 0;
    }

    public function getGoodRatingsAttribute()
    {
        $ratings=$this->ratings;

        $total=0;

        foreach ($ratings as $rating) {
            if($rating->rating>=4){
                $total++;
            }
        }

        return $total;
    }

    public function getBadRatingsAttribute()
    {
        $ratings=$this->ratings;

        $total=0;

        foreach ($ratings as $rating) {
            if($rating->rating<=2){
                $total++;
            }
        }

        return $total;
    }

    public function getAverageRatingsAttribute()
    {
        $ratings=$this->ratings;

        $total=0;

        foreach ($ratings as $rating) {
            if($rating->rating==3){
                $total++;
            }
        }

        return $total;
    }
}
