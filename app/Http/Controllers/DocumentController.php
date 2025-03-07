<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $documents = Document::when($search, function ($query, $search) {
            return $query->where('titre', 'LIKE', "%{$search}%")
                         ->orWhere('description', 'LIKE', "%{$search}%")
                         ->orWhere('employe_id', 'LIKE', "%{$search}%")
                         ->orWhere('type', 'LIKE', "%{$search}%")
                         ->orWhere('chemin', 'LIKE', "%{$search}%");
        })->get();
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('documents.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fichier' => 'required|file|mimes:pdf,docx,xlsx|max:2048',
            'employe_id' => 'required|exists:employes,id',
        ]);

        $path = $request->file('fichier')->store('documents', 'public');

        Document::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'chemin' => $path,
            'employe_id' => $request->employe_id,
            'type' => $request->file('fichier')->getClientOriginalExtension(),
        ]);

        return redirect()->route('documents.index')->with('success', 'Document ajouté avec succès.');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $employes = Employe::all();
        return view('documents.edit', compact('document', 'employes'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fichier' => 'nullable|file|mimes:pdf,docx,xlsx|max:2048',
            'employe_id' => 'required|exists:employes,id',
        ]);

        $data = [
            'titre' => $request->titre,
            'description' => $request->description,
            'employe_id' => $request->employe_id,
        ];

        if ($request->hasFile('fichier')) {
            if ($document->chemin) {
                Storage::disk('public')->delete($document->chemin);
            }
            $path = $request->file('fichier')->store('documents', 'public');
            $data['chemin'] = $path;
        }

        $document->update($data);

        return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès.');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->chemin);
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Document supprimé avec succès.');
    }
}
