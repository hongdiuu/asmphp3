<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        return [
            'nameProduct' => 'required|string|max:255',
            'imageProduct' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'priceProduct' => 'required|numeric|min:0',
            'descriptionProduct' => 'required|string|max:500',
            'category_id' => 'required|exists:category,id',
        ];
    }
    public function messages()
    {
        return [
            'nameProduct.required' => 'Tên sản phẩm là bắt buộc.',
            'imageProduct.image' => 'Vui lòng tải lên một ảnh hợp lệ.',
            'priceProduct.required' => 'Giá sản phẩm là bắt buộc.',
            'descriptionProduct.required' => 'Mô tả sản phẩm là bắt buộc.',
            'category_id.required' => 'Vui lòng chọn danh mục cho sản phẩm.',
        ];
    }
}
