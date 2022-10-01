<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Stall;
use App\Models\Submit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage()
    {
        $data = [
            'submits' => Submit::active()->with('speakers')->get()
        ];
        return view('frontend.components.dynamic-content', $data);
    }

    public function showExhibitionPage()
    {
        $stallSorted = Stall::orderBy('position', 'desc')->paginate(10);
        $stallLists = [];
        for ($i = 1; $i <= $stallSorted->lastPage(); $i++) {
            $paginations = Stall::orderBy('position', 'desc')->paginate(10, ['*'], 'page', $i);
            $stallLists[$i] = $paginations->items();
        }
        $submits = Submit::active()->with('speakers')->get();
        $data = [
            'submits' => $submits,
            'submit' => $submits->where('time_start', '>=', now())->sortBy('time_start')->first(),
            'stalls' => $stallSorted,
            'data' => $stallLists
        ];
        return view('frontend.components.exhibition.index', $data);
    }

    public function showStall(Request $request, Stall $stall, $currentPage = 1)
    {
        $stallSorted = Stall::orderBy('position', 'desc')
            ->paginate(
                $perPage = 10,
                $columns = ['*'],
                $pageName = 'page',
                $page = $currentPage
            );

        $index = $stallSorted->search(function ($item, $key) use ($stall) {
            if ($stall->position) {
                return $item->position == $stall->position;
            } else {
                return $item->id == $stall->id;
            }
        });

        $stallBefore = $index == 0 ? null : $stallSorted->get($index - 1);
        $stallAfter = $index == $stallSorted->count() - 1 ? null : $stallSorted->get($index + 1);

        $data = [
            'stall' => $stall,
            'stallBefore' => $stallBefore,
            'stallAfter' => $stallAfter,
            'stallSorted' => $stallSorted
        ];

        if ($request->ajax()) {
            return view('frontend.components.exhibition.show-stall', $data);
        }
    }

    public function showDetailStall(Request $request, Stall $stall)
    {
        if ($request->ajax()) {
            return view('frontend.components.exhibition.detail', compact('stall'));
        }
    }

    public function showSubmit(Submit $submit)
    {
        $data = [
            'submits' => Submit::active()->with('speakers')->get(),
            'submit' => $submit,
        ];
        return view('frontend.components.submit.index', $data);
    }

    public function searchStall(Request $request)
    {
        $text = trim($request->text);
        $stallSorted = Stall::orderBy('position', 'desc')->paginate(10);
        $data = [];
        for ($i = 1; $i <= $stallSorted->lastPage(); $i++) {
            $paginations = Stall::orderBy('position', 'desc')->paginate(10, ['*'], 'page', $i);
            $paginations = $paginations->setCollection(
                $paginations->getCollection()->filter(function ($stall) use ($text) {
                    return strlen(strstr(strtolower($stall->name),  strtolower($text)));
                })
            );
            if (count($paginations->items()) > 0) {
                $data[$i] = $paginations->items();
            }
        }
        return view('frontend.components.exhibition.search', compact('data'))->render();
    }

    public function showHallPage()
    {
        $submits = Submit::active()->with('speakers')->get();
        $data = [
            'submits' => $submits,
            'submit' => $submits->where('time_start', '>=', now())->sortBy('time_start')->first(),
        ];
        return view('frontend.components.hall.index', $data);
    }
}
