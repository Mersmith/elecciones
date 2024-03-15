<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after:fecha_inicio',
            ];
        } else {
            return [
                'nombre' => 'required|min:3|max:255|unique:eleccions',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after:fecha_inicio',
            ];
        }
    }

    public function attributes(): array
    {
        return [
            'nombre' => 'nombre',
            'fecha_inicio' => 'fecha inicio',
            'fecha_fin' => 'fecha inicio',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'No debe ser vacio.',
            'nombre.min' => 'Más de :min dígitos.',
            'nombre.max' => 'Menos de :max dígitos',
            'nombre.unique' => 'Este :attribute ya existe',

            'fecha_inicio.required' => 'No debe ser vacio.',
            'fecha_inicio.date' => 'Debe ser una fecha válida.',

            'fecha_fin.required' => 'No debe ser vacio.',
            'fecha_fin.date' => 'Debe ser una fecha válida.',
            'fecha_fin.after' => 'Debe ser mayor a la fecha de inicio.',
        ];
    }
}
