<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendarEvent;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    public function index()
    {
        $events = AcademicCalendarEvent::orderBy('start_date', 'desc')->paginate(10);

        return view('admin.academic_calendar.index', compact('events'));
    }

    public function create()
    {
        return view('admin.academic_calendar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'color' => 'nullable|string|max:20',
        ]);

        AcademicCalendarEvent::create($data);

        return redirect()
            ->route('admin.academic-calendar.index')
            ->with('success', 'Calendario guardado correctamente.');
    }

    public function show(AcademicCalendarEvent $academic_calendar)
    {
        return redirect()->route('admin.academic-calendar.edit', $academic_calendar);
    }

    public function edit(AcademicCalendarEvent $academic_calendar)
    {
        $event = $academic_calendar;

        return view('admin.academic_calendar.edit', compact('event'));
    }

    public function update(Request $request, AcademicCalendarEvent $academic_calendar)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'color' => 'nullable|string|max:20',
        ]);

        $academic_calendar->update($data);

        return redirect()
            ->route('admin.academic-calendar.index')
            ->with('success', 'Calendario actualizado correctamente.');
    }

    public function destroy(AcademicCalendarEvent $academic_calendar)
    {
        $academic_calendar->delete();

        return redirect()
            ->route('admin.academic-calendar.index')
            ->with('success', 'Calendario eliminado correctamente.');
    }
}
