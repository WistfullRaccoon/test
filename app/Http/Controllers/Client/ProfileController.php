<?php

namespace App\Http\Controllers\Client;

use App\Assistants\Users\ProfileService;
use App\Assistants\Users\SubscribeService;
use App\Models\Elements\Art;
use App\Models\Subcategory;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    private $subscriberService;
    private $profileService;

    public function __construct(SubscribeService $subscriberService, ProfileService $profileService)
    {
        $this->subscriberService = $subscriberService;
        $this->profileService = $profileService;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

//        $subcategories = Subcategory::getAllSubcategories();

        $posts = $this->profileService->getUserPosts($user);
        $arts = $this->profileService->getUserArts($user);
        $tickets = $this->profileService->getUserTickets($user);
        $studentGroups = $this->profileService->getStudentGroups($user);

//        $views = ViewsCalculator::calculateViews($posts, $arts);

        if($user->isTeacher())
        $teacherGroups = $this->profileService->getTeacherGroups($user);

        return view('client.profile.own_profile' ,
            compact('user', 'posts', 'arts',
                'studentGroups', 'tickets', 'teacherGroups'));
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $arts = Art::forUser($user)->get();

        return view('client.profile.profile', compact('user', 'arts'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)],
            'birthday' => 'nullable|date',
            'vk_link' => array(
                'nullable',
                'regex:/^(http(s)?:\/\/)?(www\.)?vk\.com\/\w+\/?$/'
            ),
            'twitter_link' => array(
                'nullable',
                'regex:/^(https?:\/\/)?(www\.)?twitter\.com\/\w+\/?$/'
            ),
            'facebook_link' => array(
                'nullable',
                'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/\w+\/?$/'
            ),
            'instagram_link' => array(
                'nullable',
                'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/\w+\/?$/'
            ),
        ]);

        try {
            $this->profileService->edit($request, $user);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->back();
    }

    public function subscribe(User $author)
    {
        try {
            $this->subscriberService->subscribe(Auth::id(), $author->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('home')->with('success', 'Вы подписаны');
    }
}
