<?php

namespace Webkul\Inventory\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductQuantityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $requiredRule = $isUpdate ? ['sometimes', 'required'] : ['required'];

        return [
            'location_id'        => [...$requiredRule, 'integer', 'exists:inventories_locations,id'],
            'product_id'         => [...$requiredRule, 'integer', 'exists:products_products,id'],
            'storage_category_id'=> ['nullable', 'integer', 'exists:inventories_storage_categories,id'],
            'lot_id'             => ['nullable', 'integer', 'exists:inventories_lots,id'],
            'package_id'         => ['nullable', 'integer', 'exists:inventories_packages,id'],
            'partner_id'         => ['nullable', 'integer', 'exists:partners_partners,id'],
            'user_id'            => ['nullable', 'integer', 'exists:users,id'],
            'company_id'         => ['nullable', 'integer', 'exists:companies,id'],
            'counted_quantity'   => [...$requiredRule, 'numeric', 'min:0', 'max:99999999999'],
            'scheduled_at'       => ['nullable', 'date'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'location_id' => [
                'description' => 'Inventory location ID.',
                'example'     => 1,
            ],
            'product_id' => [
                'description' => 'Product ID.',
                'example'     => 1,
            ],
            'storage_category_id' => [
                'description' => 'Storage category ID.',
                'example'     => 1,
            ],
            'lot_id' => [
                'description' => 'Lot ID.',
                'example'     => 1,
            ],
            'package_id' => [
                'description' => 'Package ID.',
                'example'     => 1,
            ],
            'partner_id' => [
                'description' => 'Owner partner ID.',
                'example'     => 1,
            ],
            'user_id' => [
                'description' => 'Responsible user ID.',
                'example'     => 1,
            ],
            'company_id' => [
                'description' => 'Company ID.',
                'example'     => 1,
            ],
            'counted_quantity' => [
                'description' => 'Counted quantity entered during inventory adjustment.',
                'example'     => 25,
            ],
            'scheduled_at' => [
                'description' => 'Scheduled inventory date.',
                'example'     => '2026-02-25',
            ],
        ];
    }
}
