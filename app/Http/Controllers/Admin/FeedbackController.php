<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateFeedbackRequest;
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

    /**
     * @param CreateFeedbackRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateFeedbackRequest $request)
    {
        $feedback = Feedback::create($request->validated());

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
