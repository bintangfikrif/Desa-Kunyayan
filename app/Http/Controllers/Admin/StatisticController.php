<?php

// app/Http/Controllers/Admin/StatisticController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function home()
    {
        $statistic = Statistic::first(); // Adjust this to match your database structure.
        return view('admin.admin',compact('statistic'));
    }// Display the stats editing form
    public function stats()
    {
        $statistic = Statistic::first(); // Adjust this to match your database structure.
        return view('infografis',compact('statistic'));
    }// Display the stats editing form
    public function edit()
    {
        // Fetch the first record (or create a new one if it doesn't exist)
        $statistic = Statistic::firstOrCreate([]);
        return view('admin.stats.edit', compact('statistic'));
    }

    // Update the stats
    public function update(Request $request)
    {
        // Validate the input
        $request->validate([
            'total_population' => 'required|integer',
            'total_families' => 'required|integer',
            'total_males' => 'required|integer',
            'total_females' => 'required|integer',
            'islam' => 'required|integer',
            'christian' => 'required|integer',
            'catholic' => 'required|integer',
            'hindu' => 'required|integer',
            'buddha' => 'required|integer',
            'konghucu' => 'required|integer',
        ]);

        // Fetch the first record (or create a new one if it doesn't exist)
        $statistic = Statistic::firstOrCreate([]);

        // Update the stats
        $statistic->update($request->all());

        return redirect()->route('admin.stats.edit')->with('success', 'Stats updated successfully!');
    }
}
