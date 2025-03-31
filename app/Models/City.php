<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'state_id',
        'latitude',
        'longitude'
    ];
    
    public function state(): BelongsTo
    {   
        return $this->belongsTo(State::class);
    }


        // SELECT * 
        // FROM cities 
        // WHERE MATCH(name) AGAINST ('Medell*' IN BOOLEAN MODE)  
        // LIMIT 100

    public function scopeSearch($query, string $search)
    {
        $searchTerms = array_filter(array_map('trim', explode(' ', $search)));
    
        // Construcción de la parte WHERE dinámica
        $whereClauses = [];
        $bindings = [];
        
        foreach ($searchTerms as $term) {
            $likeTerm = "%{$term}%";
            $whereClauses[] = "(cities.name LIKE ? OR states.name LIKE ? OR countries.name LIKE ?)";
            array_push($bindings, $likeTerm, $likeTerm, $likeTerm);
        }
        
        // Parámetros para el ORDER BY CASE
        $orderByBindings = array_fill(0, 6, "%{$search}%");
        
        // Consulta SQL completa
        $sql = "
            SELECT 
                cities.id,
                CONCAT(cities.name, ', ', states.name, ', ', countries.name) as name
            FROM 
                cities
            JOIN 
                states ON cities.state_id = states.id
            JOIN 
                countries ON states.country_id = countries.id
            " . (count($whereClauses) > 0 ? "WHERE " . implode(' AND ', $whereClauses) : "") . "
            ORDER BY 
                CASE
                    WHEN cities.name LIKE ? THEN 100
                    WHEN states.name LIKE ? THEN 50
                    WHEN countries.name LIKE ? THEN 25
                    WHEN CONCAT(cities.name, ' ', states.name) LIKE ? THEN 90
                    WHEN CONCAT(cities.name, ' ', countries.name) LIKE ? THEN 80
                    WHEN CONCAT(states.name, ' ', countries.name) LIKE ? THEN 70
                    ELSE 0
                END DESC
            LIMIT 20
        ";
        
        // Combino todos los bindings
        $allBindings = array_merge($bindings, $orderByBindings);
        
        // $results = DB::select($sql, $allBindings);
        // return collect($results)->pluck('name', 'id');

        return $query->select($sql, $allBindings)->pluck('name', 'id');
    }
}
