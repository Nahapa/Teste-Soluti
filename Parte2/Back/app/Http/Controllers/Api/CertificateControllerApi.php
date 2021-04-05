<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificateResource;
use App\Services\CertificateService;
use Illuminate\Http\Request;

class CertificateControllerApi extends Controller
{
    private $certificateService;

    public function __construct()
    {
        $this->certificateService = new CertificateService();
    }

    public function index()
    {
        return CertificateResource::collection($this->certificateService->getCertificatesAll());
    }

    public function store(Request $request)
    {
        return new CertificateResource($this->certificateService->newCertificate($request));
    }

    public function destroy($id)
    {
        return $this->certificateService->deleteCertificateById($id);
    }
}
