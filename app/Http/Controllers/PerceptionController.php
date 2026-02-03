<?php

namespace App\Http\Controllers;

use App\Models\Perception;
use Illuminate\Http\Request;

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
        $driver = \DB::getDriverName();

        if ($driver === 'sqlite') {

            $data = Perception::selectRaw("strftime('%m', created_at) as month, SUM(amount) as total")
                ->whereNull('deleted_at')
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        } else {
            // MySQL
            $data = Perception::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
                ->whereNull('deleted_at')
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        }


        $labels = [];
        $totals = [];

        foreach ($data as $row) {
            $labels[] = date('F', mktime(0,0,0,$row->month,1)); // Convertir 01,02... en Janvier, Février
            $totals[] = $row->total;
        }

        return view('perceptions.history', compact('labels', 'totals'));
    }

}
