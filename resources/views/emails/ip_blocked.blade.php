@component('mail::message')
# 🚨 IP Telah Diblokir

Telah terjadi percobaan akses **signed URL** yang gagal sebanyak **{{ $attempts }} kali**.

**Detail IP:**
- IP Address: `{{ $ip }}`
- Waktu: {{ now()->format('d M Y H:i:s') }}

@component('mail::panel')
Tindakan pencegahan: IP ini telah diblokir sementara.
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
