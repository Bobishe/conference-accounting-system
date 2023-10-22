<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use App\Models\events;
use Illuminate\Support\Facades\Storage;
use App\Models\children;

class Admin extends Controller
{
    public function AdminPanel()
    {

        $events = events::all();

        return view('homeAdmin', [
            "events" => $events
        ]);
    }

    public function error()
    {
        return view('errorForbidden');
    }

    public function redactor()
    {
        /*$children = children::find(1)->event;
        dd($children);*/

        $childrens = children::all();
        $events = events::all();

        return view('redactor', [
            "events" => $events,
            "childrens" => $childrens
        ]);

    }

    public function update(Request $request, $id)
    {
        $post = events::find($id);

        $data = $request->only(['name_ivent', 'organaizer', 'last_line', 'deadlines', 'email', 'name_participant', 'name_meneger', 'form', 'specialization', 'cost', 'date_of_delivery', 'result_name']);


        $path = $request->file('file')->store('files', 'public');

        $post->name_ivent = $data['name_ivent'];
        $post->organaizer = $data['organaizer'];
        $post->last_line = $data['last_line'];
        $post->deadlines = $data['deadlines'];
        $post->email = $data['email'];
        $post->name_participant = $data['name_participant'];
        $post->name_meneger = $data['name_meneger'];
        $post->form = $data['form'];
        $post->specialization = $data['specialization'];
        $post->cost = $data['cost'];
        $post->date_of_delivery = $data['date_of_delivery'];
        $post->result_name = $data['result_name'];
        $post->file = $path;


        $post->save();

        $childrens = children::all();
        $events = events::all();
        return view('redactor', [
            "events" => $events,
            "childrens" => $childrens
        ]);

    }


    public function add()
    {
        return view('add');
    }


    public function addEvent(Request $request)
    {

        $data = $request->only(['name_ivent', 'organaizer', 'last_line', 'deadlines', 'email', 'name_participant', 'name_meneger', 'form', 'specialization', 'cost', 'date_of_delivery', 'result_name']);

        dd($data);

        $path = $request->file('upload_file')->store('files', 'public');

        events::create([
            "name_ivent" => $data['name_ivent'],
            "organaizer" => $data['organaizer'],
            "last_line" => $data['last_line'],
            "deadlines" => $data['deadlines'],
            "email" => $data['email'],
            "name_participant" => $data['name_participant'],
            "name_meneger" => $data['name_meneger'],
            "form" => $data['form'],
            "specialization" => $data['specialization'],
            "cost" => $data['cost'],
            "date_of_delivery" => $data['date_of_delivery'],
            "result_name" => $data['result_name'],
            "file" => $path,
        ]);


        $childrens = children::all();
        $events = events::all();
        return view('redactor', [
            "events" => $events,
            "childrens" => $childrens
        ]);

    }


    public function delete($id)
    {
        events::find($id)->delete();
        $events = events::all();
        $childrens = children::all();
        return view('redactor', [
            "events" => $events,
            "childrens" => $childrens
        ]);
    }


    /**
     * download file
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Auth\Access\Response
     */

    public function download($id)
    {

        $data = events::find($id);
        $file = public_path() . '\storage\\' . $data['file'];
        $file_name = substr($data['file'], 6);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $name = $data['result_name'] . '.' . $ext;

        $headers = ['Content-Type: image/jpeg application/pdf'];

        if (file_exists($file)) {
            return \Response::download($file, $name, $headers);

        } else {
            echo('File not found.');

        }

    }
}
