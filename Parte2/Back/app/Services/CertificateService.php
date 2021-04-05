<?php

namespace App\Services;

use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpseclib3\File\X509;

class CertificateService
{
    public function getCertificatesAll(): Collection
    {
        return Certificate::all();
    }

    public function getCertificateById(int $id): Certificate
    {
        return Certificate::findOrFail($id);
    }

    public function newCertificate(Request $request): Certificate
    {
        $extensionFile = $request->file('certificate')->getClientOriginalExtension();
        $nameFile = $request->file('certificate')->getClientOriginalName();
        $dateFile = Carbon::now()->timestamp;
        $pathName = str_replace(".{$extensionFile}", "_{$dateFile}.{$extensionFile}", $nameFile);
        $pathStorage = $request->file('certificate')->storeAs('certificates', $pathName);
        $certificate = Storage::get($pathStorage);

        $x509 = new X509();
        $x509->loadX509($certificate);
        $subjectDN = $x509->getSubjectDN();
        $issuerDN = $x509->getIssuerDN();
        dd($subjectDN, $issuerDN);
    }

    public function deleteCertificateById(int $id): void
    {
        Certificate::find($id)->delete();
    }
}