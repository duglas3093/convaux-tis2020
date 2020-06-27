<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Announcement;
use ConvAux\AnnouncementRequest;
use ConvAux\Knowledge;
use ConvAux\KnowledgeDetail;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function goRequestDetail($id, $requestId) {
        $announcement = Announcement::find($id);
        $knowlageAnnouncement = Knowledge::find($announcement->knowledge_id);
        $request = AnnouncementRequest::find($requestId);
        $request->titleConv = $announcement->title;
        $request->knowledgeDescription = $knowlageAnnouncement->description;
        $requestTematicas = KnowledgeDetail::where('request_id', '=', $requestId)->get();
        $data = [
            'request' => $request,
            'requestTematicas' => $requestTematicas
        ];
        return view('announcements.announcement-request')->with('data', $data);
    }

    public function setTematicaToRequest(Request $request, $id, $requestId) {
        $announcement = Announcement::find($id);
        $requestTematica = new KnowledgeDetail();
        $requestTematica->criteria = $request->tematica;
        $requestTematica->score = $request->scoreTematica;
        $requestTematica->request_id = $requestId;
        $requestTematica->knowledge_id = Knowledge::find($announcement->knowledge_id)->id;
        $saved = $requestTematica->save();
        if ($saved) {
            return redirect()->back()->with('tematica_added', 'Se añadió un criterio de calificaciones para el requerimiento');
        }
        return redirect()->back()->with('tematica_added_error', 'Algo salió mal, intente nuevamente mas tarde');
    }
}