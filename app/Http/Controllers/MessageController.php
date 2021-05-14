<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function create(Request $request)
    {
      $validator = $request->validate([
        'title'     => 'required',
        'content'   => 'required'
      ]);

      $message = new Message();
      $message->title = $request->title;
      $message->content = $request->content;

      $message->save();

      return redirect('/');

    }

    public function view($id)
    {
      $message = Message::findOrFail($id);

      return view('message', [
        'message' => $message
      ]);
    }

    public function delete(Request $request)
    {
      $record = Message::find($request->id);

      if($record){
        $record->delete();
      }
    }

    public function edit(){};
}
