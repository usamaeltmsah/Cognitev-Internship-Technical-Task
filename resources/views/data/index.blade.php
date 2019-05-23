<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 5/21/19
 * Time: 5:33 AM
 */
?>
<!--Extend templates in Laravel-->
@extends('master')

@section('content')
            <?php
            $response = array();
            foreach ($data as $d)
            {
                $arr1 = array_merge(array("name"=>$d['name'], "country"=> $d['country'],
                    "budget"=> $d['budget'], "goal"=> $d['goal'], "category"=> $d['category']));

                array_push($response, $arr1);
            }
            print_r(json_encode($response));
            return json_encode($response);
            ?>
@endsection
