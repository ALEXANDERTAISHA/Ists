<?php
namespace App\Chatbot\Sources;

use Illuminate\Support\Facades\DB;

class DocumentosSource
{
    // Palabras clave asociadas a esta fuente
    protected $keywords = [
        'trámite', 'trámites', 'proceso', 'procesos', 'matrícula', 'matrículas', 'inscripción', 'inscripciones', 'admisión', 'admisiones', 'registro nacional', 'requisitos', 'documentos', 'solicitud', 'certificado', 'constancia'
    ];

    public function canRespond($message)
    {
        $msg = strtolower($message);
        foreach ($this->keywords as $kw) {
            if (strpos($msg, $kw) !== false) {
                return true;
            }
        }
        return false;
    }

    public function getResponse($message)
    {
        try {
            $documentos = DB::table('contents')
                ->where('category', 'documentos')
                ->where('status', 'published')
                ->orderBy('created_at', 'desc')
                ->get();
            if ($documentos->count()) {
                $respuesta = "Información sobre documentos y procesos:\n";
                foreach ($documentos as $t) {
                    $nombre = $t->title ?? $t->nombre ?? '(Sin título)';
                    $descripcion = $t->description ?? $t->descripcion ?? '';
                    $respuesta .= "- {$nombre}: {$descripcion}\n";
                }
                return $respuesta;
            }
        } catch (\Throwable $e) {
            // Log::error('Error al consultar documentos para el chatbot: ' . $e->getMessage());
        }
        return "Gracias por tu mensaje. No he encontrado una respuesta exacta, pero puedes consultar nuestras carreras, noticias, actualizaciones o contactar a un asesor para más información.";
    }
}
