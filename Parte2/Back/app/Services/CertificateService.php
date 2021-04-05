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
        $resultSubjectDn = 'C=' . $subjectDN['rdnSequence'][0][0]['value']['printableString'] . ',';
        $resultSubjectDn .= 'O=' . $subjectDN['rdnSequence'][1][0]['value']['printableString'] . ',';
        $resultSubjectDn .= 'OU=' . $subjectDN['rdnSequence'][2][0]['value']['printableString'] . ',';
        $resultSubjectDn .= 'OU=' . $subjectDN['rdnSequence'][3][0]['value']['printableString'] . ',';
        $resultSubjectDn .= 'OU=' . $subjectDN['rdnSequence'][4][0]['value']['printableString'] . ',';
        $resultSubjectDn .= 'CN=' . $subjectDN['rdnSequence'][5][0]['value']['printableString'];
        $resultDNIssuer = 'C=' . $issuerDN['rdnSequence'][0][0]['value']['printableString'] . ',';
        $resultDNIssuer .= 'O=' . $issuerDN['rdnSequence'][1][0]['value']['printableString'] . ',';
        $resultDNIssuer .= 'OU=' . $issuerDN['rdnSequence'][2][0]['value']['printableString'] . ',';
        $resultDNIssuer .= 'OU=' . $issuerDN['rdnSequence'][3][0]['value']['printableString'] . ',';
        $resultDNIssuer .= 'CN=' . $issuerDN['rdnSequence'][4][0]['value']['printableString'];
        $expirationDate = "Não antes de: " . Carbon::parse($x509->getCurrentCert()['tbsCertificate']['validity']['notBefore']['utcTime'])->format('M d H:i:s T');
        $expirationDate .= " Não depois de: " . Carbon::parse($x509->getCurrentCert()['tbsCertificate']['validity']['notBefore']['utcTime'])->format('M d H:i:s T');

        return Certificate::create([
            'path'          => $pathStorage,
            'DN'            => $resultSubjectDn,
            'DN_issuer'     => $resultDNIssuer,
            'expiration_at' => $expirationDate
        ]);
    }

    public function deleteCertificateById(int $id): void
    {
        Certificate::find($id)->delete();
    }
}
