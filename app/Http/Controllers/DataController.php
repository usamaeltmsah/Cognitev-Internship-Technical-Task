<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\data;
use DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = data::all()->toArray();
        //compact will create an array from variable $data which we can access in index view file in data folder
        return view('data.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'country' => 'required',
                'budget' => 'required',
                'goal' => 'required'
            ]
        );

            $data = new data([
                'name' => $request->get('name'),
                'country' => $request->get('country'),
                'budget' => $request->get('budget'),
                'goal' => $request->get('goal'),
                'category' => $request->get('category')
            ]);

        if($request->get('category') == NULL)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://ngkc0vhbrl.execute-api.eu-west-1.amazonaws.com/api/?url=https://arabic.cnn.com/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            $json=json_decode($response, true);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $data = new data([
                    'name' => $request->get('name'),
                    'country' => $request->get('country'),
                    'budget' => $request->get('budget'),
                    'goal' => $request->get('goal'),
                    'category' => $json['category']['name']
                ]);
            }
        }
        $data->save();
        return redirect()->route('data.create')->with('success', 'Data Added Successfully');
    }

    public function groupData($pars)
    {
        $groupBy = explode(",", $pars);
        $info = DB::table('data')
            ->select('name', 'country', 'budget', 'goal', 'category')
            ->groupBy($groupBy)
            ->get();
        return $info;
    }

    public function getFields($pars)
    {
        $fields_arr = explode(",", $pars);
        $info = DB::table('data')
            ->select($fields_arr)
            ->get();
        return $info;
    }

    public function groupDataBySelectedFields($pars1, $pars2)
    {
        $groupBy = explode(",", $pars1);
        $fields_arr = explode(",", $pars2);

        $info = DB::table('data')
            ->select($fields_arr)
            ->groupBy($groupBy)
            ->get();
        return $info;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
