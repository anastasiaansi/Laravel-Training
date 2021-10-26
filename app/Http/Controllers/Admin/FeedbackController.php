<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $feedbacks= Feedback::paginate(10);
        return view('admin.feedbacks.index', [
            'feedbacks' => $feedbacks
        ]);
    }
    /**
     * Show the form for creating a new feedback.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feedbacks.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:15',
            'feedback' => 'required|string'
        ]);
        $feedback = Feedback::create(
            $request->only(['name', 'feedback'])
        );

        if ($feedback) {
            Storage::append('info/feedback.txt', $feedback);
            return redirect()->route('admin.feedback.index')
                ->with('success','create is success');
        }

        return back()->with('error', 'create is fail');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return Response
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('admin.feedback.index')
            ->withSuccess(__('Feedback delete successfully.'));
    }
}
