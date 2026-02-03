<?php

namespace App\Http\Controllers;

use App\Models\Perception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerceptionController extends Controller
{
    public function index()
    {
        $perceptions = Perception::orderBy('id','desc')->paginate(10);
        return view('perceptions.index', compact('perceptions'));
    }

    public function create()
    {
        return view('perceptions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'file' => 'nullable|file|max:10240',
            'currency' => 'required|in:USD,CDF',
        ]);

        $data = [
            'name' => strtoupper($request->name),
            'amount' => $request->amount,
            'currency' => $request->currency,
        ];

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('perceptions');
        }

        Perception::create($data);

        return redirect()->route('perceptions.index')->with('success','Perception added successfully');
    }

    public function destroy(Perception $perception)
    {
        $perception->delete();
        return redirect()->route('perceptions.index')->with('success','Perception deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $perceptions = Perception::where('name', 'like', "%$query%")
            ->orWhere('amount', 'like', "%$query%")
            ->orderBy('id','desc')
            ->paginate(10);

        return view('perceptions.partials.table', compact('perceptions'))->render();
    }

    public function history()
    {
        $perceptions = Perception::whereNull('deleted_at')->get();


        $grouped = $perceptions->groupBy(function($item) {
            return $item->created_at->format('Y-m');
        });

        $labels = [];
        $totals = [];

        foreach ($grouped as $month => $items) {
            $labels[] = Carbon::parse($month.'-01')->format('M Y');
            $totals[] = $items->sum('amount');
        }

        return view('perceptions.history', compact('labels', 'totals'));
    }



}
