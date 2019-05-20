<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 5/20/19
 * Time: 6:16 AM
 */

namespace App\Http\Controllers;


class CogControllers extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function hello()
    {
        $response=array(
            array(
                "name" => "n1",
                "country" => "USA",
                "budget" => 149,
                "goal" => "Awareness",
                "category" => "Technology"
            ),array(
                "name" => "n2",
                "country" => "USA",
                "budget" => 149,
                "goal" => "Awareness",
                "category" => "Sports"
            ),array(
                "name" => "n3",
                "country" => "EGY",
                "budget" => 149,
                "goal" => "Awareness",
                "category" => "Technology"
            ),
            array(
                "name" => "n4",
                "country" => "USA",
                "budget" => 149,
                "goal" => "Awareness",
                "category" => "Sports"
            ),
            array(
                "name" => "n5",
                "country" => "USA",
                "budget" => 149,
                "goal" => "Conversion",
                "category" => "Sports"
            )
        );
        return json_encode($response, 200);
    }
}