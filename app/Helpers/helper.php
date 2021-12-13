<?php

function checkPostCode($data)
{
    $url = 'https://api.postcodes.io/postcodes/'.$data;
    $getPostCode = \Illuminate\Support\Facades\Http::get($url);
    $getPostCode = $getPostCode->object();
    if($getPostCode->status == 200)
    {
        if($getPostCode->result->country == "England")
        {
            $lat = $getPostCode->result->latitude;
            $lng = $getPostCode->result->longitude;

            $data = [
                'success' => true,
                'message' => 'true',
                'lat' => $lat,
                'lng' => $lng
            ];
            return $data;
        } else {
            $data = [
                'success' => false,
                'message' => 'Enter UK postcode',
            ];
            return $data;
        }
    } else {
        $data = [
            'success' => false,
            'message' => 'Invalid post code',
        ];
        return $data;
    }
}

function getGoogle($office_lat,$office_lng,$lat,$lng)
{
    $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?destinations='.$lat.','.$lng.'&origins='.$office_lat.','.$office_lng.'&key='.env('GOOGLE_KEY');
    $response = \Illuminate\Support\Facades\Http::acceptJson()->get($url);
    $response = $response->object();
    if ($response->status == "OK")
    {
        //google distance action
        $distance = $response->rows[0]->elements[0]->distance->text;

        //google time action
        $time = $response->rows[0]->elements[0]->duration->text;

        $data = [
            'success' => true,
            'distance' => $distance,
            'time' => $time
        ];
        return $data;
    } else {
        return false;
    }
}

?>
