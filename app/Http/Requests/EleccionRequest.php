<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EleccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->id;

        if ($id) {
            return [
                'nombre' => 'required|min:3|max:255|unique:eleccions,nombre,' . $id,
                'slug' => 'required|min:3|max:255|unique:eleccions,slug,' . $id,
                'fecha_inicio_convocatoria' => 'required|date',
                'fecha_fin_convocatoria' => 'required|date|after:fecha_inicio_convocatoria',
                'fecha_inicio_elecciones' => 'required|date',
                'fecha_fin_elecciones' => 'required|date|after:fecha_inicio_elecciones',
            ];
        } else {
            return [
                'nombre' => 'required|min:3|max:255|unique:eleccions',
                'slug' => 'required|min:3|max:255|unique:eleccions',
                'fecha_inicio_convocatoria' => 'required|date',
                'fecha_fin_convocatoria' => 'required|date|after:fecha_inicio_convocatoria',
                'fecha_inicio_elecciones' => 'required|date',
                'fecha_fin_elecciones' => 'required|date|after:fecha_inicio_elecciones',
            ];
        }
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'slug' => 'url',
            'fecha_inicio_convocatoria' => 'fecha inicio convocatoria',
            'fecha_fin_convocatoria' => 'fecha fin convocatoria',
            'fecha_inicio_elecciones' => 'fecha inicio elecciones',
            'fecha_fin_elecciones' => 'fecha fin elecciones',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'No debe ser vacio.',
            'nombre.min' => 'Más de :min dígitos.',
            'nombre.max' => 'Menos de :max dígitos',
            'nombre.unique' => 'Este :attribute ya existe',

            'slug.required' => 'No debe ser vacio.',
            'slug.min' => 'Más de :min dígitos.',
            'slug.max' => 'Menos de :max dígitos',
            'slug.unique' => 'Este :attribute ya existe',

            'fecha_inicio_convocatoria.required' => 'No debe ser vacio.',
            'fecha_inicio_convocatoria.date' => 'Debe ser una fecha válida.',

            'fecha_fin_convocatoria.required' => 'No debe ser vacio.',
            'fecha_fin_convocatoria.date' => 'Debe ser una fecha válida.',
            'fecha_fin_convocatoria.after' => 'Debe ser mayor a la fecha de inicio.',

            'fecha_inicio_elecciones.required' => 'No debe ser vacio.',
            'fecha_inicio_elecciones.date' => 'Debe ser una fecha válida.',

            'fecha_fin_elecciones.required' => 'No debe ser vacio.',
            'fecha_fin_elecciones.date' => 'Debe ser una fecha válida.',
            'fecha_fin_elecciones.after' => 'Debe ser mayor a la fecha de inicio elecciones.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
