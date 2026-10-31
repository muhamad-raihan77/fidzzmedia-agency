<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_type',
        'message',
        'status',
        'admin_notes',
    ];

    public static function statusLabels(): array
    {
        return [
            'baru' => 'Baru',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'diarsipkan' => 'Diarsipkan',
        ];
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->status) {
            'baru' => 'bg-amber-100 text-amber-800 border-amber-200',
            'diproses' => 'bg-blue-100 text-blue-800 border-blue-200',
            'selesai' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            'diarsipkan' => 'bg-slate-100 text-slate-700 border-slate-200',
            default => 'bg-slate-100 text-slate-700 border-slate-200',
        };
    }
}

